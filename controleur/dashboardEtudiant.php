<?php

    $cnxSession = $_SESSION["idUser"];
    $cnxSessionPrenom = $_SESSION["prenom"];
    $cnxSessionNom = $_SESSION["nom"];
    // Modele
    include_once('modele/mod_etudiants.php');
    $dashboardEtud = getStudent($cnxSession);




    // affichage de  la    vue associée
    include_once('vue/vue_dashboardEtudiant.php');
