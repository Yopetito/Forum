<?php
use app\Session;
$category = $result["data"]['category']; 
$topics = $result["data"]['topics']; 
// Securisation de l'url
if(!empty($topics) && !empty($category)) { ?>
    <!-- ===========Topics dans la category : getName========= -->
    <div class="emplacement-info">
        <div class="emplacement">
            <h1>Categorie: <?= $category->getName() ?></h1>    
        </div>
        <div class="bouton-retour">
            <a href="index.php?ctrl=forum&action=index" class="btn-return"><i class="fa-solid fa-rotate-left"> Categories</i></a>
        </div>
    </div>
    <div class="list-box">
        <div class="headinfo">
            <p>Title</p>
            <p>Autor</p>
            <p>Date</p>
            <p>Status</p>
            <p>Actions</p>
        </div> 
        <?php
        
        // compteur pour creation de la class dynamique pour du CSS
        $i = 0;
        foreach($topics as $topic){ 
        $class = $i % 2 === 0 ? 'even' : 'odd'; ?>
        <div class="list-item-topic <?= $class ?>"> <!-- div avec la class dynamique -->
            
            <!-- affichage de l'information de chaque topic dans la categorie a l'aide des getters -->
            <div class="topic-title">
                <a href="index.php?ctrl=post&action=listPostInTopic&id=<?= $topic->getId() ?>"><span class="title"></span><?= $topic ?></a> 
            </div>
            <div class="topic-autor">
                <?= $topic->getUser() ? $topic->getUser() : "utilisateur supprimé" ?> 
            </div>
            <div class="topic-date"> 
                <?= $topic->getCreationDate() ?>
            </div>
            <div class="topic-status">
                <?php if($topic->getLocked() == 1) { ?>
                    <i class="fa-solid fa-lock"></i>
                <?php } elseif($topic->getLocked() == 0) { ?>
                    <i class="fa-solid fa-lock-open"></i>
                <?php } ?>
            </div>   
            <!-- Vérouillage du topic >>>> si l'utilisateur est connecté && utilateur est propriaitre du topic || l'utilisateur a le role ADMIN  -->
            <div class="topic-action">  
            <?php if(App\Session::getUser() && ($topic->getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId()) || App\Session::isAdmin()) { ?>
                    <a href="index.php?ctrl=topic&action=lockTopic&id= <?= $topic->getId() ?>">
                    <!-- Condition topic vérouillé : Affichage cadénas fermé : ouvert -->
                    <?= $topic->getLocked() ? '<i class="fa-solid fa-lock"></i>' : '<i class="fa-solid fa-lock-open"></i>' ?>
                    </a>
                    
                    <div class="delete-button">
                        <a href="index.php?ctrl=security&action=deleteTopic&id=<?=$topic->getId()?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                    <?php } ?>
            </div>
        
        
        <!--  incrémentation de la var $i pour attribution de "odd" "even" dans le nom de la class-->
            <?php $i++; ?>
        </div>
        <?php  } ?>
    </div>
<?php } else { 
           header("Location: index.php");
           exit;
    } ?>
<!-- Si l'utilisateur est connecté : formulaire de création d'un nouveau topic avec un premier message -->
<?php if(App\Session::getUser()) { ?>
<form class="form-style" action="index.php?ctrl=topic&action=addTopic&id=<?= $category->getId(); ?>" method="POST">
    <div class="form-info">
    
    <label for="topic">Créee un nouveau topic:</label><br>
    <input type="text" name="topic" placeholder="Titre du topic..."><br>
    
    <label for="message_topic">écrivez votre premier message dans ce topic:</label><br>
    <textarea name="message_topic" required="required" id="message_topic" cols="40" rows="5" placeholder="ecrivez votre message ici.."></textarea>
    
    <input type="submit" name="submit" value="Envoyez!">
    </div>
</form>
<?php } else { ?>
    <p>Veuillez vous connecter / vous inscrire pour participer au forum</p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a> |
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php }