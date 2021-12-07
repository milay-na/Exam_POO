<?php

class ArticleDao
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
     * Récupères tous les articles de la BDD
     *
     * @return Article[]
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM article");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Article.php';

        foreach ($results as $key => $article) {
            $results[$key] = (new Article())
                ->setIdArticle($article['id_article'])
                ->setTitle($article['title'])
                ->setDescription($article['description'])
                ->setCreatedAt($article['created_at']);
        }

        return $results;
    }

    public function getById(int $id): Article
    {
        $sth = $this->dbh->prepare("SELECT * FROM article WHERE id_article = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Article.php';
        return $sth->fetchObject(Article::class);
    }

    public function add(Article $article): int
    {
        $sth = $this->dbh->prepare("INSERT INTO article (title, description) VALUES (:title, :description)");
        $sth->bindValue(':title', $article->getTitle());
        $sth->bindValue(':description', $article->getDescription());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }


    public function addGame(Article $game): int
    {
        $sth = $this->dbh->prepare("INSERT INTO `game`(`id_game`, `title`, `min_players`, `max_players`) VALUES (NULL,:title,:min_players,:max_players)");
        $sth->bindValue(':title', $game->getTitle());
        $sth->bindValue(':description', $game->getMinPlayers());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }

    public function edit(Article $article): void
    {
        $sth = $this->dbh->prepare("UPDATE article
                                    SET title = :title, description = :description
                                    WHERE id_article = :id");
        $sth->execute([
            ':title' => $article->getTitle(),
            ':description' => $article->getDescription(),
            ':id' => $article->getIdArticle()
        ]);
    }

    public function delete(int $id): void
    {
        $sth = $this->dbh->prepare('DELETE FROM article WHERE id_article = :id');
        $sth->execute([
            ':id' => $id
        ]);
    }
}