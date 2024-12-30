<?php
$users = $result["data"]['users'];
?>

<h1>Liste des utilisateurs</h1>
<?php
foreach($users as $user) { ?>
    <p>Nickname :<?= $user->getNickname() ?></p>
    <p>Date d'inscription : <?= $user->getRegistrationDate() ?></p>
    <a href="index.php?ctrl=security&action=deleteUser&id=<?= $user->getId() ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
        Delete
    </a>
    <br>
    <br>
<?php }