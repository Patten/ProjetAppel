<?php
//vérification des champs concernants le cours et appel de trombi pour selectionner les absents

//include des models
include_once("model/m_g_etudiant.php");
include_once("model/m_g_utilisateur.php");
include_once("model/m_gestion.php");

//include des vues
function affAll(){
	include("vues/v_menu.php");
	if (!($_GET['idEtu'] >= -1) && !($_GET['idUti'] >= -1))
		include("vues/v_gestion.php");
	else
	{
		if ($_GET['idEtu'] >= -1)
			include("vues/v_g_etudiant.php");
		else
			include("vues/v_g_utilisateur.php");
	}
}


if(!isset($_POST['do'])) 	{$_POST['do']='';}
if(!isset($_POST['button'])) {$_POST['button']='';}
if(!isset($_POST['qui'])) 	{$_POST['qui']='';}

echo "<section class='affErreur'>";

if($_POST['qui']=='etudiant')
{
	if($_POST['do']=='create' && $_POST['button']=='Enregistrer'){
		if (verifEtu())
		{
			ajouterImage();
			ajouterEtudiant();
		}
		else
		{
			echo "L'un des champs à mal été rempli";
		}
	}

	if($_POST['do']=='modif' && $_POST['button']=='Enregistrer'){
		if (verifEtu())
		{
			ajouterImage();
			modifierEtudiant();
		}
		else
		{
			echo "L'un des champs à mal été rempli";
		}	
	}

	if($_POST['do']=='modif' && $_POST['button']=='Supprimer'){
		supprimerEtudiant();
	}
}
else if($_POST['qui']=='utilisateur')//si utilisateur
{

	if($_POST['do']=='create' && $_POST['button']=='Enregistrer'){
		if (verifUti())//contrôles saisies
		{
			ajouterImage();
			ajouterUtilisateur();
		}
		else
		{
			echo "L'un des champs à mal été rempli";
		}	
	}


	if($_POST['do']=='modif' && $_POST['button']=='Enregistrer'){
		if (verifUti())//contrôles saisies
		{
			ajouterImage();
			modifierUtilisateur();
		}
		else
		{
			echo "L'un des champs à mal été rempli";
		}	
	}

	if($_POST['do']=='modif' && $_POST['button']=='Supprimer'){ 
		supprimerUtilisateur();
	}
}

if($_POST['qui']=='spe')
{
	if($_POST['button']=='Ajouter')
	{
		if(verifSpe())//contrôles saisies
			ajouterSpe();
		else
			echo "L'un des champs à mal été rempli";
	}
}

echo "</section>";

/* Aff la vue */
affAll();

?>