<?php  
    $user = $result["data"]['user'];
    $pseudo = $user->getNickname();
    $email = $user->getEmail();
    $role = $user->getRole();
    $registrationDate = $user->getRegistrationDate();
?>


<h1>Données de <?= $user ?></h1>

<p>Email: <?= $email ?></p>
<p>Date d'inscription: <?= $registrationDate ?></p>