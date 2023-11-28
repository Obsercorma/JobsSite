<?php

    // modele
    include_once('modele/mod_annonces.php');
    $id = $_GET['idOffre'];
    $uneOffre = getOffer($id);

    // affichage de  la    vue associée
    include_once('vue/vue_uneOffre.php');
