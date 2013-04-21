<?php
	if (isset($_SESSION['statut']))
	{
		include_once("vues/v_menu.php");
		include_once("model/m_connexion.php");
		include_once("model/m_calendar.php");

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

		// profil pour les testeurs
		if ($_SESSION['initiales'] == "ZZ")
		{
			$coursDuMoment['libcours'] = "PHP5";
			$coursDuMoment['heureDeb'] = "00:30";
			$coursDuMoment['heureFin'] = "23:30";
		}

		if(isset($_POST['nom_cours']))
		{
			if($_POST['debutHours'] < $_POST['finHours'] && $_POST['nom_cours']<>"")
			{
				$_POST['nom_cours'] = str_replace("'", " ", $_POST['nom_cours']);
				$_POST['nom_cours'] = str_replace('"', ' ', $_POST['nom_cours']);
				$coursDuMoment['libcours'] = $_POST['nom_cours'];
				$coursDuMoment['heureDeb'] = sprintf('%02d', $_POST['debutHours']).':'.$_POST['debutMinutes'];
				$coursDuMoment['heureFin'] = sprintf('%02d', $_POST['finHours']).':'.$_POST['finMinutes'];
			}
			else
			{
				echo "<span class='redMessage'> Erreur dans la création du cours</span>";
			}
		}
		include("vues/v_appel.php");
	}
	else
	{
		include ("vues/v_connection.php");
	}
?>