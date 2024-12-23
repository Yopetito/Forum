<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($email && $nickname && $pass1 && $pass2) {
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
        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "s'inscrire"
        ];
    }

    public function login () {

    }
    public function logout () {}
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