<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class TopicController extends AbstractController implements ControllerInterface{
  
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

                    $this->redirectTo("post", "listPostInTopic", $topicId);
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
            $this->redirectTo("topic", "listTopicsByCategory", $topic->getCategory()->getId());
        }
    }
}