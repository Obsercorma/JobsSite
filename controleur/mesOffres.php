<?php
require_once("modele/mod_dashboard.php");

$listOffers = getOffersFromEmployer(2);

// affichage de  la    vue associée
include_once('vue/vue_mesOffres.php');