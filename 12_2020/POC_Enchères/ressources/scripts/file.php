<?php
// CHARGEMENT DU FICHIER ENCHERE
function load() {
    $json = file_get_contents("../data/encheres.json");
    return json_decode($json,true);
}

// SAUVEGARDE DE LA LISTE DES ENCHERES
function save($var/*liste des encheres*/) {
    $file_handler = fopen("../data/encheres.json", "w");
    fwrite($file_handler, json_encode($var));
    fclose($file_handler);
}
?>