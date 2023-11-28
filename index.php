<?php

if(session_status() === PHP_SESSION_NONE) session_start();
$isConnected = isset($_SESSION["statut"]);

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    require_once('controleur/portail.php');
}else{
	if ($_GET['section'] == 'login')
	{
		require_once('controleur/login.php');
	}
	elseif ($_GET['section'] == 'dashboardEtud')
	{
		require_once('controleur/dashboardEtudiant.php');
	}
	elseif ($_GET['section'] == 'dashboardEmploi')
	{
		require_once('controleur/dashboardEmployeur.php');
	}
	elseif ($_GET['section'] == 'depotAnno')
	{
		require_once('controleur/depotAnnonces.php');
	}
	elseif ($_GET['section'] == 'mesOffres')
	{
		require_once('controleur/mesOffres.php');
	}
	elseif ($_GET['section'] == 'depotCV')
	{
		require_once('controleur/depotCV.php');
	}
	elseif ($_GET['section'] == 'activitesRecentes')
	{
		require_once('controleur/activitesRecentes.php');
	}
	elseif ($_GET['section'] == 'lesOffres')
	{
		require_once('controleur/lesOffres.php');
	}
	elseif ($_GET['section'] == 'lesEtuds')
	{
		require_once('controleur/lesEtuds.php');
	}
	elseif ($_GET['section'] == 'uneOffre')
	{
		require_once('controleur/uneOffre.php');
	}
	elseif ($_GET['section'] == 'unEtud')
	{
		require_once('controleur/unEtuds.php');
	}
	elseif($_GET["section"] == "testmodels"){
		require_once("controleur/TestModels.php");
	}
	elseif($_GET["section"] == "logout"){
		require_once("controleur/logout.php");
	}
	else{
		header('location: index.php');
	}
}
?>
