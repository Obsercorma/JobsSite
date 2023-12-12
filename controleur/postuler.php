<?php

$idOffreCandid = $_GET["idOffre"];
$idEtudiantCandid = $_SESSION["idUser"];

//modele
require_once('modele/mod_annonces.php');
require_once('modele/mod_offre.php');
$errMesg = null;
$statusMesg = "alert-danger";
$result = applyAJob($idOffreCandid, $idEtudiantCandid);
switch($result){
  case ERROR_BDD_OFFER:
    $errMesg = "Une erreur interne s'est produite !";
    break;
  case OFFER_NOT_FOUND:
    $errMesg = "L'offre en question est introuvable !";
    break;
  case STUDENT_NOT_FOUND:
    $errMesg = "L'identifiant étudiant est introuvable !";
    break;
  case USER_ALREADY_APPLIED:
    $errMesg = "Vous avez déjà postulé à cette offre !";
    break;
  default:
    $errMesg = "Votre candidature a bien été prise en compte !";
    $statusMesg = "alert-success";
    break;
}
$uneOffre = getOffer($idOffreCandid);

// affichage de la vue associée
require_once('vue/vue_uneOffre.php');

?>
