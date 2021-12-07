<?php require_once 'header.html.php'; ?>
<?php if (!empty($error_messages)) : ?>
<ul>
    <?php foreach ($error_messages as $message) : ?>
    <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="post">
    <label for="title">Titre : </label>
    <input type="text" name="title" id="title">
    <label for="description">Description : </label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <button type="submit">Envoyer</button>
</form>
<?php require_once 'footer.html.php'; ?>