<?php
use App\Session;

$topic = $result["data"]['topic']; 
$posts = $result["data"]['posts']; 
if(!empty($topic) && !empty($posts)) { 
    $categoryId = $topic->getCategory()->getId();
    ?>
    <div class="emplacement-info">
        <div class="emplacement">
            <h1><?= $topic->getTitle() ?> </h1>  
        </div>
        <div class="bouton-retour">
        <a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $categoryId ?>" class="btn-return"><i class="fa-solid fa-rotate-left"> topics</i></a>
        </div>
    </div>
    <div class="list-box-post">
        <div class="headinfo">
            <p>Posts</p>
            <p>Autor</p>
            <p>Date</p>
        </div> 
        <?php 
        
        // compteur pour creation de la class dynamique pour du CSS
        $i = 0;
        foreach($posts as $post ){ 
        $class = $i % 2 === 0 ? 'even' : 'odd'; ?>
        <div class="list-item-post <?= $class ?>">
            <!-- affichage de l'information des posts dans un tipic a l'aide des getters -->
            <div class="topic-title">
                <?= $post ?>
            </div>
            <div class="topic-autor">
                <?= $post->getUser() ? $post->getUser() : "utilisateur supprimé"  ?> 
            </div>
            <div class="topic-date">
                le <?= $post->getCreationDate() ?> 
            </div>
        </div>
        <!--  incrémentation de la var $i pour attribution de "odd" "even" dans le nom de la class-->
        <?php $i++; ?>
        <?php } ?>
    </div>
<?php } else {
            header("Location: index.php");
            exit;
} 

//Si l'utilisateur est connecté : formulaire de création d'un nouveau topic avec un premier message
if(App\Session::getUser()) {
    if(!$topic->getLocked()) { ?>
        <form class="form-style" action="index.php?ctrl=post&action=addPost&id=<?= $topic->getId(); ?>" method="POST">
            <div class="form-info">
                <label for="message">Ecrivez votre message ici:</label><br>
                <textarea name="message" required="required" id="message" cols="40" rows="5"></textarea>
                <input type="submit" name="submit" value="Envoyer le post!">
            </div>
        </form>
    <?php }
} else { ?>
    <p>Veuillez vous connecter / vous inscrire pour participer au forum</p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a> |
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>
