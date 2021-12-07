<?php require_once 'header.html.php'; ?>
<?php if (!empty($error_messages)) : ?>
<ul>
    <?php foreach ($error_messages as $message) : ?>
    <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>



<br>
Ajouter un joueur

<form action="" method="post">
    <label for="email">Mail : </label>
    <input type="email" required="required" name="email" id="email">
    <label for="nickname"> Surnom : </label>
    <input type="text" required="required" name="nickname" id="nickname">
    <button type="submit">Envoyer</button>
</form>
<br>









<?php require_once 'footer.html.php'; ?>