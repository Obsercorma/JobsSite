<?php

// modele
include_once('modele/mod_annonces.php');
$errMesg = null;
$id = intval($_GET['idOffre'] ?? 0);
$uneOffre = getOffer($id);

// affichage de  la    vue associée
include_once('vue/vue_uneOffre.php');
