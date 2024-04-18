<?php


require_once("modele/mod_dashboard.php");
require_once("modele/mod_annonces.php");

$title_page = "Mes offres";
$listOffers = getOffersFromEmployer($_SESSION["idUser"]);

if(isset($_GET["delOffre"])){
    if(delOffer(intval($_GET["delOffre"]), $_SESSION["idUser"])){
        header("Location: ?section=mesOffres");
    }
}

// affichage de  la    vue associée
include_once('vue/vue_mesOffres.php');
