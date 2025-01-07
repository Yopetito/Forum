<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    public function findOneByMail($email) {
        $sql = "SELECT * FROM ".$this->tableName." WHERE email = :email";

        $result = DAO::select($sql, ['email' => $email], false);
        return $this->getOneOrNullResult($result, $this->className);
    }

    public function findOneByNickname($nickname) {
        $sql = "SELECT * FROM ".$this->tableName." WHERE nickname = :nickname";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['nickname' => $nickname]),
            $this->className
        );
    }

    public function findOneById($id) {
        $sql = "SELECT * FROM ".$this->tableName." WHERE id_user = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], false),
            $this->className
        );
    }

    public function updateEmail($email) {
        $sql = "UPDATE user
                SET email = :email
                WHERE id_user = :id";
        
    }

}