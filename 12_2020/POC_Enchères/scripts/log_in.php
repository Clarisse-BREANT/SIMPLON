<?php
include '../scripts/file.php';
//GESTION DE LA CONNEXION ADMIN
$logJson = load_log(); //Chargement des données de connexion

//Dans tous les cas l'utilisateur sera ammené à la page admin.php à l'envoi du formulaire

//Test des identifiants entrés par l'utilisateur
if (isset($_POST["identifiant"]) && isset($_POST["password"])){
    $identifiant = htmlspecialchars($logJson[0]["identifiant"]);
    //Si le mot de passe ou l'identifiant est incorrect, on créer une variable d'erreur
    if ($_POST["password"]  != $logJson[0]["password"] || $_POST["identifiant"] != $logJson[0]["identifiant"]){
        $errormessage = "Mot de passe et identifiant incorrect";
        echo ("message d'erreur psw et id ". $errormessage);
        $err = "00";
    }
    else{
        //La variable $_SESSION['identifiant'] est initialisé, l'utilisateur est connecté
        $_SESSION['identifiant'] = $identifiant;
    }
}   
//Si le bouton de déconnexion est cliqué, il envoit un post qui supprime la variable $_SESSION['identifiant'] et donc qui déconnecte l'utilisateur
if (isset($_POST['logout'])) {
    unset($_SESSION['identifiant']); 
}
?>