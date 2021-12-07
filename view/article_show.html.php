<?php require_once 'header.html.php'; ?>

    <article>
        <h1><?= $article->getTitle() ?></h1>
        <span><?= $article->getCreatedAt() ?></span>
        <p><?= $article->getDescription() ?></p>
    </article>
    <a href="article_edit_controller.php?id=<?= $article->getIdArticle() ?>">Editer l'article</a>
    <a href="article_delete_controller.php?id=<?= $article->getIdArticle() ?>">Supprimer l'article</a>

<?php require_once 'footer.html.php'; ?>