<?php

//====Fonction pour vérifier le login et mdp====
function estIdentifie($login, $mdp)
{
	$requete ="select count(*) as nb from utilisateur where logUti='$login' and mdpUti='$mdp'";
	$resultat =mysql_query($requete);
	$ligne=mysql_fetch_array($resultat);
	return $ligne['nb'];
}

//====Fonction pour afficher le login====
function getName($login, $mdp)
{
	$requete="select idUti, nomUti, prenomUti, statutUti from utilisateur where logUti ='$login' and mdpUti='$mdp'";
	$resultat=mysql_query($requete);
	$ligne=mysql_fetch_array($resultat);
	
	return $ligne;
}

function getAllSpe() //Récupere la liste des spécialisations
{
	$requete="select idSpe, libSpe from specialisation";
	$resultat=mysql_query($requete);
	
	while($ligne=mysql_fetch_array($resultat))
	{
		$tab[]=$ligne;
	}
	
	return $tab;
}

function showTrombi($spe) //Récupere les photos noms et prénoms des étudiants
{
	$requete="select nomEtu, prenomEtu, photoEtu from etudiant where idSpe='$spe'";
	$resultat=mysql_query($requete);
	
	while($ligne=mysql_fetch_array($resultat))
	{
		$tab[]=$ligne;
	}

	return $tab;
}

function affHeures()
{
	for ($i=8; $i<=19; $i++)
	{
		echo "<option value='".$i.":00:00'>".$i."h00</option>";
		echo "<option value='".$i.":30:00'>".$i."h30</option>";
	}
}



?>