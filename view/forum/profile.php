<?php  
    $user = $result["data"]['user'];
    $pseudo = $user->getNickname();
    $email = $user->getEmail();
    $role = $user->getRole();
    $registrationDate = $user->getRegistrationDate();
?>


<h1>Données de <?= $user ?></h1>

<div class="profile">
    <p><span class="profile-title">Nickname:</span> <?= $pseudo ?></p>
    <p><span class="profile-title">Email:</span> <?= $email ?></p>
    <p><span class="profile-title">Date d'inscription:</span> <?= $registrationDate ?></p>
</div>