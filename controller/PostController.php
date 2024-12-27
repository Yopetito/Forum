<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class PostController extends AbstractController implements ControllerInterface{
   
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
                
                $this->redirectTo("post", "listPostInTopic", $topicId);
            }
        }
    }
}