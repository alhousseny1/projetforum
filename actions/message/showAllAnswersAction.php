<?php

require('actions/database.php');

$getAllAnswerOfAMessage = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_message, reponse FROM reponses WHERE id_message = ? ORDER BY id DESC');
$getAllAnswerOfAMessage->execute(array($idOfMessage));