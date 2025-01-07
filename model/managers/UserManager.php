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
        $params = [
            ":email" => $email,
            ":id" => $_SESSION["user"]->getId()
        ];

        DAO::update($sql, $params);
    }

    public function updateNickname($nickname) {
        $sql = "UPDATE user
                SET nickname = :nickname
                WHERE id_user = :id";
        $params = [
            ":nickname" => $nickname,
            ":id" => $_SESSION["user"]->getId()
        ];

        DAO::update($sql, $params);
    }

    public function updatePassword($password) {
        $sql = "UPDATE user
                SET password = :password
                WHERE id_user = :id";
        $params = [
            ":password" => password_hash($password, PASSWORD_DEFAULT),
            ":id" => $_SESSION["user"]->getId()
        ];

        DAO::update($sql, $params);
    }
}