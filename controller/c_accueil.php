<?php
	if (isset($_SESSION['statut']))
	{
		include("vues/v_menu.php");
		include("model/m_connexion.php");
		
		
		if($_SESSION['statut']=="secretaire"){
			$tabListeSpe = getAllSpe();;
		}
		include("vues/v_accueil.php");
	}
	else
	{
		include ("vues/v_connection.php");
	}
?>