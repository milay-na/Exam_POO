<?php require_once 'header.html.php'; ?>

    <article>
        <h1>Date de debut de match :<?= $contest->getStartDate() ?></h1>
        <span>Gagnant numéro :<?= $contest->getIdWinner() ?></span>
        <br>
        <span>Jeux numéro : <?= $contest->getIdGame() ?></span>
</article>
    <a href="article_edit_controller.php?id=<?= $contest->getIdPlayer() ?>">Editer le joueur</a>
    <a href="article_delete_controller.php?id=<?= $contest->getIdPlayer() ?>">Supprimer le joueur</a>

<?php require_once 'footer.html.php'; ?>