<?php

require_once("modele/mod_annonces.php");
require_once("modele/mod_activites.php");
require_once("modele/mod_type_contrat.php");

$errMesg = null;
$title_page = "Déposer une annonce";
$activites = getAllActivities();
$typeContrats = getAllTypeContracts();

$isEdit = isset($_GET["editOffre"]) ? intval($_GET["editOffre"]) : 0;
$dataEditAnnon = [];
if($isEdit != 0){
    $dataEditAnnon = getOffer($isEdit);
}

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
        ($isEdit != 0)
    ))==0){
        header("Location: ?section=mesOffres");
    }else{
        $errMesg = "une erreur s'est produite lors du dépôt de votre annonce.";
    }
}


// affichage de  la    vue associée
require_once('vue/vue_depotAnnonces.php');