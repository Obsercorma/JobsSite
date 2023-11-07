<?php

require_once("./db_connect.php");

define("SUCCESS_AUTH_USER", 0); // Connexion/Inscription utilisateur reussi
define("INCORRECT_CREDENTIALS", 1); // Saisi authentification/Inscription incorrect !
define("USER_ALREADY_EXISTS", 2); // L'utilisateur est deja present dans le BDD.
define("USER_INSERTION_ERROR", 4);

/**
 * Methode d'authentification utilisateur
 * La creation de la session est geré en cas de succes
 * @param string $useremail Nom d'utilisateur
 * @param string $passwd Mot de passe
 * @return bool Retourne vrai si l'authentification est un succes
 */
function loginUser($useremail, $passwd){
    $bdd = db_connect();
    if($bdd == null) throw new Exception("Erreur BDD!");

    if(!filter_var(FILTER_VALIDATE_EMAIL, $useremail)) throw new Exception("Adresse email malformé !");

    $req = $bdd->prepare("SELECT idUser,prenom,nom,email,idStatut FROM utilisateur WHERE email = ?");
    if(!$req->execute([$useremail])) return false;
    $data = $req->fetch(PDO::FETCH_ASSOC);
    if(!password_verify($passwd, $data["passwd"])) return false;

    if(session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION["idUser"] = $data["idUser"];
    $_SESSION["prenom"] = $data["prenom"];
    $_SESSION["nom"] = $data["nom"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["status"] = $data["idStatus"];
    return true;
}
/**
 * @param string $nom
 * @param string $prenom
 * @param string $civ Civilite
 * @param string $email
 * @param string $tel
 * @param int $statut (Est etudiant ou autre...)
 * @param string $passwd Mot de passe
 * @throws Exception
 * @return int Retourne un des codes definies au debut de ce fichier. ligne:5
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
        !preg_match("/[a-zA-Z0-9\- ]+/", $nom) or
        !preg_match("/[a-zA-Z0-9\- ]+/", $prenom)
    ) throw new Exception("Nom ou prénom mal formé !");
    if(!preg_match("/[a-zA-Z]+/", $civ)) return INCORRECT_CREDENTIALS;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return INCORRECT_CREDENTIALS;
    if(!preg_match("/[0-9]+/", $tel)) return INCORRECT_CREDENTIALS;
    if(($idStatut=intval($statut))==0) return INCORRECT_CREDENTIALS;

    $reqVerify = $bdd->prepare("SELECT idUser FROM utilisateur WHERE email = ?");
    if(!$reqVerify->execute()) throw new Exception("Impossible de verifier si un utilisateur est deja present dans le BDD.");
    $reqVerify->fetch();
    if(!$reqVerify->rowCount()>0) return USER_ALREADY_EXISTS;

    $req = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,email,passwd,tel,idStatut) VALUES(:nom,:prenom,:email,:passwd,:tel,:statut)");
    if(!$req->execute([
        "nom"=>$nom,
        "prenom"=>$prenom,
        "email"=>$email,
        "passwd"=>password_hash($passwd, PASSWORD_BCRYPT),
        "tel"=>$tel,
        "statut"=>$statut
    ])) return USER_INSERTION_ERROR;
}
?>