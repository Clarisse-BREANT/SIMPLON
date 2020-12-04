

<!-- PAGE PRINCIPALE DE LA PLATEFORME -->

<!doctype html>
<html lang="fr">
  <head>
    <title>Toto Corp Enchère</title>
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
<?php include '../scripts/file.php';
   include '../scripts/class_enchere.php';
?>
  <body>
        <div class='container-fluid'>
            <header class='d-flex flex-column justify-content-around'>
              <?php  $logJson = load_log();
                  session_start();
                  if ($_SESSION['identifiant'] == htmlspecialchars($logJson[0]["identifiant"])){
              ?>
                      <a class='btn btn-warning align-self-end' href='../admin/admin.php'>Administrateur</a>
              <?php
                  }
                  else{
              ?>
                      <a class='btn btn-warning align-self-end' href='../admin/log_in.php'>Administrateur</a>
              <?php
                  }
              ?>
                <h1 class='align-self-center'>Nom de la Plateforme</h1>
            </header>

            <section>
              <div class='container'>
                <div class='card-deck row row-col-3 d-flex justify-content-around text-center'>
                      <?php 
                      $cartonJson = load_encheres();
                      $carton = [];

                      $offset = 0;


                      for ($i = 0; $i < count($cartonJson); $i++) {

                          if ($cartonJson[$i]["m_time"] > time() ){
                            $carton[$i-$offset] = new Enchere(
                                                      $cartonJson[$i]['m_id'],
                                                      $cartonJson[$i]['m_name'],
                                                      $cartonJson[$i]['m_price'],
                                                      $cartonJson[$i]['m_time'],
                                                      $cartonJson[$i]['m_image'],
                                                      $cartonJson[$i]['m_desc'],
                                                      $cartonJson[$i]['m_steptime'],
                                                      $cartonJson[$i]['m_stepprice']
                            );
                          }
                          else{
                            $offset++;
                          }
                      }
                      
                      if ($offset > 0) {
                        save_encheres($carton);
                      }

                      if(isset($_POST['encherir'])) {
                        $seeker = 0;
                        $target = -1;

                        while ($target == -1 && $seeker < count($carton)) {
                          if ($carton[$seeker]->getId() == $_POST['encherir']) {
                            $target = $seeker;
                          }
                          $seeker++;
                        }

                        if ($target != -1){
                          $carton[$target]->enchere();
                          save_encheres($carton);
                        }
                      }

                      for ($i = 0; $i < count($carton); $i++) {
                        $carton[$i]->display();
                      }

                      ?>
                </div>
              </div>
            </section>

            <footer>
              <a href="#" class='text-muted'>Mention Légale</a>
              <a href="#" class='text-muted'>Condition de ventes</a>
              <a href="#" class='text-muted'>Contact</a>
            </footer>
        </div>

  </body>
</html>