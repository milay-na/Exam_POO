<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $nickname = filter_input(INPUT_POST, 'nickname');
    

    if (empty(trim($email))) {
        $error_messages[] = 'Pas de mail';
    }
    if (empty(trim($nickname))) {
        $error_messages[] = 'Pas de Surnom';
    }
    
    if (empty($error_messages)) {
        require_once '../Model/Player.php';
        $player = (new player())->setEmail($email)->setNickname($nickname);

        try {
            require_once '../Dao/PlayerDao.php';
            $dao = new PlayerDao();
            $id = $dao->addPlayer($player);
            header(sprintf('Location: player_show_controller.php?id=%d', $id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/player_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/player_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
