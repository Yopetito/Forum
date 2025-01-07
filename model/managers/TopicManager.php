<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.category_id = :id
                ORDER BY t.creationDate DESC";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function updateLocked($id, $locked) {
        $sql = "UPDATE topic SET locked = :locked WHERE id_topic = :id";
        DAO::update($sql, ['locked' => $locked, 'id' => $id]);
    }

    public function postPerTopic(){
        $sql = "SELECT
                    t.id_topic,
                    t.title,
                    COUNT(p.id_post) AS totalPosts
                FROM
                    topic t
                INNER JOIN 
                    post p ON t.id_topic = p.topic_id
                GROUP BY
                    t.id_topic, t.title
                ORDER BY
                    totalPosts DESC
                LIMIT 5";
        
        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
}