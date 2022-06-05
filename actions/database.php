<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum2;charset=utf8;', 'root',);
}catch(Exception $e){
    die('Une erreur a été detectée : ' . $e->getMessage());
}
