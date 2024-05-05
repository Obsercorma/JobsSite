<?php

require_once("modele/db_connect.php");
define("OFFER_ADDED", 0);
define("STUDENT_NOT_FOUND", 1);
define("ERROR_BDD_OFFER", 2);
define("OFFER_NOT_FOUND", 3);
define("USER_ALREADY_APPLIED", 4);

/**
 * Permet à un étudiant de postuler à une offre.
 * @param int $idOffre identifiant offre.
 * @param int $idEtudiant identifiant étudiant.
 * @return int Retourne 0 si l'ajout est un succes.
 * Un autre code sera retourné dans le cas contraire.
 * @throws PDOException
 **/
function applyAJob($idOffre, $idEtudiant){
    $bdd = db_connect();
    if($bdd == null) throw new PDOException("Erreur BDD!");

    $reqVerifyStudent = $bdd->prepare("SELECT idUser FROM utilisateur WHERE idUser = ?");
    if(!$reqVerifyStudent->execute([intval($idEtudiant)])) return ERROR_BDD_OFFER;
    if($reqVerifyStudent->rowCount()==0) return OFFER_NOT_FOUND;
    $reqVerifyOffer = $bdd->prepare("SELECT idOffre FROM offre WHERE idOffre = ?");
    if(!$reqVerifyOffer->execute([intval($idOffre)])) return ERROR_BDD_OFFER;
    if($reqVerifyOffer->rowCount()==0) return OFFER_NOT_FOUND;

    try{
        $reqAdd = $bdd->prepare("INSERT INTO candidature(idEtudiant, idOffre) VALUES(?,?)");
        if(!$reqAdd->execute([intval($idEtudiant), intval($idOffre)])) return ERROR_BDD_OFFER;
    }catch(PDOException $e){
        return USER_ALREADY_APPLIED;
    }
    return OFFER_ADDED;
}
?>
