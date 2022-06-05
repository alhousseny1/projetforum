<?php
require('actions/message/getInfosOfEditedMessageAction.php');
require('actions/database.php');
//validation du formulaire
if (isset($_POST['validate'])){

    //verifie si les champs sont remplie
    if(!empty($_POST['sujet']) AND !empty($_POST['message'])){

        //données a transmettre dans la requete
        $new_message_sujet = htmlspecialchars($_POST['sujet']);
        $new_message_message = nl2br(htmlspecialchars($_POST['message']));

        //modifier les infos de la question qui possede l'id rentré en parametre dans l'url
        $editMessageOnWebsite = $bdd->prepare('UPDATE message SET sujet = 
        ?,message = ? WHERE id = ?'); 
        $editMessageOnWebsite->execute(array($new_message_sujet, $new_message_message ,$idOfMessage));

        //redirection vers la page d'affichage des message de l'utilsiateur
        header('location: my-message.php');
    }else{
        $errorMsg = "Veuillez complétter tous les champs";
    }

}