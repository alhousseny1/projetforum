<?php
session_start();
require('actions/database.php');

//validation du formulaire
if(isset($_POST['validate'])){

    //vérifier si l'utilisateur a bien rempli tout les champs
    if(!empty($_POST['nom']) AND  !empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['ddn']) AND !empty($_POST['mdp'])){
        
        //les donnes de l'utilisateur
        $nom_utilisateur = htmlspecialchars($_POST['nom']);
        $pseudo_utilisateur = htmlspecialchars($_POST['pseudo']);
        $email_utilisateur = htmlspecialchars($_POST['email']);
        $ddn_utilisateur = htmlspecialchars($_POST['ddn']);
        $mdp_utilisateur = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        
        //vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM utilisateurs WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($email_utilisateur));

        if($checkIfUserAlreadyExists->rowCount() == 0){

            //inserer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO utilisateurs(nom, pseudo, email, date_naissance, mdp)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array( $nom_utilisateur, $pseudo_utilisateur, $email_utilisateur, $ddn_utilisateur, $mdp_utilisateur));

            //récuperer les info de l'utilisateur
            $getInfoOFThisUserReq = $bdd->prepare('SELECT id, nom, pseudo, email from utilisateurs WHERE email = ? AND nom = ?');
            $getInfoOFThisUserReq->execute(array($email_utilisateur, $nom));

            $UsersInfos = $getInfoOFThisUserReq->fetch();
            
            //authentifier l'utilisateur sur le site et recuperer ses donnée ds des variables global session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['email'] = $usersInfos['email'];

            //rediriger l'utilisateur vers la page d'acceuil
            header('location: index.php');
            
        }else{
            $errorMsg = "L'utilisateur existe déjà sur le forum";
        }

    }else{
        $errorMsg = "Veuillez compléter tout les champs !";
    }

}