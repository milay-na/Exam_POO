<?php

class PlayerDao
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO(
            "mysql:host=localhost;dbname=wf3_php_final_milena;charset=UTF8",
            "root",
            "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * Récupères tous les Players de la BDD
     *
     * @return Player[]
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM player");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Player.php';

        foreach ($results as $key => $player) {
            $results[$key] = (new Player())
                ->setIdPlayer($player['id_player'])
                ->setEmail($player['email'])
                ->setNickname($player['nickname']);
        }

        return $results;
    }

    public function getById(int $id): Player
    {
        $sth = $this->dbh->prepare("SELECT * FROM player WHERE id_Player = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Player.php';
        return $sth->fetchObject(Player::class);
    }

    public function addPlayer(Player $player): int
    {
        $sth = $this->dbh->prepare("INSERT INTO player (email, nickname) VALUES (:email, :nickname)");
        $sth->bindValue(':email', $player->getEmail());
        $sth->bindValue(':nickname', $player->getNickname());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }

    public function edit(Player $player): void
    {
        $sth = $this->dbh->prepare("UPDATE player
                                    SET email = :email, nickname = :nickname
                                    WHERE id_player = :id");
        $sth->execute([
            ':email' => $player->getEmail(),
            ':nickname' => $player->getNickname(),
            ':id' => $player->getIdPlayer()
        ]);
    }

    public function delete(int $id): void
    {
        $sth = $this->dbh->prepare('DELETE FROM player WHERE id_Player = :id');
        $sth->execute([
            ':id' => $id
        ]);
    }
}