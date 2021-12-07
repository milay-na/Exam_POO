<?php

require_once '../Dao/ContestDao.php';
$dao = new ContestDao();
$contest = $dao->getById(
    filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
);

require_once '../view/contest_show.html.php';