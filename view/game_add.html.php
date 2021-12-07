<?php require_once 'header.html.php'; ?>
<?php if (!empty($error_messages)) : ?>
<ul>
    <?php foreach ($error_messages as $message) : ?>
    <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<br>
Ajouter un jeu

<form action="" method="post">
    <label for="title">Titre : </label>
    <input type="text" required="required" name="title" id="title">
    <label for="min_players"> Nombre de Joueur Min : </label>
    <input type="number" required="required" name="min_players" id="min_players">
    <label for="max_players"> Nombre de Joueur Max : </label>
    <input type="number" required="required" name="max_players" id="max_players">
    <button type="submit">Envoyer</button>
</form>


<br>









<?php require_once 'footer.html.php'; ?>