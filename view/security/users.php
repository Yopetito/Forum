<?php
$users = $result["data"]['users'];
?>

<h1>Liste des utilisateurs</h1>
<?php
foreach($users as $user) { ?>
    <p>Nickname :<?= $user->getNickname() ?></p>
    <p>Date d'inscription : <?= $user->getRegistrationDate() ?></p>
    <br>
<?php }