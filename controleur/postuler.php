<?php

  $idOffreCandid = $_GET["idOffre"];
  $idEtudiantCandid = $_SESSION["idUser"];

    //modele
    include_once('modele/mod_annonces.php');
    include_once('modele/mod_offre.php');
    applyAJob($idOffreCandid, $idEtudiantCandid);
    $uneOffre = getOffer($idOffreCandid);

    // affichage de la vue associée
    include_once('vue/vue_uneOffre.php');

 ?>
