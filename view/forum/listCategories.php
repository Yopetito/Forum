<?php
    $categories = $result["data"]['categories']; 
    $hotTopics = $result["data"]['hots'];
?>

<h1>Liste des catégories</h1>
<div class="main-category-container">
    <div class="category-box">
        <h3>Liste des gatégories</h3>
        <?php
        foreach($categories as $category ){ ?>
            <div class="category-item">
                <p><a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
            </div>
    <?php } ?>
    </div>

    <div class="category-box">
        <h3>hot topics</h3>
        <?php
        foreach($hotTopics as $hotTopic){ ?>
            <div class="category-item">
                <p><?= $hotTopic->getTitle() ?></p>
                <p>Nombre de posts:<?= $hotTopic->getTotalPostsDansTopic() ?></p>
                

            </div>
    <?php } ?>
    </div>
</div>

  
