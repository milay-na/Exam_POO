<?php

require_once '../Dao/GameDao.php';
$dao = new GameDao();
$game = $dao->getById(
    filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
);

require_once '../view/game_show.html.php';