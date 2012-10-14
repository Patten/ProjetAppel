<?php 
	session_start();
	define("KEY", "GENNEVILLIERS");


	
	include_once ("include/inc_connexion.php"); 
	include ("vues/v_header.html");


	
	if(!(isset($_GET['lien'])))	{	
			if(!(isset($_POST['lien'])))	
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
	
	if (isset($_SESSION['statut']))
	{
		echo"<section class='deco'><a href='include/inc_deconnexion.php'>Déconnexion</a></section>";
	}

	
//==================Affichage du contenu diffŽrent selon le lien passŽ par l'URL (method GET)==========================
		
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