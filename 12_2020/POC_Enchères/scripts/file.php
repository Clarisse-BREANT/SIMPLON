<?php
// CHARGEMENT DU FICHIER ENCHERE
/**
 Faire plutôt 1 fonction avec des paramètres plutôt que deux fonctions
 */

function load_encheres() {
    $json = file_get_contents("../data/encheres.json");
    return json_decode($json,true);
}

function load_log() {
    $logjson = file_get_contents("../data/log.json");
    return json_decode($logjson,true);
}

// SAUVEGARDE DE LA LISTE DES ENCHERES
function save_encheres($var/*liste des encheres*/) {
    $file_handler = fopen("../data/encheres.json", "w");
    fwrite($file_handler, json_encode($var));
    fclose($file_handler);
}

function save_log($varlog/*liste des identifiants*/) {
    $file_handler = fopen("../data/log.json", "w");
    fwrite($file_handler, json_encode($varlog));
    fclose($file_handler);
}
?>