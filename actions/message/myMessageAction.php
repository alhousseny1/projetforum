<?php 

require('actions/database.php');

$getAllMyMessages = $bdd->prepare('SELECT id, sujet, message message FROM message WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyMessages->execute(array($_SESSION['id']));