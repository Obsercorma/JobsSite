<?php

require_once("modele/db_connect.php");

/**
 * @throws PDOException 
 * @return array Retourne une liste associative de tout les types de contrats.
 */
function getAllTypeContracts(){
    $bdd = db_connect();
    if($bdd == null) throw new PDOException("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM typecontrat");
    if(!$req->execute()) return false;
    return !($result=$req->fetchAll(PDO::FETCH_ASSOC)) ? [] : $result;
}

?>