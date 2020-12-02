<?php
// CHARGEMENT DU FICHIER ENCHERE
function load() {
    $json = file_get_content("../data/encheres.json");
    return json_decode($json,true);
}

// SAUVEGARDE DE LA LISTE DES ENCHERES
function save($var/*liste des encheres*/) {
    $file__handler = fopen("../data/encheres.json", "w");
    fwrite($file_handler, json_encode($var));
    fcloses($file_handler);
}
?>