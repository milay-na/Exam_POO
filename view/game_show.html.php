<?php require_once 'header.html.php'; ?>

    <article>
        <h1><?= $game->getTitle() ?></h1>
        <span><?= $game->getMinPlayers() ?></span>
        <p><?= $game->getMaxPlayers() ?></p>
</article>
    <a href="article_edit_controller.php?id=<?= $game->getIdGame() ?>">Editer le jeux</a>
    <a href="article_delete_controller.php?id=<?= $game->getIdGame() ?>">Supprimer le jeux</a>

<?php require_once 'footer.html.php'; ?>