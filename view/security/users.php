<?php
$users = $result["data"]['users'];
?>

<h1>Liste des utilisateurs</h1>
<table class="users-table" border=1>
    <thead>
        <tr>
            <th>Nickname</th>
            <th>Date inscription</th>
            <th><i class="fa-solid fa-person-circle-minus"></i></th>
        </tr>
    </thead>
    <tbody>
    <?php
foreach($users as $user) { ?>
        <tr>
            <td><?= $user->getNickname() ?></td>
            <td><?= $user->getRegistrationDate() ?></td>
            <td><a href="index.php?ctrl=security&action=deleteUser&id=<?= $user->getId() ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
            Delete
            </a></td>
        </tr>  
<?php } ?>
    </tbody>
</table>
