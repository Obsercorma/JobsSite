<?php

// modele
require_once('modele/mod_dashboard.php');
$ActiRecentes = [];
$isStudent = false;
if (intval($_SESSION["status"])==1) {
  $isStudent = true;
  $ActiRecentes= getApplicationsFromStudent($cnxSession);
}
// affichage de  la    vue associée
require_once('vue/vue_activitesRecentes.php');
