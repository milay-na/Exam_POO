<?php require_once 'header.html.php'; ?>
<?php foreach ($results as $article) : ?>
    <article>
        <h1><?= $article->getTitle() ?></h1>
        <span><?= $article->getCreatedAt() ?></span>
        <p><?= $article->getDescription() ?></p>
        <a href="article_show_controller.php?id=<?= $article->getIdArticle() ?>">Afficher l'article</a>
    </article>
<?php endforeach; ?>
<?php require_once 'footer.html.php'; ?>