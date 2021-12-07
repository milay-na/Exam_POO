<?php require_once 'header.html.php'; ?>

    <article>
        <h1><?= $player->getEmail() ?></h1>
        <span><?= $player->getNickname() ?></span>
</article>
    <a href="article_edit_controller.php?id=<?= $player->getIdPlayer() ?>">Editer le joueur</a>
    <a href="article_delete_controller.php?id=<?= $player->getIdPlayer() ?>">Supprimer le joueur</a>

<?php require_once 'footer.html.php'; ?>