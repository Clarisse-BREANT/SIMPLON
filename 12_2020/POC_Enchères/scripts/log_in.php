<?php
include '../scripts/file.php';
//GESTION DE LA CONNEXION ADMIN
$logJson = load_log();
$errormessage = "";
if (isset($_POST["identifiant"]) && isset($_POST["password"])){
    $identifiant = htmlspecialchars($logJson[0]["identifiant"]);
    
    if ($_POST["password"]  != $logJson[0]["password"] && $_POST["identifiant"] != $logJson[0]["identifiant"]){
        $errormessage = "Mot de passe et identifiant incorrect";
    }
    elseif ($_POST["identifiant"] != $logJson[0]["identifiant"]) {
        $errormessage = "Identifiant incorrect";
    }
    elseif ($_POST["password"]  != $logJson[0]["password"]) {
        $errormessage = "Mot de passe incorrect";
    }
    else{
        session_start();
        $_SESSION['indentifiant'] = $identifiant;
        header('Location:../admin/admin.php');
    }
}   
?>