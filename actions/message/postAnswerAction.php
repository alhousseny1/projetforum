<?php 

require('actions/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $useranswer = nl2br(htmlspecialchars($_POST['answer']));

        $insertanswer = $bdd->prepare('INSERT INTO reponses(id_auteur, pseudo_auteur, id_message, reponse)VALUES(?, ?, ?, ?)');
        $insertanswer->execute(array($_SESSION['id'] , $_SESSION['pseudo'], $idOfMessage, $useranswer));
    }

}