<?php

    // modele
    include_once('modele/mod_etudiants.php');
    $lesEtudiants = getAllStudents();

    // affichage de  la    vue associée
    include_once('vue/vue_listeEtudiants.php');
