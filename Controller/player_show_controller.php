<?php

require_once '../Dao/PlayerDao.php';
$dao = new PlayerDao();
$player = $dao->getById(
    filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
);

require_once '../view/player_show.html.php';