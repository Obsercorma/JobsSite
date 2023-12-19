<?php

// modele
require_once('modele/mod_dashboard.php');
$ActiRecentes = [];
$isStudent = false;
$title_page = "Employeur | Activités récentes";
if (intval($_SESSION["status"])==1) {
  $isStudent = true;
  $title_page = "Étudiant | Activités récentes";
  $ActiRecentes= getApplicationsFromStudent($cnxSession);
}
// affichage de  la    vue associée
require_once('vue/vue_activitesRecentes.php');
