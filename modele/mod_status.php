<?php

require_once("modele/db_connect.php");

/**
 * @return array Retourne une liste associative de tous les status.
 * @throws PDOException Soulève une erreur en cas d'erreur avec la BDD.
 */
function getAllStatus(){
    $bdd = db_connect();
    if($bdd == null) throw new PDOException("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM statut ORDER BY idStatut");
    if(!$req->execute()) throw new PDOException("Erreur Requettage SQL !");
    if($req->rowCount()==0) return [];
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

?>