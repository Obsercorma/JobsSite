<?php

    //modele
    include_once('modele/mod_etudiants.php');
    $id = $_GET['idOffre'];
    $profilEtudiant = getStudent($id);

    // affichage de la vue associée
    include_once('vue/vue_profil.php');
