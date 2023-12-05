<?php

require_once("modele/db_connect.php");

define("SUCCESS_AUTH_USER", 0); // Connexion/Inscription utilisateur reussi
define("USER_INSERTION_SUCCESS",0);
define("INCORRECT_CREDENTIALS", 1); // Saisi authentification/Inscription incorrect !
define("INCORRECT_NAMES",2);
define("INCORRECT_EMAIL",3);
define("INCORRECT_PHONE",4);
define("INCORRECT_STATUS_WORK",5);
define("USER_INSERTION_ERROR", 6);
define("INCORRECT_CIV",7);
define("USER_ALREADY_EXISTS",8); // L'utilisateur est deja present dans le BDD.

/**
 * Methode d'authentification utilisateur
 * La creation de la session est geré en cas de succes
 * @param string $useremail Nom d'utilisateur
 * @param string $passwd Mot de passe
 * @return array|false Retourne les informations si l'authentification est un succes
 */
function loginUser($useremail, $passwd){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(!filter_var($useremail, FILTER_VALIDATE_EMAIL)) return false;

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
    if(!$req->execute([$useremail])) return false;
    $data = $req->fetch(PDO::FETCH_ASSOC);
    if($req->rowCount()==0) return false;
    if(!password_verify($passwd, $data["passwd"])) return false;
    return $data;
}
/**
 * @param string $nom
 * @param string $prenom
 * @param string $civ Civilite
 * @param string $email
 * @param string $tel
 * @param int $statut (Est etudiant ou autre...)
 * @param string $passwd Mot de passe
 * @throws PDOException
 * @return array|int Retourne un des codes definies au debut de ce fichier ou l'identifiant utilisateur en cas de succes. ligne:5
 */
function registerUser(
    $nom,
    $prenom,
    $civ,
    $email,
    $tel,
    $statut,
    $passwd
){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(
        !preg_match("/[a-zA-Z0-9\-\w]+/", $nom) or
        !preg_match("/[a-zA-Z0-9\-\w]+/", $prenom)
    ) return INCORRECT_NAMES;
    if(!preg_match("/[0-9]{1}+/", $civ)) return INCORRECT_CIV;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return INCORRECT_EMAIL;
    if(!preg_match("/[0-9]+/", $tel)) return INCORRECT_PHONE;
    if(($idStatut=intval($statut))==0) return INCORRECT_STATUS_WORK;

    $reqVerify = $bdd->prepare("SELECT idUser FROM utilisateur WHERE email = ?");
    if(!$reqVerify->execute([$email])) throw new Exception("Impossible de verifier si un utilisateur est deja present dans le BDD.");
    $reqVerify->fetch();
    if($reqVerify->rowCount()>0) return USER_ALREADY_EXISTS;

    $req = $bdd->prepare("INSERT INTO utilisateur(civilite,nom,prenom,email,passwd,tel,idStatut) 
    VALUES(:civilite,:nom,:prenom,:email,:passwd,:tel,:statut)");
    if(!$req->execute([
        "nom"=>$nom,
        "prenom"=>$prenom,
        "civilite"=>$civ,
        "email"=>$email,
        "passwd"=>password_hash($passwd, PASSWORD_BCRYPT),
        "tel"=>$tel,
        "statut"=>$statut
    ])) return USER_INSERTION_ERROR;
    $reqId = $bdd->prepare("SELECT idUser FROM utilisateur WHERE email = ?");
    if(!$reqId->execute([$email])) return INCORRECT_EMAIL;
    return $reqId->fetch(PDO::FETCH_ASSOC);
}
?>