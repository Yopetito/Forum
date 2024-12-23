<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

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
                            'password' => $pass1
                        ]);
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "s'inscrire"
        ];
    }

    public function login () {}
    public function logout () {}
}

// SecurityController

// POUR LE REGISTER:
// -on filtr les champs du foremulaire

// -si les filtres sont valides, on vérifie que le mail n'existe pas déjà (sinon message d'erreur)

// -on vérifie que le pseudo n'existe pas non plus (sinon msg derreur)

// -on vériei que les 2 mot de passe du formulaire soient identiques

// -on ajoute l'utilisateur en base de données