<?php 

require('actions/database.php');

//valider le formulaire
if (isset($_POST['validate'])){

    //vérifie si les champs ne sont pas vide
    if(!empty($_POST['sujet']) AND !empty($_POST['message'])){

        //les données du message
        $message_sujet = htmlspecialchars($_POST['sujet']);
        $message = nl2br(htmlspecialchars($_POST['message']));
        $date_publication = date('d/m/Y');
        $message_id_auteur = $_SESSION['id'];
        $message_pseudo_utilisateur = $_SESSION['pseudo'];
        
        //var_dump($_SESSION);

        //insere les données dans la bdd via la requete sql
        $insertMessageOnWebsite = $bdd->prepare('INSERT INTO message(sujet,message,date_publication,id_auteur,pseudo_auteur) VALUES(?, ?, ?, ?, ?)');
        $insertMessageOnWebsite->execute(array
        (   
            $message_sujet,
            $message,
            $date_publication,
            $message_id_auteur, 
            $message_pseudo_utilisateur, 
        ));

        $successMsg = "Votre message a bien été postée";

    }else{
          $errorMsg = "veuillez compléter tous les champs";
    }    
}