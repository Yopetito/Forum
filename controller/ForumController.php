<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["name", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function listPostInTopic($id) {
        
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostInTopic($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "List des posts dans ce topic: ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }

    public function addPost() {
        if (isset($_POST['submit'])) {
            $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $topicId = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    
            if ($message && $topicId) {
                $userId = $_SESSION["user"]->getId(); 
                $postManager = new PostManager();
                $postManager->add(['message' => $message, 'topic_id' => $topicId, 'user_id' => $userId]);
                
                $this->redirectTo("forum", "listPostInTopic", $topicId);
            }
        }
    }

    public function addTopic() {
        if(isset($_POST['submit'])) {
            $topicTitle = filter_input(INPUT_POST, "topic", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $topicPost = filter_input(INPUT_POST, "message_topic", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

            if($topicTitle && $topicPost) {
                $userId = $_SESSION["user"]->getId();
                
                $topicManager = new TopicManager();
                $topicId = $topicManager->add(['title' => $topicTitle, 'category_id' => $id, 'user_id' => $userId]);
                
                if($topicPost){
                    $postManager = new PostManager;
                    $postManager->add(['message' => $topicPost, 'topic_id' => $topicId, 'user_id' => $userId]);

                    $this->redirectTo("forum", "listPostInTopic", $topicId);
                }
            }
        }
    }

    public function lockTopic($id) {
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        if($topic){
            $lockstatus = $topic->getLocked() ? 0 : 1;
            $topicManager->updateLocked($id, $lockstatus);
            $this->redirectTo("forum", "listTopicsByCategory", $topic->getCategory()->getId());
        }
    }

}