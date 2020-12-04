

<!-- CODE HTML POUR LA GENERATION DES CARTES POUR LES UTILISATEURS -->

<div class='card'>
    <div class='card-header'>
        <h5 class='card-title font-weight-bold'>Nom du produit : <?php echo $this->m_name; ?></h5>
    </div>
    <div class='card-body'>
        <h5 class='card-title font-weight-bold' style='color:red;'>Prix du produit : <?php echo $this->m_price; ?></h5>
        <img class='card-img' src="<?php echo $this->m_image; ?>" alt="Iphone">
        <p class='card-text font-weight-bold' style='color:red;'>Temps restant : <?php echo date("H:i:s", - $this->m_time - time() -3600)?> </p>
        <form method="POST">
            <button class='btn btn-warning w-75' formmethod='POST'>ACHETER
                <input type="hidden" name="encherir" value="<?php echo $this->m_id ?>" formmethod="post">
            </button>
        </form>
    </div>
    <div class='card-footer'>
        <div class='card-text'>
            <p> <?php echo $this->m_desc; ?> </p>
            <p>Temps : <?php echo $this->m_steptime; ?> secondes/clic</p>
            <p>Prix : <?php echo $this->m_stepprice; ?> centimes/clic</p>
        </div>
    </div>
</div>