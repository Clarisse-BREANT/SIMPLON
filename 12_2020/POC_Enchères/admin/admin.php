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
            <header class=''>
                <h1 class='text-center'>Nom de la Plateforme</h1>
            </header>
            <!--CONTENU-->
            <section>
            <div class='container d-flex flex-column align-items-center'>
                <!--FORMULAIRE-->
                <form action="create_card.php" class='w-50 form my-5'>
                  <h3 class='text'>Créer une nouvelle enchère</h3>

                  <label for="product_name">Nom du produit</label>
                  <input required class='form-control' type="text" name='product_name' id='product_name'>

                  <label for="price">Prix du produit</label>
                  <input required min='1'class='form-control' type="number" name='price' id='price'>

                  <label for="time">Date d'échéance de l'enchère</label>
                  <input required class='form-control' type="datetime" name='time' id='time'>

                  <label for="image">Image du produit</label>
                  <input required class='form-control' type="file" name='image' id='image'>

                  <label for="desc">Description du produit</label>
                  <textarea class='form-control' name="" id="" cols="30" rows="5" name='desc' id='desc'></textarea>

                  <label for="steptime">Augmentation du temps par clic</label>
                  <input required min='0' value='0' class='form-control' type="number" name='steptime' id='steptime'>

                  <label for="stepprice">Augmentation du prix par clic</label>
                  <input required min='1' value='1' class='form-control' type="number" name='stepprice' id='stepprice'>

                  <input class='form-control bg-success my-3' style='color:white;' type="submit" value='Créer une nouvelle enchère'>
                </form>
                <!--TABLEAU DES ENCHERES-->
                <h3>Enchère en cours</h3>
                <div class='gestion-article d-flex w-100'>
                      <?php include '../encheres/card_admin.html' ?>
                </div>
            </div>
            </section>
            <!--FOOTER-->
            <footer>
              <a href="#" class='text-muted'>Mention Légale</a>
              <a href="#" class='text-muted'>Condition de ventes</a>
              <a href="#" class='text-muted'>Contact</a>
            </footer>
        </div>
  </body>
</html>