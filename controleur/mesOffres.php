<?php


require_once("modele/mod_dashboard.php");

$listOffers = getOffersFromEmployer($_SESSION["idUser"]);

// affichage de  la    vue associée
include_once('vue/vue_mesOffres.php');
