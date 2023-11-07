<?php

require_once("./db_connect.php");

//TODO: Define into DB professionals id status
// 1: Etudiant
// 2: Employeur Particulier
// 3: Employeur Professionnel

/**
 * Recupere la liste de tous les etudiants
 * @throws Exception En cas d'erreur de connexion ou d'execution de la requette avec le BDD.
 * @return array Liste depuis la BDD
 */
function getAllStudents(){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idStatut = 1");
    if(!$req->execute()) throw new Exception("Erreur: Recuperation ensemble des etudiants");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

?>