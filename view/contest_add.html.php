<?php require_once 'header.html.php'; ?>
<?php if (!empty($error_messages)) : ?>
<ul>
    <?php foreach ($error_messages as $message) : ?>
    <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<br>

Ajouter un match

<form action="" method="post">
    <label for="start_date">date de début</label>
    <input type="date" required="required" name="start_date" id="start_date">
    <label for="id_winner"> Gagnant : </label>
    <input type="number" required="required" name="id_winner" id="id_winner">
    <label for="id_game"> Jeux : </label>
    <input type="number" required="required" name="id_game" id="id_game">
    <button type="submit">Envoyer</button>
</form>

<?php require_once 'footer.html.php'; ?>