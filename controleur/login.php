<?php
// affichage de la vue associée
require_once("modele/mod_login.php");
require_once("modele/mod_status.php");

$errMesgConnect = null;
$errMesgRegister = null;

if(isset(
    $_POST["userlogin"],
    $_POST["passwdlogin"]
)){
    if(($data=loginUser($_POST["userlogin"], $_POST["passwdlogin"]))){
        if(session_status() === PHP_SESSION_NONE) session_start();
        $_SESSION["idUser"] = $data["idUser"];
        $_SESSION["prenom"] = $data["prenom"];
        $_SESSION["nom"] = $data["nom"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["status"] = $data["idStatut"];
        if($data["idStatut"] == 1) header("Location: ?section=dashboardEtud");
        else header("Location: ?section=dashboardEmploi");
    }else{
        $errMesgConnect = "L'identifiant ou le mot de passe est incorrect !";
    }
}

if(isset(
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["civ"],
    $_POST["email"],
    $_POST["tel"],
    $_POST["statut"],
    $_POST["passwd"],
    $_POST["passwd_check"]
)){
    if($_POST["passwd"] == $_POST["passwd_check"]){
        if(intval($_POST["civ"]) != 0){
            if(!is_integer($result=registerUser(
                $_POST["nom"],
                $_POST["prenom"],
                $_POST["civ"],
                $_POST["email"],
                $_POST["tel"],
                $_POST["statut"],
                $_POST["passwd"]
            ))){
                if(session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION["idUser"] = $result["idUser"];
                $_SESSION["prenom"] = $_POST["prenom"];
                $_SESSION["nom"] = $_POST["nom"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["statut"] = intval($_POST["statut"]);
                //echo var_dump([$_SESSION["statut"] == 1, $result["idUser"]]);
                if(intval($_SESSION["statut"]) == 1) header("Location: ?section=dashboardEtud");
                else header("Location: ?section=dashboardEmploi");
            }
        }else{
            $errMesgRegister = "Veuillez renseigner correctement tout les champs.";
        }
    }else{
        $errMesgRegister = "Les mots de passe ne correspondent pas !";
    }
}

$statusChoices = getAllStatus();

include_once('vue/vue_login.php');


?>
