<?php require_once 'header.html.php'; ?>

    <article>
        <h1><?= $contest->getEmail() ?></h1>
        <span><?= $contest->getNickname() ?></span>
</article>
    <a href="article_edit_controller.php?id=<?= $contest->getIdPlayer() ?>">Editer le joueur</a>
    <a href="article_delete_controller.php?id=<?= $contest->getIdPlayer() ?>">Supprimer le joueur</a>

<?php require_once 'footer.html.php'; ?>