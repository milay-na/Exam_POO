<?php

// Instruction qui permet de récupérer les données dans la base de donnée wf3_blog
require_once '../Dao/ArticleDao.php';

try {
    $dao = new ArticleDao();
    $results = $dao->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Afficher les données récupérées
require "../view/home.html.php";