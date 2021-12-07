<?php

require_once '../Dao/ArticleDao.php';
$dao = new ArticleDao();
$article = $dao->getById(
    filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
);

require_once '../view/article_show.html.php';