<?php
//GESTION DE LA CONNEXION ADMIN
$logJson = load_log();
$errormessage = "";
if (isset($_POST["identifiant"]) && isset($_POST["password"]){
    if ($_POST["password"]  != $logJson["password"]) {
        $errormessage = "Mot de passe incorrect"
    }
    elseif ($_POST["identifiant"] != $logJson["identifiant"]) {
        $errormessage = "Identifiant incorrect"
    }
    elseif ($_POST["password"]  != $logJson["password"] && $_POST["identifiant"] != $logJson["identifiant"]){
        $errormessage = "Mot de passe et identifiant incorrect"
    }
    else{
        session_star();
        $_SESSION['indentifiant'] = $_POST['identifiant'];
        header('Location:../admin/admin.php');
        exit();
    }
}   
?>