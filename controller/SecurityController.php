<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use App\Session;
use App\DAO;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        if (isset($_POST['submit'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{12,}$/';
            $validPassword = filter_var($pass1, FILTER_VALIDATE_REGEXP, [
                "options" => ["regexp" => $passwordPattern]
            ]);


            if($email && $nickname && $pass1 && $pass2) {

                if (!$validPassword) {
                    var_dump("Mot de passe invalide : minimum 12 caractères, avec au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.");die;
                }
                
                $userManager = new UserManager();
                $user = $userManager->findOneByMail($email);

                // si le mail existe
                if($user) {
                    var_dump("email existe");die;
                } else {
                    $pseudo = $userManager->findOneByNickname($nickname);
                    //si le nickname existe
                    if($pseudo){
                        var_dump("nickname existe");die;
                    } else {
                        if($pass1 == $pass2) {
                            $userManager->add([
                                'email' => $email,
                                'nickname' => $nickname,
                                'password' => password_hash($pass1, PASSWORD_DEFAULT)
                            ]);
                        } else {
                            var_dump("les mdp sont pas identique");die;
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "s'inscrire"
        ];
    }

    public function login () {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($email && $password){
            $userManager = new UserManager();
            $user = $userManager->findOneByMail($email);
            if($user) {
                $hash = $user->getPassword();
                if(password_verify($password, $hash)) {
                    $_SESSION["user"] = $user;
                    header("Location: index.php"); exit;
                } else {
                    header("Location: index.php"); exit;
                }
            } else {
                var_dump("pas connecté");die;
                header("Location: index.php"); exit;
            }
        }

        return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Se connecter"
        ];
    }

    public function logout () {
        unset($_SESSION["user"]);
        header("Location: index.php");
    }

    
    public function profile() {
        $userId = $_SESSION['user']->getId();
        $userManager = new UserManager();
        $user = $userManager->findOneById($userId);
        return [
            "view" => VIEW_DIR."forum/profile.php",
            "meta_description" => "Page profile",
            "data" => ["user" => $user]
        ];
    }

    public function users(){
        $this->restrictTo("ROLE_ADMIN");

        $manager = new UserManager();
        $users = $manager->findAll(['registrationDate', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }

    public function deleteUser($id) {
        $userManager = new UserManager();
        $userManager->delete($id);
        header("Location: index.php?ctrl=security&action=users");
        exit;
    }

    public function deleteTopic($id) {
        $topicManager = new TopicManager();
        $topicManager->delete($id);
        $url = $_SERVER['HTTP_REFERER']; // URL de la page précédente une fois le bouton clické (a savoir les topics dans category)
        header("Location: $url");
        exit;
    }

    public function editUser() {
        //MODIFICATION DU MAIL    
        if (isset($_POST['submit-email'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if($email) {
                $userManager = new UserManager();
                $user = $userManager->findOneByMail($email);

                if($user) {
                    var_dump("email existe");die;
                } else { 
                    $sql = "UPDATE user
                            SET email = :email
                            WHERE id_user = :id";
                    $params = [
                        ":email" => $email,
                        ":id" => $_SESSION["user"]->getId()
                    ];

                    DAO::update($sql, $params);
                    header("Location: index.php?ctrl=security&action=profile");
                    exit;
                }
            }
        //MODIFICATION DU NICKNALME
        } elseif (isset($_POST['submit-nickname'])) {
            $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($nickname) {
                $userManager = new UserManager();
                $user = $userManager->findOneByNickname($nickname);

                if($user) {
                    var_dump("nickname existe");die;
                } else { 
                    $sql = "UPDATE user
                            SET nickname = :nickname
                            WHERE id_user = :id";
                    $params = [
                        ":nickname" => $nickname,
                        ":id" => $_SESSION["user"]->getId()
                    ];

                    DAO::update($sql, $params);
                    header("Location: index.php?ctrl=security&action=profile");
                    exit;
                }
            }
        //MODIFICATION DU MDP
        } elseif (isset($_POST['submit-password'])) {
            $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass3 = filter_input(INPUT_POST, 'pass3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{12,}$/';
            $validPassword = filter_var($pass2, FILTER_VALIDATE_REGEXP, [
                "options" => ["regexp" => $passwordPattern]
            ]);

            if($pass1 && $pass2 && $pass3) {
                if (!$validPassword) {
                    var_dump("Mot de passe invalide : minimum 12 caractères, avec au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.");die;
                }
                
                $userManager = new UserManager(); 
                $user = $userManager->findOneById($_SESSION["user"]->getId());

                if($user) {
                    $hash = $user->getPassword();
                    if(password_verify($pass1, $hash) && $pass2 == $pass3) {
                        $sql = "UPDATE user
                                SET password = :password
                                WHERE id_user = :id";
                        $params = [
                            ":password" => password_hash($pass2, PASSWORD_DEFAULT),
                            ":id" => $_SESSION["user"]->getId()
                        ];
    
                        DAO::update($sql, $params);
                        header("Location: index.php?ctrl=security&action=profile");
                        exit;
                    } else { 
                        var_dump("Old password invalid or new password not correct");die;
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR."security/edit.php",
            "meta_description" => "edition des données de l'utilisateur"
        ];
    }
}

// POUR LE LOGIN:
// -on filtre leschamps du formulaire

// -si les filtre spassent, on retoruve le password correspondant au mail entré dans le formulaire

// -si on le trouve, on recupere le hash de la base de données

// -on retrouve l'utilisateur correspondant

// -on vérifie le mot de passe password_verify

// -si on arrive a se connecte, on fait passer le user en session

// -si aucune des conditions ne passent (mauvais mot de passe, utilisateur inexistant, etc) -> message derreur


// SecurityController

// POUR LE REGISTER:
// -on filtr les champs du foremulaire

// -si les filtres sont valides, on vérifie que le mail n'existe pas déjà (sinon message d'erreur)

// -on vérifie que le pseudo n'existe pas non plus (sinon msg derreur)

// -on vériei que les 2 mot de passe du formulaire soient identiques

// -on ajoute l'utilisateur en base de données