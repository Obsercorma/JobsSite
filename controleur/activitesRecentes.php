<?php

  $idUser = $_SESSION["idUser"];

    // modele
    include_once('modele/mod_dashboard.php');

    if ($_SESSION["status"]==1) {
      $ActiRecentes= getApplicationsFromStudent($idUser);
    }
    // affichage de  la    vue associée
    include_once('vue/vue_activitesRecentes.php');
