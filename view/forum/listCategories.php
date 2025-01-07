<?php
    $categories = $result["data"]['categories']; 
    $hotTopics = $result["data"]['hotTopics'];
?>


<div class="main-category-container">
    <div class="category-container">
        <h2>Liste des gatégories</h2>
        <div class="category-box">
            <?php
            //Liste des catégories existantes en BDD. 
            foreach($categories as $category ){ ?>
                <a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>">
                    <div class="category-item">
                        <p><?= $category->getName() ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    
    <!-- Liste des 5 topics avec le plus de posts = Hot topics -->
    <div class="category-container">
        <h2>hot topics</h2>
        <div class="category-box">
            <?php
            foreach($hotTopics as $hotTopic){ ?>

                <a href="index.php?ctrl=post&action=listPostInTopic&id=<?=$hotTopic['id_topic'] ?>">
                    <div class="category-item">
                        <p><?= $hotTopic['title'] ?></p>
                        <p>Nombre de posts: <?= $hotTopic['totalPosts'] ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

  
