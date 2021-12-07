<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');

    if (empty(trim($title))) {
        $error_messages[] = 'Pas de titre';
    }
    if (empty(trim($description))) {
        $error_messages[] = 'Pas de description';
    }

    if (empty($error_messages)) {
        require_once '../Model/Article.php';
        $article = (new Article())->setTitle($title)->setDescription($description);

        try {
            require_once '../Dao/ArticleDao.php';
            $dao = new ArticleDao();
            $id = $dao->add($article);
            header(sprintf('Location: article_show_controller.php?id=%d', $id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/article_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/article_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
