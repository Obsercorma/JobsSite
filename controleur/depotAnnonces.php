<?php

require_once("modele/mod_annonces.php");
require_once("modele/mod_activites.php");
require_once("modele/mod_type_contrat.php");

$errMesg = null;
$activites = getAllActivities();
$typeContrats = getAllTypeContracts();


if(isset(
    $_POST["titre"],
    $_POST["activite"],
    $_POST["lieuTravail"],
    $_POST["debutPeriode"],
    $_POST["finPeriode"],
    $_POST["typeContrat"],
    $_POST["description"]
)){
    if(($result=addOffer(
        $_POST["titre"],
        $_POST["activite"],
        $_POST["lieuTravail"],
        $_POST["typeContrat"],
        $_POST["debutPeriode"],
        $_POST["finPeriode"],
        $_POST["description"],
        $_SESSION["idUser"],
        false
    ))==0){
        header("Location: ?section=mesOffres");
    }else{
        $errMesg = "une erreur s'est produite lors du dépôt de votre annonce.";
    }
    var_dump($result);
}


// affichage de  la    vue associée
require_once('vue/vue_depotAnnonces.php');