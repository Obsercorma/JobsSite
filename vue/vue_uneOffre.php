<?php
    include "vue/vue_entete.php";
?>

<?php
        $intitoffre = $uneOffre['intitoffre'];
        $lieutravail = $uneOffre['lieuTravail'];
        $debutperiode = $uneOffre['debutPeriod'];
        $finperiode = $uneOffre['finPeriod'];
        $description = $uneOffre['descOffre'];
        $datepublication = $uneOffre['datePublication'];
        $idcontrat = $uneOffre['idContrat'];


?>

    <h1 class="title fw-bold"><?= $intitoffre ?></h1>
    <div class="card bg-dark bg-opacity-25 text-white rounded border-dark border-3 col-3">

            <img src="vue/images/user.png" class="card-img-top">
            <div class="card-body">
              <hr>
              <h4 class="card-title"><?= $intitoffre?></h4>
                <em><h6 class="card-text"><?="Publié le ", $datepublication ?></h6></em>
                <p class="card-text"><?="Lieu de travail : ", $lieutravail ?></p>
                <?php
                      if(!is_null($finperiode)){
                ?>
                        <p class="card-text"><?="Du ", $debutperiode," au ", $finperiode ?></p>
                <?php
                      }elseif ($idcontrat==1) {
                ?>
                        <p class="card-text"><?="Le ", $debutperiode ?></p>
                <?php
                      }elseif ($idcontrat==3) {
                ?>
                        <p class="card-text"><?="A partir du ", $debutperiode ?></p>
                <?php
                      }
                ?>


                <p class="card-text"><?="Description du poste : ", $description ?></p>
                <a href="#" class="btn btn-primary">Envoyer un message</a>
                <a href="#" class="btn btn-light">Voir son CV</a>
            </div>

          </div>
          <a href="index.php?section=lesOffres" class="btn btn-primary mb-3 mt-3">Découvrir les offres</a>

<?php include_once("vue/vue_footer.php"); ?>
