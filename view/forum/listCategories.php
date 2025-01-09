<?php
    $categories = $result["data"]['categories']; 
    $hotTopics = $result["data"]['hotTopics'];
?>


<div class="main-category-container">
    <div class="category-container">
        <h2>Liste des catégories</h2>
        <table class="forum-table">
            <thead>
                <tr>
                    <th>Categorie</th>
                    <th>Topics Posté</th>
                </tr>
            </thead>
            <tbody>
            <?php
            //Liste des catégories existantes en BDD. 
            foreach($categories as $category ){ ?>
                <tr>
                    <td>
                        <a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>">
                            <?= $category->getName() ?>
                        </a>
                    </td>
                    <td>
                        2
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Liste des 5 topics avec le plus de posts = Hot topics -->
    <div class="category-container">
        <h2>hot topics</h2>
        <table class="forum-table">
            <thead>
                <tr>
                    <th>Topic:</th>
                    <th>Nombre de postes</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($hotTopics as $hotTopic){ ?>
                <tr>
                    <td>
                        <a href="index.php?ctrl=post&action=listPostInTopic&id=<?=$hotTopic->getId() ?>">
                        <?= $hotTopic->getTitle() ?>
                        </a>
                    </td>
                    <td>
                       <?= $hotTopic->getTotalPosts() ?>
                    </td>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

  
