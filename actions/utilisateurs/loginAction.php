<?php
session_start();
require('actions/database.php');

//validation du formulaire
if(isset($_POST['validate'])){

    //vérifier si l'utilisateur a bien rempli tout les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['mdp'])){
        
        //les données de l'utilisateur
        $pseudo_utilisateur = htmlspecialchars($_POST['pseudo']);
        $email_utilisateur = htmlspecialchars($_POST['email']);
        $mdp_utilisateur = $_POST['mdp'];
        

        //vérifie si l'utilisateur existe et que l'email est correct
        $checkIfUserExists = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $checkIfUserExists->execute(array($email_utilisateur));
        
        var_dump($checkIfUserExists->rowCount());

        if($checkIfUserExists->rowCount() > 0){
            

            //récupere les données de l'utilisateur
            $usersInfo = $checkIfUserExists->fetch();
            var_dump($usersInfo);
            //var_dump(password_verify($mdp_utilisateur, $usersInfo['mdp']));
            //var_dump($mdp_utilisateur);
            //verifie le mdp
            if(password_verify($mdp_utilisateur, $usersInfo['mdp'])){
                //var_dump($usersInfo);
               //authentification de l'utilisateur sur le site et recuperer ses donnée ds des variables global session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfo['id'];
                $_SESSION['pseudo'] = $usersInfo['pseudo'];
                $_SESSION['email'] = $usersInfo['email'];
                $_SESSION['mdp'] = $usersInfo['mdp'];

                //redirige l'utilisateur vers la page d'acceuil
                header('Location: index.php');

            }else{
                $errorMsg = "Votre mot de passe est incorrect !";
            }

        }else{
             $errorMsg = "Votre email est incorrect !";
        }
               
    }else{
       
    }

}