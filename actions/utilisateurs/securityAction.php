<?php
//sécurité d'authentificatiion
session_start();
if(!isset($_SESSION['auth'])){
    header('location: login.php');
}