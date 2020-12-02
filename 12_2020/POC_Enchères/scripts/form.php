

<!-- FONCTION DE SAUVEGARDE DES DONNEES DU FORMULAIRE DANS UN FICHIER JSON -->

<?php

include '../scripts/file.php'
include '../scripts/class_enchere.php'


    function stockage() {
        if (&& isset($_POST['name'])      && $_POST['name']      != "" 
        && isset($_POST['price'])         && $_POST['price']     != "" 
        && isset($_POST['image'])       //&& $_POST['image']     != "" 
        && isset($_POST['time'])          && $_POST['time']      != "" 
        && isset($_POST['desc'])        //&& $_POST['desc']      != ""
        && isset($_POST['steptime']       && $_POST['steptime']) != "" 
        && isset($_POST['stepprice'])     && $_POST['stepprice'] != ""){

            //Chargement enchères
            $cartonjson = load();

            $carton=[];
            $offset=0;

            //Création des objets toujours existant php
            for ($i=0; $i < count($cartonJson); $i++){
                if ($cartonJson[$i]['m_time'] > time() ) {
                    $carton[$i-$offset] = new Enchere(
                                            $cartonJson[$i]["m_id"],
                                            $cartonJson[$i]["m_name"],
                                            $cartonJson[$i]["m_price"],
                                            $cartonJson[$i]["m_time"],
                                            $cartonJson[$i]["m_image"],
                                            $cartonJson[$i]["m_desc"],
                                            $cartonJson[$i]["m_steptime"],
                                            $cartonJson[$i]["m_stepprice"],
                                            $cartonJson[$i]["m_name"]
                                        );
            } else {$offset++;}
        }

        // CREATION ET INSERTION DE LA NOUVELLE ENCHERE
        $carton[$i - $offset] = new Enchere(
                                        $_POST["id"],
                                        $_POST["name"],
                                        $_POST["price"],
                                        $_POST["time"],
                                        $_POST["image"],
                                        $_POST["desc"],
                                        $_POST["steptime"],
                                        $_POST["stepprice"]
        );

        // ENREGISTREMENT DANS LE FICHIER JSON
        save($carton);
    }
?>