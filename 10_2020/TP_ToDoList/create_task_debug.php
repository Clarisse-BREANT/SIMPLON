<!doctype html>
<html lang="en">
    <head>
        <title>Création tâche</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- CSS -->
    </head>


    <body>

        <div  id='main' class='container-fluid d-flex flex-column justify-content-between align-items-center min-vh-100'>
            <div id='section'>
                <div class='my-5 text-center'>
                        <h2>Nouvelle Tâche</h2>
                </div>

                <div>
                    <form action="php/xss.php" method="POST">

                        <label for="task_name">Nom de la tâche</label>
                        <input required class='form-control mb-3' placeholder='Entrez le nom de la tâche' type="text" name='task_name' id='task_name'>

                        <label for="task_priority">Priorité de la tâche</label>
                        <select required class='form-control mb-3' name="task_priority" id="task_priority">
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                        </select>

                        <div class='text-center mb-5'>
                            <input class='btn btn-primary my-3' type="submit" value='Créer la tâche'>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <script>
            <?php
                $serveur = "localhost";
                $dbname = "todo_list";
                $user = "phpmyadmin";
                $pass = "hertz89@%JK";
        
                $task_name = $_POST["task_name"];
                $task_priority = $_POST["task_priority"];
                
                try{
                    //On se connecte à la BDD
                    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    //On insère les données reçues si les champs sont remplis
                    if(!empty($task_name)  && !empty($task_priority)){
                        $sth = $dbco->prepare("INSERT INTO tasks(task_name, task_priority) VALUES(:task_name, :task_priority)");
                        $sth->bindParam(':task_name',$task_name);
                        $sth->bindParam(':task_priority',$task_priority);;
                        $sth->execute();
                    }
                    
                    //On récupère les infos de la table 
                    $sth = $dbco->prepare("SELECT task_name, task_priority FROM tasks");
                    $sth->execute();
                    //On affiche les infos de la table
                    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                    $keys = array_keys($resultat);
                    for($i = 0; $i < count($resultat); $i++){
                        $n = $i + 1;
                        echo 'Utilisateur n°' .$n. ' :<br>';
                        foreach($resultat[$keys[$i]] as $key => $value){
                            echo $key. ' : ' .$value. '<br>';
                        }
                        echo '<br>';
                    }
                }   
                catch(PDOException $e){
                    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
                }
            ?>
        </script>

    </body>

</html>