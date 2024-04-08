<?php

require_once("modele/db_connect.php");

/**
 * @param int $idEmployer Identifiant de l'employeur
 * @return array Liste des offres crées par l'employeur
 * fonction de son identifiant.
 *
 */
function getOffersFromEmployer($idEmployer){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    if(!preg_match("/^[0-9]/", $idEmployer)) throw new Exception("Identifiant inconnue ou mal formé !");
    $req = $bdd->prepare("SELECT * FROM offre O INNER JOIN activite A ON A.idAct = O.idAct WHERE idEmployeur = ?");
    if(!$req->execute([
        $idEmployer
    ]))
    if($req->rowCount()==0) return [];
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * @param int $idStudent Identifiant de l'étudiant
 * @return array Liste des candidatures crées par l'étudiant
 * fonction de son identifiant.
 *
 */
function getApplicationsFromStudent($idStudent){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    if(!preg_match("/^[0-9]/", $idStudent)) throw new Exception("Identifiant inconnue ou mal formé !");
    $req = $bdd->prepare("SELECT C.idEtudiant, C.idStatut AS statutCandid, O.*, E.* FROM candidature C INNER JOIN offre O ON C.idOffre = O.idOffre JOIN utilisateur E ON E.idUser = O.idEmployeur WHERE C.idEtudiant = ?");
    if($req->execute([
        $idStudent
    ]))
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

?>
