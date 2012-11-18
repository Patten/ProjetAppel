<?php
	if (isset($_SESSION['statut']))
	{
		include("vues/v_menu.php");
		include("model/m_connexion.php");
		include("model/m_calendar.php");

		//récupère la liste des cours, avec les spécialités, pour l'intervenant connecté
		$calendar = getCoursInter();
		$coursDuMoment = getCoursduMoment($calendar);
		
		$tabListeSpe = getAllSpe();

		//On affiche la promo 2012 de sept 2012 à août 2013 --> ensuite, on passe à la promo 2013...
		$annee = date('Y');
		if(date('m') <= 8) $annee--;
		if (!empty($coursDuMoment))
		{
			$tabTrombi = showTrombi($coursDuMoment['spe'], $annee);
		}else{
			$tabTrombi = showTrombi(1, $annee);
			$derniersCours = getNextCours($calendar);
		}
		include("vues/v_appel.php");
	}
	else
	{
		include ("vues/v_connection.php");
	}
?>