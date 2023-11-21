<?php

require_once("./db_connect.php");

/**
 * @param int $idEmployer Identifiant de l'employeur
 * @return array Liste des offres crées par l'employeur
 * fonction de son identifiant.
 * @deprecated
 */
function getOffersFromEmployer($idEmployer){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    if(!preg_match("/^[0-9]/", $idEmployer)) throw new Exception("Identifiant inconnue ou mal formé !");
    $req = $bdd->prepare("SELECT * FROM offre WHERE idEmployeur = ?");
    if(!$req->execute([
        $idEmployer
    ]))
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * @param int $idStudent Identifiant de l'étudiant
 * @return array Liste des candidatures crées par l'étudiant
 * fonction de son identifiant.
 * @deprecated
 */
function getApplicationsFromStudent($idStudent){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    if(!preg_match("/^[0-9]/", $idStudent)) throw new Exception("Identifiant inconnue ou mal formé !");
    $req = $bdd->prepare("SELECT C.idEtudiant, O.* FROM candidatures C INNER JOIN offre O ON C.idOffre = O.idOffre WHERE idEtudiant = ?");
    if(!$req->execute([
        $idStudent
    ]))
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

?>