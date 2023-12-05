<?php


require_once("modele/mod_dashboard.php");

$listOffers = getOffersFromEmployer($cnxSession);

// affichage de  la    vue associée
include_once('vue/vue_mesOffres.php');
