<?php

require_once("modele/db_connect.php");

/**
 * @throws PDOException
 * @return array|false Retourne une liste associative de toutes les activités.
 */
function getAllActivities(){
    $bdd = db_connect();
    if($bdd == null) throw new PDOException("Erreur BDD!");

    $req = $bdd->prepare("SELECT * FROM activite ORDER BY intitAct ASC");
    if(!$req->execute()) return false;
    return !($result=$req->fetchAll(PDO::FETCH_ASSOC)) ? [] : $result;
}


?>