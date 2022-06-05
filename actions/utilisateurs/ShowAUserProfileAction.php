<?php

require('actions/database.php');

//recup l'id de l'utilsiateur
if (isset($_GET['id']) AND !empty($_GET['id'])){

    //l'id de l'utilisateur
    $idOfUsers = $_GET['id'];

    //verifie si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT nom, pseudo FROM utilisateurs WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUsers));

    if($checkIfUserExists->rowCount() >0){

        //recup tte les données de l'utilisateur
        $usersInfo = $checkIfUserExists->fetch();

        $user_nom = $usersInfo['nom'];
        $user_pseudo = $usersInfo['pseudo'];

        //récup tte les question publiés de l'utilisateur
        $GetUsersMessage = $bdd->prepare('SELECT * FROM message WHERE id_auteur = ?');
        $GetUsersMessage->execute(array($idOfUsers));

    }else{
        $errorMsg = "Aucun profil trouvé !";
    }

}else{
    $errorMsg = "Aucun profil trouvé !";
}