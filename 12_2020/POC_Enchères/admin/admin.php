<?php
session_start();
include '../scripts/log_in.php';
include '../scripts/class_enchere.php';

//Si la variable $_SESSION['identifiant'] est vide et qu'il existe un message d'erreur (ergo, l'utilisateur a tenté de se connecté en vain)
  //Alors on le redirige vers la page de login à laquelle on ajoute en url la variable $err (correspondant à l'erreur de l'utilisateur sur sa tentative de connexion) accessible par la méthode GET
if(empty($_SESSION['identifiant']) || isset($err)) {
  header('Location:../admin/log_in.php?err=' . $err);

}

//On charge les données du Json dans un tableau
$file="encheres";
$cartonJson = load($file);
$carton = [];
$card="card_admin";
$offset = 0;
//Pour chaque élément du tableau de données, on regarde si le temps restant de l'enchère est toujours valide. Si oui on l'ajoute au tableau $carton, sinon, l'enchère ne sera pas sauvegardée.
for ($i = 0; $i < count($cartonJson); $i++) {
    if ($cartonJson[$i]["m_time"] > time() && $cartonJson[$i]["m_status"] != "deleted" ){
      $carton[$i-$offset] = new Enchere(
                                $cartonJson[$i]['m_id'],
                                $cartonJson[$i]['m_name'],
                                $cartonJson[$i]['m_price'],
                                $cartonJson[$i]['m_time'],
                                $cartonJson[$i]['m_image'],
                                $cartonJson[$i]['m_desc'],
                                $cartonJson[$i]['m_steptime'],
                                $cartonJson[$i]['m_stepprice'],
                                $cartonJson[$i]['m_status']
      );
    }
    else{
      $offset++;
    }
}

// MANAGE

for ($i=0; $i < count($carton); $i++) {

  if( isset($_POST['show/hide']) || isset($_POST['edit']) || isset($_POST['delete']) ) {

      $seeker = 0;
      $target = -1;

      while ($target == -1 && $seeker < count($carton)) {
        if ( ($carton[$seeker]->getId() == $_POST['show/hide']) 
          || ($carton[$seeker]->getId() == $_POST['edit'])
          || ($carton[$seeker]->getId() == $_POST['delete']) ) {
          $target = $seeker;
        }
        $seeker++;
      }

      if ($target != -1) {
          if (isset($_POST['show/hide']) ) {
              $carton[$target]->changeStatus();
              save($carton, $file);
          }

          elseif (isset($_POST['delete']) ){
            $carton[$target]->deleteCard();
            save($carton, $file);
            header('Location:../admin/admin.php');
          }
      }
      
  }
}
?>

<!-- PAGE RESERVEE A L'ADMINISTRATEUR LUI PERMETTANT DE GERER LES ENCHERES ET D'EN CREER DE NOUVELLES -->


<!doctype html>
<html lang="fr">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/admin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>

  <body>
  <div class='container-fluid'>
            <!--HEADER-->
            <header class='d-flex flex-column'>
                <form class='align-self-end' action="../admin/log_in.php">
                  <button class='btn btn-danger' name="logout" formmethod="POST" type='submit'> DECONNEXION </button>
                </form>
                <h1 class='align-self-center text-center'>Nom de la Plateforme</h1>
            </header>
            <!--CONTENU-->
            <div class='container d-flex flex-column align-items-center'>
                <!--FORMULAIRE-->
                <form action="../scripts/form.php" method='post' class='w-50 form my-5'>
                  <h3 class='text'>Créer une nouvelle enchère</h3>

                  <label for="product_name">Nom du produit</label>
                  <input required class='form-control' type="text" name='name' id='product_name' formmethod="post">

                  <label for="price">Prix du produit</label>
                  <input required min='1'class='form-control' type="number" name='price' id='price' formmethod="post">

                  <label for="time">Date d'échéance de l'enchère</label>
                  <input required class='form-control' type="date" name='time' id='time' formmethod="post">

                  <label for="image">Image du produit</label>
                  <input class='form-control' type="file" name='image' id='image' formmethod="post">

                  <label for="desc">Description du produit</label>
                  <textarea class='form-control' cols="30" rows="5" name='desc' id='desc' formmethod="post"></textarea>

                  <label for="steptime">Augmentation du temps par clic</label>
                  <input required min='0' value='0' class='form-control' type="number" name='steptime' id='steptime' formmethod="post">

                  <label for="stepprice">Augmentation du prix par clic</label>
                  <input required min='1' value='1' class='form-control' type="number" name='stepprice' id='stepprice' formmethod="post">

                  <input class='form-control bg-success my-3' style='color:white;' type="submit" value='Créer une nouvelle enchère' formmethod="post">
                </form>



                
                <!--TABLEAU DES ENCHERES-->

                <h3>Enchère en cours</h3>
                <div class='gestion-article d-flex w-100'>
                  <table class='text-center w-100'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Temps</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>+Prix</th>
                            <th>+Temps</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php   
                      if ($offset > 0) {
                        save($carton, $file);
                      }

                      for ($i = 0; $i < count($carton); $i++) {
                        $carton[$i]->display($card);
                      }

                      ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <!--FOOTER-->
            <footer>
              <a href="#" class='text-muted'>Mention Légale</a>
              <a href="#" class='text-muted'>Condition de ventes</a>
              <a href="#" class='text-muted'>Contact</a>
            </footer>
        </div>
  </body>
</html>