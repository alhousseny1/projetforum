<?php

require('actions/database.php');

//récupère 5 message par défaut sans la recherche
$getAllMessages = $bdd->query('SELECT id, sujet, message, id_auteur, pseudo_auteur, date_publication FROM message ORDER BY id DESC LIMIT 0,5');

//verifie si une recherche a été effectué
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //la recherche
    $usersSearch = $_GET['search'];

    //recupere tout les message qui correspondent en fonction du titre (avec LIKE)
    $getAllMessages = $bdd->query('SELECT id, sujet, message, id_auteur, pseudo_auteur, date_publication FROM message WHERE sujet LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    

}