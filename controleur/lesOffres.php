<?php
$title_page = "Liste des offres";
//modele
include_once('modele/mod_annonces.php');
$dataSearch = isset($_GET["query"]) ? htmlspecialchars($_GET["query"]) : null;
$lesOffres = $dataSearch != null ? getOffersFromSearchBar(strtolower($dataSearch)) : getOffers();

// affichage de  la    vue associée
include_once('vue/vue_listeOffres.php');
