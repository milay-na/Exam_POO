<?php

require_once '../Dao/ArticleDao.php';
$dao = new ArticleDao();
$dao->delete(
    filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
);
header('Location: home_controller.php');