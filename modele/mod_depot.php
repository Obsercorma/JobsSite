<?php

require_once("modele/db_connect.php");

/**
 * @return string Retourne une chaine générée aléatoirement.
 */
function genRandomName($length=10){
    $name = "";
    $alphas = "abcdef1234567890";
    for($i=0;$i<$length;$i++) $name .= $alphas[random_int(0,strlen($alphas)-1)];
    return $name;
}

/**
 * @param string $filename
 * @param string $tmpFilename
 * @param int $fileSize
 * @param ?int $idUser
 * @return string Retourne le status du téléversement.
 * @throws PDOException Erreur connexion BDD; En cas d'erreur de connexion ou d'execution de la requette avec le BDD.
 */
function depotCV($fileName, $tmpFilename, $fileSize, $idUser){
    $bdd = db_connect();
    if($bdd == null) return "Une erreur interne empêche le téléversement de votre CV !";
    
    $allowedFormats = ["pdf"];
    $allowedFileSize = 2097152;
    $extFile = pathinfo($fileName, PATHINFO_EXTENSION);
    if(in_array(
        $extFile,
        $allowedFormats
    ) and $fileSize <= $allowedFileSize){
        $randomFileName = "storage/" . genRandomName() . ".{$extFile}";
        if(move_uploaded_file($tmpFilename, $randomFileName)){
            $req = $bdd->prepare("UPDATE utilisateur SET cvUser = ? WHERE idUser = ?");
            if(!$req->execute([$randomFileName, $idUser])) return "Une erreur interne empêche le téléversement de votre CV !";
            return "Votre CV a bien été déposé";
        }else{
            return "L'ajout de votre CV n'a pas pu s'effectuer !";
        }
    }else{
        return "Veuillez verifier que votre fichier soit bien au format et qu'il soit inferieur ou égale à 2Mo.";
    }
}