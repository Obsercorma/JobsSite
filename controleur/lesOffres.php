<?php

    //modele
    include_once('modele/mod_annonces.php');
    $lesOffres = getOffers();

    // affichage de  la    vue associée
    include_once('vue/vue_listeOffres.php');
