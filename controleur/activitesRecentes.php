<?php

// modele
require_once('modele/mod_dashboard.php');
$ActiRecentes = [];
$isStudent = false;
$spontaneousCandicacies = [];
$title_page = "Employeur | Activités récentes";
if (intval($_SESSION["status"])==1) {
  $isStudent = true;
  $title_page = "Étudiant | Activités récentes";
  $ActiRecentes= getApplicationsFromStudent($cnxSession);
}else{
  $spontaneousCandicacies = getSpontaneousCandidacies($cnxSession);
  if(isset($_GET["studentCandidacy"])){
    if(isset($_GET["acceptCandidacy"])){
      $idOffre = intval($_GET["acceptCandidacy"]);
      $idEtudiant = intval($_GET["studentCandidacy"]);
      if(updateStatusCandidacy($idEtudiant, $idOffre, true)) header("Location: ?section=activitesRecentes");
    }elseif(isset($_GET["declineCandidacy"])){
      $idOffre = intval($_GET["declineCandidacy"]);
      $idEtudiant = intval($_GET["studentCandidacy"]);
      if(updateStatusCandidacy($idEtudiant, $idOffre, false)) header("Location: ?section=activitesRecentes");
    }
  }
}

// affichage de  la    vue associée
require_once('vue/vue_activitesRecentes.php');
