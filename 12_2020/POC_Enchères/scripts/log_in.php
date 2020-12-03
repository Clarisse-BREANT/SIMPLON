<?php
include '../scripts/file.php';
//GESTION DE LA CONNEXION ADMIN
$logJson = load_log(); //Chargement des données de connexion

//Test des identifiants entrés par l'utilisateur
if (isset($_POST["identifiant"]) && isset($_POST["password"])){
    //
    $identifiant = htmlspecialchars($logJson[0]["identifiant"]);
    
    if ($_POST["password"]  != $logJson[0]["password"] || $_POST["identifiant"] != $logJson[0]["identifiant"]){
        $errormessage = "Mot de passe et identifiant incorrect";
        echo ("message d'erreur psw et id ". $errormessage);
        $err = "00";
    }
    else{
        //session_start();
        $_SESSION['identifiant'] = $identifiant;
    }
}   

if (isset($_POST['logout'])) {
    unset($_SESSION['identifiant']); 
}
?>