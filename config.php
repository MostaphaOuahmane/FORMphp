<?php

$hostname = "localhost";
$database_name = "mode_payment";
$database_user = "ouahmane";
$database_user_password = "123";
$dsn = "mysql:host=$hostname;dbname=$database_name";


$option = array(
    // pour affichier les ERROR dans la fichier php 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);