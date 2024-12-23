<?php
    use app\Session;
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic){ ?>

<p>
    <br>
    <a href="index.php?ctrl=forum&action=listPostInTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> 
    <br> par <?= $topic->getUser() ?> 
    <br> le <?= $topic->getCreationDate() ?>
   <?php if(App\Session::getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId()) { ?>
        <a href="index.php?ctrl=forum&action=lockTopic&id= <?= $topic->getId() ?>">
          <?= $topic->getLocked() ? 'Dévérouiller' : 'Vérouiller' ?>
        </a>
        <?php } ?> 
</p>
<?php } ?>
 

<?php if(App\Session::getUser()) { ?>
<form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId(); ?>" method="POST">
    <label for="topic">Créee un nouveau topic:</label><br>
    <input type="text" name="topic" placeholder="Titre du topic..."><br>
    <label for="message_topic">écrivez votre premier message dans ce topic:</label><br>
    <textarea name="message_topic" id="message_topic" cols="40" rows="5" placeholder="ecrivez votre message ici.."></textarea>
    <input type="submit" name="submit" value="Envoyez!">
</form>
<?php } else { ?>
    <p>Veuillez vous connecter / vous inscrire pour participer au forum</p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a> |
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php }