<?php

require('actions/database.php');

//verifie si l'id du message est rentré dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //recupere l'id du article
    $idOfMessage = $_GET['id'];
    $checkIfMessageExist = $bdd->prepare('SELECT * FROM message WHERE id = ?');
    $checkIfMessageExist->execute(array($idOfMessage));

    if($checkIfMessageExist->rowCount() > 0){

        //recupere toutes les data du message
        $messageInfos = $checkIfMessageExist->fetch();

        //recupere les data du message dans des variables propre
        $message_sujet = $messageInfos['sujet'];
        $message_message = $messageInfos['message'];
        $message_auteur = $messageInfos['id_auteur'];
        $message_pseudo_auteur = $messageInfos['pseudo_auteur'];
        $message_date_publication = $messageInfos['date_publication'];

    }else{
        $errorMsg = "Aucun article n'a été trouvé";
    }

}else{
    $errorMsg = "Aucun article n'a été trouvé";
}
