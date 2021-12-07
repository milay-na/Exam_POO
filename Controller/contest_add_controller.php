<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $start_date = filter_input(INPUT_POST, 'start_date');
    $id_winner = filter_input(INPUT_POST, 'id_winner');
    $id_game = filter_input(INPUT_POST, 'id_game');

    if (empty(trim($start_date))) {
        $error_messages[] = 'Pas de date';
    }
    if (empty(trim($id_winner))) {
        $error_messages[] = 'Pas de gagnant';
    }
    
    if (empty(trim($id_game))) {
        $error_messages[] = 'Pas de jeux';
    }


    if (empty($error_messages)) {
        require_once '../Model/Contest.php';
        $game = (new game())->setStart_date($start_date)->setIdwinner($id_winner)->setIdgame($id_game);

        try {
            require_once '../Dao/ContestDao.php';
            $dao = new GameDao();
            $id = $dao->addGame($game);
            header(sprintf('Location: contest_show_controller.php?id=%d', $id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/contest_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/contest_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
