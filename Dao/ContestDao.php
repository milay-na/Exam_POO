<?php



class contestDao
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
     * Récupères tous les contests de la BDD
     *
     * @return contest[]
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM contest");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Contest.php';

        foreach ($results as $key => $contest) {
            $results[$key] = (new contest())
                ->setIdcontest($contest['id_contest'])
                ->setStartDate($contest['start_date'])
                ->setIdWinner($contest['id_winner'])
                ->setIdGame($contest['id_game']);
        }

        return $results;
    }

    public function getById(int $id): contest
    {
        $sth = $this->dbh->prepare("SELECT * FROM contest WHERE id_contest = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Contest.php';
        return $sth->fetchObject(contest::class);
    }

    public function addContest(contest $contest): int
    {
        $sth = $this->dbh->prepare("INSERT INTO `contest`(`id_contest`, `start_date`, `id_winner`, `id_game`) VALUES (NULL,:start_date,:id_winner,:id_game)");
        $sth->bindValue(':start_date', $contest->getStartDate());
        $sth->bindValue(':id_winner', $contest->getIdWinner());
        $sth->bindValue(':id_game', $contest->getIdGame());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }

    public function editcontest(contest $contest): void
    {
        $sth = $this->dbh->prepare("UPDATE contest$contest
                                    SET start_date = :start_date, id_winner = :id_winner, id_game = :id_game,
                                    WHERE id_contest = :id");
        $sth->execute([
            ':start_date' => $contest->getStartDate(),
            ':id_winner' => $contest->getIdWinner(),
            ':id_game' => $contest->getIdGame(),
            ':id' => $contest->getIdcontest()
        ]);
    }

    public function delete(int $id): void
    {
        $sth = $this->dbh->prepare('DELETE FROM contest WHERE id_contest = :id');
        $sth->execute([
            ':id' => $id
        ]);
    }
}