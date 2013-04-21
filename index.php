<?php 

/* -----------------  INDEX du projet 0 -----------------  

Codé par :
- Cédric Verger
-Julien Ligeret
*/ 

	session_start();
	define("KEY", "GENNEVILLIERS");

	include_once ("include/inc_connexion.php"); 
	include ("vues/v_header.html");

	
	if(!(isset($_GET['lien'])))	{
			if(isset($_SESSION['statut']) && $_SESSION['statut']=="secretaire"){
				$lien='accueil';
			}
			else if(!(isset($_POST['lien'])))	
			{	
				$lien='accueil';
			}else
			{
				$lien=$_POST['lien'];
			}
	}
	else
	{	
			$lien=$_GET['lien'];
	}
	
	
//==================Affichage du contenu différent selon le lien passé par l'URL (method GET)==========================
		
	switch($lien)
	{
		case 'accueil':
		{
			include ("controller/c_accueil.php");
			break;
		}
		case 'connexion' :
		{
			include("controller/c_connexion.php");
			break;
		}
		case 'launchAppel' :
		{
			include("controller/c_appel.php");
			break;
		}	
		case 'gestion' :
		{
			include("controller/c_gestion.php");
			break;
		}	
		case 'absence' :
		{
			include("controller/c_absence.php");
			break;
		}	
		case 'stats':
		{
			include("controller/c_stats.php");
			break;
		}
		case 'confirmerAjout' :
		{
			include("controller/c_confirmerAjout.php");
		}
		case 'sendMail' :
		{
			include("controller/c_mail.php");
		}
	}

	include ("vues/v_footer.html");

?>