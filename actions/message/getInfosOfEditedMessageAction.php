<?php

require('actions/database.php');

//verifie si l'id du message est bien passé en parametre adns l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfMessage = $_GET['id'];

    //verifie si la question et l'utilisateur existe
    $checkIfMessageExists = $bdd->prepare('SELECT * FROM message WHERE id = ?');
    $checkIfMessageExists->execute(array($idOfMessage));

    if($checkIfMessageExists->rowCount() > 0){

        //recupere les donnees du message
        $messageInfos = $checkIfMessageExists->fetch();
        if($messageInfos['id_auteur'] == $_SESSION['id']){

            $message_sujet = $messageInfos['sujet'];
            $message_message = $messageInfos['message'];

            //remplace les <br> par des chaines de characere vide
            $message_message = str_replace(
                '<br/>', '' ,
                $message_message
            );

        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de ce message";
        }

    }else{ $errorMsg = "Aucun message n'a été trouvée.";}

}else{
    $errorMsg = "Aucun message n'a été trouvée.";
}