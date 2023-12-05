<?php

  $cnxSession = $_SESSION["idUser"];
// modele
include_once('modele/mod_etudiants.php');
$dashboardEmploy = getEmployer($cnxSession);

// affichage de  la    vue associée
include_once('vue/vue_dashboardEmployeur.php');
