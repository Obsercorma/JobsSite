<?php

require_once("modele/db_connect.php");

//TODO: Define into DB professionals id status
define("STUDENT_ID", 1); // Etudiant
define("INDIVIDUAL_EMPLOYER_ID", 2); // Employeur Particulier
define("ENT_EMPLOYER", 3); // Employeur Professionnel

/**
 * Recupere la liste de tous les etudiants
 * @throws Exception Erreur connexion BDD; En cas d'erreur de connexion ou d'execution de la requette avec le BDD.
 * @return array Liste depuis la BDD
 */
function getAllStudents(){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idStatut = 1");
    if(!$req->execute()) throw new Exception("Erreur: Recuperation ensemble des etudiants");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param int $idStudent Identifiant Etudiant
 * @return array Informations Etudiant
 * @throws Exception Erreur connexion BDD; Identifiant utilisateur incorrect ou Etudiant introuvable.
 */
function getStudent($idStudent){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    // Prefer: Keep regex check if 'id student' type or structure has changed
    if(!preg_match("/[0-9]{1,}+/", $idStudent)) throw new Exception("Identifiant utilisateur incorrect (doit être numérique");

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idUser = ? AND idStatut = 1");
    if(!$req->execute([$idStudent])) throw new Exception("Etudiant introuvable !");
    if($req->rowCount()==0) return [];
    return $req->fetch(PDO::FETCH_ASSOC);
}
/**
 * @param int $idEmployer Identifiant employeur
 * @return array Informations employeur
 * @throws Exception Erreur connexion BDD; Identifiant Employeur incorrect ou Employeur introuvable
 */
function getEmployer($idEmployer){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idUser = ? AND idStatut > 1");
    if(!$req->execute([$idEmployer])) throw new Exception("Employeur introuvable");
    if($req->rowCount()==0) return [];
    return $req->fetch(PDO::FETCH_ASSOC);
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
    $req = $bdd->prepare("SELECT C.idEtudiant, O.* FROM candidature C INNER JOIN offre O ON C.idOffre = O.idOffre WHERE idEtudiant = ?");
    if(!$req->execute([
        $idStudent
    ]))
    if($req->rowCount()==0) return [];
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
?>