<?php
require_once("./db_connect.php");

define("TOP_OFFERS_LIMIT", 3); // Affiche les N dernières offres.
define("SUCCESS_ADDING_OFFER",0); // L'insertion est un succes
define("INCORRECT_DATA", 1); // Les informations saisi sont incorrects

/**
 * Récupère les 3 dernières offres
 * @return array
 * @throws Exception Génère une erreur en cas d'échec de connexion ou avec la requête SQL.
 */
function getTopOffers(){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    $req = $bdd->prepare("SELECT * FROM offre LIMIT ? ORDER BY idOffre ASC");
    if(!$req->execute(([TOP_OFFERS_LIMIT]))) throw new Exception("Erreur Requête!");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * @param ?int $idEmployeur Identifiant Employeur
 * @return array|false Retourne les offres crées par de l'employeur.
 */
function getOfferFromEmployer($idEmployeur){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(!preg_match("/[0-9]+/", $idEmployeur)) return false;
    $req = $bdd->prepare("SELECT * FROM offre WHERE idEmployeur = ?");
    if(!$req->execute([$idEmployeur])) return false;
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * @param int $idOffre identifiant offre
 * @throws Exception Génère une erreur en cas d'échec de connexion ou avec la requête SQL.
 * @return array|false Retourne les informations spécifique à l'identifiant.
 */
function getOffer($idOffre){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(!preg_match("/[0-9]+/", $idOffre)) return false;

    $req = $bdd->prepare("SELECT * FROM offre WHERE idOffre = ?");
    if(!$req->execute([$idOffre])) return false;
    return $req->fetch(PDO::FETCH_ASSOC);
}
/**
 * @param string $titleOffer Titre de l'offre
 * @param ?int $idActivity Identifiant secteur d'activité
 * @param string $workLocation Lieu de travail
 * @param ?int $contractType Type de contrat (identifiant)
 * @param string $debutPeriod Début periode offre (type: date)
 * @param string $finPeriod Fin perdiode offre (type:data)
 * @param ?int $idEmployeur Identifiant employeur
 * @param string $descContract Description du contrat
 * @throws Exception Génère une erreur en cas d'échec de connexion ou avec la requête SQL.
 * @return int Retourne l'état pour l'insertion.
 */
function addOffer(
    $titleOffer,
    $idActivity,
    $workLocation,
    $contractType,
    $debutPeriod,
    $finPeriod,
    $idEmployeur,
    $descContract
){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(!preg_match("/[a-zA-Z0-9\-\s]+/", $titleOffer)) return INCORRECT_DATA;
    if(!preg_match("/[0-9]{2}/", $idActivity)) return INCORRECT_DATA;
    if(!preg_match("/[0-9]{2}/", $contractType)) return INCORRECT_DATA;
    if(!preg_match("/[a-zA-Z0-9à-ü\s]+/", $workLocation)) return INCORRECT_DATA;
    if(!preg_match("/[a-zA-Z0-9à-ü\s]+/", $descContract)) return INCORRECT_DATA;
    $req = $bdd->prepare("INSERT INTO offre(intitoffre,idAct,lieuTravail,idContrat,debutPeriod,finPeriod,descOffre,idEmployeur) 
    VALUES(:intitOffre,:idAct,:workLocation,:contractType,:debutPeriod,:finPeriod,:descOffre,:idEmployeur)");
    return $req->execute([
        "intitOffre"=>$titleOffer,
        "idAct"=>$idActivity,
        "contractType"=>$contractType,
        "debutOffre"=>$debutPeriod,
        "finPeriod"=>$finPeriod,
        "descOffre"=>$descContract,
        "idEmployeur"=>$idEmployeur
    ]);
}

?>