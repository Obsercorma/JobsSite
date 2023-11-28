<?php

    // modele
    include_once('modele/mod_annonces.php');
    $dernieresAnnonces = getTopOffers();

    // affichage de  la    vue associée
    include_once('vue/vue_portail.php');
