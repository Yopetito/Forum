<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>FORUM</title>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                

                <header>
                    <div class="messages-flash">
                        <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                        <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                    </div>
                    <nav>
                        <div class="logo">
                            <img src="public/img/logoforum.webp" alt="Logo" class="logoimg">
                        </div>
                        <div class="slogan">
                            <p class="slogan">Prenez de l'elan</p>
                        </div>
                        <?php
                        if(App\Session::isAdmin()){ ?>
                            <div class="nav-container">
                                <div id="nav-left">
                                    
                                    <a href="index.php?ctrl=security&action=users"><i class="fa-solid fa-table-list"></i>Users</a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="nav-container">
                            <div id="nav-right">
                                <?php
                                // si l'utilisateur est connecté 
                                if(App\Session::getUser()){ ?>
                                    <div class="nav-profil"> 
                                        <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;Profil</a>
                                    </div> 
                                    <div class="nav-pageprincipale">                            
                                        <a href="index.php"><span class="fa-solid fa-house"></span>Page principale</a>
                                    </div>
                                    <div class="nav-listecat">
                                        <a href="index.php?ctrl=forum&action=index"><span class="fa-solid fa-layer-group"></span>Liste des catégories</a>
                                    </div>
                                    <div class="nav-logoff">          
                                        <a href="index.php?ctrl=security&action=logout"><span class="fa-solid fa-share-from-square"></span>Déconnexion</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="nav-pageprincipale">
                                        <a href="index.php">Page principale</a>
                                    </div>
                                    <div class="nav-logoff">
                                        <a href="index.php?ctrl=security&action=login">Connexion</a>
                                    </div>
                                    <div class="nav-logoff">
                                        <a href="index.php?ctrl=security&action=register">Inscription</a>
                                    </div>
                                    <div class="nav-listecat">
                                        <a href="index.php?ctrl=forum&action=index">Liste des catégories</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="settings">
                            <i class="fa-solid fa-gear" id="settings-icon"></i>
                            <div id="color-choice" class="color-choice">
                                <div class="color" style="background-color: #007a9c;"></div>
                                <div class="color" style="background-color: #589458;"></div>
                                <div class="color" style="background-color: #CE86A4;"></div>
                                <div class="color" style="background-color: #C9C9A0;"></div>
                            </div>
                        </div>
                    </nav>
                </header>
                
                <main id="forum">
                    <?= $page ?>
                </main>
            </div>
            <footer>
                <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>