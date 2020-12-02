<?php
// CHARGEMENT DU FICHIER ENCHERE
function load_encheres() {
    $json = file_get_contents("../data/encheres.json");
    return json_decode($json,true);
}

function load_log() {
    $json = file_get_contents("../data/log.json");
    return json_decode($json,true);
}

// SAUVEGARDE DE LA LISTE DES ENCHERES
function save_encheres($var/*liste des encheres*/) {
    $file_handler = fopen("../data/encheres.json", "w");
    fwrite($file_handler, json_encode($var));
    fclose($file_handler);
}

function save_log($var/*liste des identifiants*/) {
    $file_handler = fopen("../data/log.json", "w");
    fwrite($file_handler, json_encode($var));
    fclose($file_handler);
}
?>