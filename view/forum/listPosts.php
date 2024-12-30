<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
    $categoryId = $topic->getCategory()->getId();
?>

<h1>Liste des posts</h1>
<a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $categoryId ?>" class="btn-return"><i class="fa-solid fa-rotate-left"> topics</i></a>
<div class="list-box">
    <?php 

    foreach($posts as $post ){ ?>
    <div class="list-item">
        <p>par <?= $post->getUser() ? $post->getUser() : "utilisateur supprimé"  ?> 
        <br>le <?= $post->getCreationDate() ?> <br> <?= $post ?><br><br> </p>
    </div>
    <?php } ?>
</div>
<?php
if(App\Session::getUser()) {
    if(!$topic->getLocked()) { ?>
        <form action="index.php?ctrl=post&action=addPost&id=<?= $topic->getId(); ?>" method="POST">
            <label for="message">Ecrivez votre message ici:</label><br>
            <textarea name="message" id="message" cols="40" rows="5"></textarea>
            <input type="submit" name="submit" value="Envoyer le post!">
        </form>
    <?php }
} else { ?>
    <p>Veuillez vous connecter / vous inscrire pour participer au forum</p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a> |
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>
