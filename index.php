<?php
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/portail.php');
}
// commenatires
else
{
	if ($_GET['section'] == 'login')
	{
			include_once('controleur/login.php');
	}
	elseif ($_GET['section'] == 'dashboardEtud')
	{
			include_once('controleur/dashboardEtudiant.php');
	}
	elseif ($_GET['section'] == 'dashboardEmploi'){

			include_once('controleur/dashboardEmployeur.php');

	}elseif ($_GET['section'] == 'depotAnno'){

			include_once('controleur/depotAnnonces.php');
	}else{
		header('location: index.php');
	}
}
?>
