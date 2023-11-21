<?php
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/portail.php');
}else{
	if ($_GET['section'] == 'login')
	{
		include_once('controleur/login.php');
	}
	elseif ($_GET['section'] == 'dashboardEtud')
	{
		include_once('controleur/dashboardEtudiant.php');
	}
	elseif ($_GET['section'] == 'dashboardEmploi')
	{
		include_once('controleur/dashboardEmployeur.php');
	}
	elseif ($_GET['section'] == 'depotAnno')
	{
		include_once('controleur/depotAnnonces.php');
	}
	elseif ($_GET['section'] == 'mesOffres')
	{
		include_once('controleur/mesOffres.php');
	}
	elseif ($_GET['section'] == 'depotCV')
	{
		include_once('controleur/depotCV.php');
	}
	elseif ($_GET['section'] == 'activitesRecentes')
	{
		include_once('controleur/activitesRecentes.php');
	}
	elseif ($_GET['section'] == 'lesOffres')
	{
		include_once('controleur/lesOffres.php');
	}
	elseif ($_GET['section'] == 'lesEtuds')
	{
		include_once('controleur/lesEtuds.php');
	}
	elseif ($_GET['section'] == 'uneOffre')
	{
		include_once('controleur/uneOffre.php');
	}
	elseif ($_GET['section'] == 'unEtud')
	{
		include_once('controleur/unEtuds.php');
	}elseif($_GET["section"] == "testmodels"){
		require_once("controleur/TestModels.php");
	}
	else{
		header('location: index.php');
	}
}
?>
