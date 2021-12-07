<?php
require '../Dao/PlayerDao.php';
require '../Dao/GameDao.php';
require '../Dao/ContestDao.php';

try {
    $dao = new PlayerDao();
    $results = $dao->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Afficher les données récupérées
//require "../view/home.html.php";


try {
    $dao1 = new GameDao();
    $results1 = $dao1->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $dao2 = new ContestDao();
    $results2 = $dao2->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}


require "../view/home.html.php";
