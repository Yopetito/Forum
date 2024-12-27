# Forum - Projet PHP MVC (BACK: 90% de l'objectif, FRONT: 30% de l'objectif --- Not done yet ! )
Bienvenue dans Forum, une application en PHP MVC permettant de gérer des discussions en ligne, où les utilisateurs peuvent interagir, créer des sujets et poster des messages dans différentes catégories ! 💬   

## 🛠️ Technologies Utilisées    
### Backend :   
PHP : Langage principal, implémenté avec une structure MVC (Modèle-Vue-Contrôleur) pour une gestion efficace du forum.
SQL : Base de données pour stocker les utilisateurs, les sujets, les messages et les catégories.
### Frontend :
HTML5 / CSS3 : Structure et style des pages du forum.
### Architecture :   
MVC (Modèle-Vue-Contrôleur) : Séparation claire entre la logique métier (Models), la présentation (Views) et les contrôleurs (Controllers).
## 🚀 Fonctionnalités Principales   
### Page Principale :      
Catégories : Visualisez toutes les catégories disponibles pour discuter. Chaque catégorie regroupe des sujets spécifiques.   
Hot Topics : Les sujets les plus populaires, affichés en fonction du nombre de messages (posts).   
Accès rapide aux sujets : Cliquez sur une catégorie pour explorer les sujets qui y sont associés.   
Gestion des Sujets :   
Liste des sujets : Explorez tous les sujets dans une catégorie donnée.   
Voir les messages : Accédez aux messages d'un sujet pour consulter la discussion.   
     
### Gestion des Utilisateurs :   
Inscription et Connexion : Créez un compte, connectez-vous et gérez votre profil.   
Page de profil utilisateur : Visualisez les informations de votre compte.   
Comportement des utilisateurs supprimés : Lorsqu'un utilisateur est supprimé, ses messages restent visibles dans le forum sous le nom "Utilisateur Supprimé", garantissant la continuité de la discussion.   
### Compte Admin :   
Liste des utilisateurs : L'administrateur peut accéder à une page affichant tous les utilisateurs enregistrés et la date de création de leur compte.   
Gestion des utilisateurs : L'admin peut supprimer des utilisateurs, verrouiller des sujets et modérer le contenu du forum.     
    
## 📝 Ajouter un Sujet/Message   
Création d'un sujet : En tant qu'utilisateur enregistré, vous pouvez créer de nouveaux sujets dans une catégorie de votre choix.   
Poster un message : Répondez aux sujets existants ou commentez les messages déjà postés.       
    
## 🔒 Sécurisation et Modération   
Verrouillage de sujets : Lorsqu'un sujet est verrouillé, aucun nouveau message ne peut y être ajouté.   
Suppression d'utilisateur : L'administrateur peut supprimer des utilisateurs, mais leurs messages restent visibles avec le nom "Utilisateur Supprimé".   
