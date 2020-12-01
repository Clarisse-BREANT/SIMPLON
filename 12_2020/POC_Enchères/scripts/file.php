<?php
/**
	Charge le fichier des enchère et en renvoie la liste
*/
function load() {
	$json = file_get_contents("../data/encheres.json");
	return json_decode($json,true);
}

/**
	Sauvegarde la liste des enchères
	
	$var : liste des enchères
*/
function save($var) {
		$file_handler = fopen("../data/encheres.json", "w");
		fwrite($file_handler, json_encode($var) );
		fclose($file_handler);
}
?>