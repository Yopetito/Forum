<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>
<div class="main-category-container">
    <div class="category-box">
        <h3>Liste des gatégories</h3>
        <?php
        foreach($categories as $category ){ ?>
            <div class="category-item">
                <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
            </div>
    <?php } ?>
    </div>

    <div class="category-box">
        <h3>hot topics</h3>
        <?php
        for($i = 1; $i <= 5; $i++){ ?>
            <div class="category-item">
                <p>Hot topic</p>
            </div>
    <?php } ?>
    </div>
</div>

  
