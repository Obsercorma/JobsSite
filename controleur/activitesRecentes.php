<?php

$idUser = $_SESSION["idUser"];

// modele
require_once('modele/mod_dashboard.php');
$ActiRecentes = [];

if ($_SESSION["status"]==1) {
  $ActiRecentes= getApplicationsFromStudent($idUser);
}
// affichage de  la    vue associée
require_once('vue/vue_activitesRecentes.php');
