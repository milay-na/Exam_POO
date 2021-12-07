<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $title = filter_input(INPUT_POST, 'title');
    $min_players = filter_input(INPUT_POST, 'min_players');
    $max_players = filter_input(INPUT_POST, 'max_players');

    if (empty(trim($title))) {
        $error_messages[] = 'Pas de titre';
    }
    if (empty(trim($min_players))) {
        $error_messages[] = 'Pas de nombre minimum de joueurs';
    }
    
    if (empty(trim($max_players))) {
        $error_messages[] = 'Pas de nombre maximum de joueurs';
    }


    if (empty($error_messages)) {
        require_once '../Model/Game.php';
        $game = (new game())->setTitle($title)->setMinPlayers($min_players)->setMaxPlayers($max_players);

        try {
            require_once '../Dao/GameDao.php';
            $dao = new GameDao();
            $id = $dao->addGame($game);
            header(sprintf('Location: game_show_controller.php?id=%d', $id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/game_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/game_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
