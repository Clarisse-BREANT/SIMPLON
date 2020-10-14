<?php
            $serveur = "localhost";
            $dbname = "todo_list";
            $user = "root";
            $pass = "";
    
            $task_name = $_POST["task_name"];
            $task_date = $_POST['d-m-y'];
            $task_priority = $_POST["task_priority"];
            $task_description = $_POST["task_description"];
            $task_state = $_POST["task_state"];
            
            try{
                //On se connecte à la BDD
                $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                //On insère les données reçues si les champs sont remplis
                if(!empty($task_name)  && !empty($task_date) && !empty($task_priority) && !empty($task_description) && !empty($task_state)){
                    $sth = $dbco->prepare("INSERT INTO tasks(task_name, task_date, task_priority, task_description, task_state) VALUES(:task_name, :task_date, :task_priority, :task_description, :task_state)");
                    $sth->bindParam(':task_name',$task_name);
                    $sth->bindParam(':task_date',$task_date);
                    $sth->bindParam(':task_priority',$task_priority);
                    $sth->bindParam(':task_description',$task_description);
                    $sth->bindParam(':task_state',$task_state);
                    $sth->execute();
                }
                
                header('task_menu.html');
            }   
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
            }
        ?>