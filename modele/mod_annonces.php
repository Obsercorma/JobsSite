<?php

require_once("./db_connect.php");

/**
 * Récupère les 3 dernières offres
 * @return array
 * @throws Exception Génère une erreur en cas d'échec de connexion ou avec la requête SQL.
 */
function getTopOffers(){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");
    $req = $bdd->prepare("SELECT * FROM offre LIMIT 3 ORDER BY idOffre ASC");
    if(!$req->execute()) throw new Exception("Erreur Requête!");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

?>