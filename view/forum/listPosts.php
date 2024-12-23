<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
    
?>

<h1>Liste des posts</h1>

<?php 
foreach($posts as $post ){ ?>
    <p>par <?= $post->getUser() ?> le <?= $post->getCreationDate() ?> <br> <?= $post ?><br><br> </p>
<?php } ?>

    <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId(); ?>" method="POST">
        <label for="message">Ecrivez votre message ici:</label><br>
        <textarea name="message" id="message" cols="40" rows="5"></textarea>
        <input type="submit" name="submit" value="Envoyer le post!">
    </form>
