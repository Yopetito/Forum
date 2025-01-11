<?php  
    $user = $result["data"]['user'];
    $pseudo = $user->getNickname();
    $email = $user->getEmail();
    $role = $user->getRole();
    $registrationDate = $user->getRegistrationDate();
?>


<h1 class="profile-heading">Profile</h1>

<div class="profile">
    <p><span class="profile-title">Nickname:</span> <?= $pseudo ?></p>
    <p><span class="profile-title">Email:</span> <?= $email ?></p>
    <p><span class="profile-title">Date d'inscription:</span> <?= $registrationDate ?></p>
    <div class="bouton-profile">
        <a class="alert-delete" href="index.php?ctrl=security&action=deleteUser&id=<?= $user->getId() ?>" 
           onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
           <i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Supprimer mon profil
        </a><br>
        <a class="edit-profile" href="index.php?ctrl=security&action=editUser">
           <i class="fa-solid fa-pen"></i>&nbsp;Modifier mon profil
        </a>
    </div>
</div>