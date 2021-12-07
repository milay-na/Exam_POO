<?php



class GameDao
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
     * Récupères tous les Games de la BDD
     *
     * @return game[]
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM game");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Game.php';

        foreach ($results as $key => $game) {
            $results[$key] = (new Game())
                ->setIdGame($game['id_game'])
                ->setTitle($game['title'])
                ->setMinPlayers($game['min_players'])
                ->setMaxPlayers($game['max_players']);
        }

        return $results;
    }

    public function getById(int $id): Game
    {
        $sth = $this->dbh->prepare("SELECT * FROM game WHERE id_Game = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Game.php';
        return $sth->fetchObject(Game::class);
    }

    public function addGame(Game $game): int
    {
        $sth = $this->dbh->prepare("INSERT INTO `game`(`id_game`, `title`, `min_players`, `max_players`) VALUES (NULL,:title,:min_players,:max_players)");
        $sth->bindValue(':title', $game->getTitle());
        $sth->bindValue(':min_players', $game->getMinPlayers());
        $sth->bindValue(':max_players', $game->getMaxPlayers());
        $sth->execute();
        $sql = ("INSERT INTO `game`(`id_game`, `title`, `min_players`, `max_players`) VALUES (NULL,:title,:min_players,:max_players)");
        echo $sql;
        return $this->dbh->lastInsertId();
    }

    public function editGame(Game $game): void
    {
        $sth = $this->dbh->prepare("UPDATE game$game
                                    SET title = :title, min_players = :min_players, max_players = :max_players,
                                    WHERE id_game = :id");
        $sth->execute([
            ':title' => $game->getTitle(),
            ':min_players' => $game->getMinPlayers(),
            ':max_players' => $game->getMaxPlayers(),
            ':id' => $game->getIdGame()
        ]);
    }

    public function delete(int $id): void
    {
        $sth = $this->dbh->prepare('DELETE FROM game WHERE id_Game = :id');
        $sth->execute([
            ':id' => $id
        ]);
    }
}