<?php
$topic = $result["data"]['topic']; 
$posts = $result["data"]['posts']; 
if(!empty($topic) && !empty($posts)) { 
    $categoryId = $topic->getCategory()->getId();
    ?>
    <h1><?= $topic->getTitle() ?> </h1>
    <a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $categoryId ?>" class="btn-return"><i class="fa-solid fa-rotate-left"> topics</i></a>
    <div class="list-box">
        <?php 
        
        // compteur pour creation de la class dynamique pour du CSS
        $i = 0;
        foreach($posts as $post ){ 
        $class = $i % 2 === 0 ? 'even' : 'odd'; ?>
        <div class="list-item <?= $class ?>">
            <!-- affichage de l'information des posts dans un tipic a l'aide des getters -->
            <p>par <?= $post->getUser() ? $post->getUser() : "utilisateur supprimé"  ?> 
            <br>le <?= $post->getCreationDate() ?> <br> <?= $post ?><br><br> </p>
        </div>
        <!--  incrémentation de la var $i pour attribution de "odd" "even" dans le nom de la class-->
        <?php $i++; ?>
        <?php } ?>
    </div>
<?php } else {
    echo "Topic non existant";
} 

//Si l'utilisateur est connecté : formulaire de création d'un nouveau topic avec un premier message
if(App\Session::getUser()) {
    if(!$topic->getLocked()) { ?>
        <form class="form-style" action="index.php?ctrl=post&action=addPost&id=<?= $topic->getId(); ?>" method="POST">
            <div class="form-info">
                <label for="message">Ecrivez votre message ici:</label><br>
                <textarea name="message" id="message" cols="40" rows="5"></textarea>
                <input type="submit" name="submit" value="Envoyer le post!">
            </div>
        </form>
    <?php }
} else { ?>
    <p>Veuillez vous connecter / vous inscrire pour participer au forum</p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a> |
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>
