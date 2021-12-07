<?php require_once 'header.html.php'; ?>





<?php foreach ($results as $player) : ?>
    <article>
        <h1><?= $player->getNickname() ?></h1>
       
</article>
<?php endforeach; ?>


<?php foreach ($results1 as $game) : ?>
    <article>
        <h1><?= $game->getTitle() ?></h1>
       
</article>
<?php endforeach; ?>

<?php foreach ($results2 as $contest) : ?>
    <article>
        <h1>Match du jeux numéro <?= $contest->getIdGame() ?></h1>
        <span>Date de début<?= $contest->getStartDate() ?></span>
        <br>
        <span>Gagnant :<?= $contest->getIdWinner() ?></span>
        <a href="#"></a>
</article>
<?php endforeach; ?>



<?php require_once 'footer.html.php'; ?>