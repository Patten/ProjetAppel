<?php
include("model/m_connexion.php");
$login = $_POST['login'];
$mdp=$_POST['mdp'];
$mdp = md5(KEY.$mdp);

$n= estIdentifie($login,$mdp);

		if($n==1) // Il est identifié		
		{				
			$tabUti = getName($login,$mdp);
		
			$_SESSION['statut']=$tabUti['statutUti'];
			$_SESSION['nom']=$tabUti['nomUti'];
			$_SESSION['prenom']=$tabUti['prenomUti'];
			$_SESSION['id']=$tabUti['idUti'];
						
			//header('location:./index.php');
			?><script>document.location="index.php";</script><?php

		}
		else // il n'est pas identifié
		{
			include ("controller/c_accueil.php");
			echo "<br><font color='red'><center>Echec identification. Veuillez réessayer</center></font>";
		} 
?>