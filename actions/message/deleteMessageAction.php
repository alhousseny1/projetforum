<?php
//verifie si l'utilisateur est authentifie sur le forum
session_start();
if(!isset($_SESSION['auth'])){
    header('location: ../../login.php');
}
require('../database.php');

//verifie si l'id est rentré en paramtre dans l'url
if (isset($_GET['id']) AND !empty($_GET['id'])){

    //l'id du msg en paramtre
    $idOftheMessage = $_GET['id'];

    //verfie si le message existe
    $checkIfMessageExists = $bdd->prepare('SELECT id_auteur FROM message WHERE id = ?');
    $checkIfMessageExists->execute(array($idOftheMessage));

    if($checkIfMessageExists->rowCount() > 0){

        //recupere les info du message
        $messageInfos = $checkIfMessageExists->fetch();
            if($messageInfos['id_auteur'] == $_SESSION['id']){

                //supprime le message en fonction de l'id rentré en parametre
                $deleteThisMessage = $bdd->prepare('DELETE FROM message WHERE id = ?');
                $deleteThisMessage->execute(array($idOftheMessage));

                header('location: ../../my-message.php');

            }else{
                echo "Vous n'avez pas le droit de supprimer un message qui ne vous appartient pas";
            }

    }else{
        echo "aucun message n'a été trouvé";
    }

}else{
    echo "aucun message n'a été trouvé";
}