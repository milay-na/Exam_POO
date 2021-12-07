<?php require_once 'header.html.php'; ?>





<?php foreach ($results as $player) : ?>
    <article>
        <h1><?= $player->getNickname() ?></h1>
       
</article>
<?php endforeach; ?>


<?php foreach ($results as $game) : ?>
    <article>
        <h1><?= $game->getTitle() ?></h1>
       
</article>
<?php endforeach; ?>




<?php require_once 'footer.html.php'; ?>