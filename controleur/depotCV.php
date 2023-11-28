<?php
require_once("modele/mod_depot.php");
// affichage de  la    vue associée
$statusMesg = null;
$statusClassname = "alert-warning";
if(session_status() === PHP_SESSION_NONE) session_start();
if(isset(
    $_FILES["cvfile"]
)){
    if($_FILES["cvfile"]["error"] == 0){
        $statusMesg = depotCv(
            $_FILES["cvfile"]["name"],
            $_FILES["cvfile"]["tmp_name"],
            $_FILES["cvfile"]["size"],
            $_SESSION["idUser"]
        );
        $statusClassname = "alert-success";
    }else{
        $statusMesg = "Une erreur est survenue lors du téléversement de votre CV !";
    }
}

include_once('vue/vue_depotCV.php');

