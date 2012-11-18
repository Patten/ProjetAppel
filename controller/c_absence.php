<?php
//vérification des champs concernants le cours et appel de trombi pour selectionner les absents

//include des models
//include_once("model/m_g_utilisateur.php");
include_once("model/m_absence.php");
include_once("model/m_connexion.php");
include_once("model/m_g_etudiant.php");

$annee = date('Y'); 
if (date('m') <=8)	$annee--; // si on est en janvier 2013, c'est toujours la promo 2012 qui a cours
if(!(isset($_GET['annee'])))	$_GET['annee']=$annee;
if(!(isset($_GET['spe'])))		$_GET['spe']=1;	// spe 1 means toutes les promos
if(isset($_POST['dateDeb']))	$_SESSION['dateDeb'] = $_POST['dateDeb'];
if(isset($_POST['dateFin']))	$_SESSION['dateFin'] = $_POST['dateFin'];
if(isset($_SESSION['dateDeb'])&& !(isset($_GET['dateFin'])))	$_GET['dateDeb'] = $_SESSION['dateDeb'];
if(isset($_SESSION['dateFin']) && !(isset($_GET['dateFin'])))	$_GET['dateFin'] = $_SESSION['dateFin'];
if(!(isset($_GET['dateDeb'])))	$_GET['dateDeb']=date('Y-m-d', strtotime("-1 year"));
if(!(isset($_GET['dateFin'])))	$_GET['dateFin']=date('Y-m-d');
if(!(isset($_POST['button'])))	$_POST['button']='';

//include des vues
include("vues/v_menu.php");
echo "<section id='content'>"; // <!-- CONTENT -->
	include("vues/v_choixDate.php");

	if(!isset($_GET['id'])) 	{$_GET['id']='-2';}

	if ($_GET['id'] >= -1)
		include("vues/v_absencesEtu.php");
	else
		include("vues/v_listeAbsences.php");
		
	if ($_POST['button']=='Enregistrer')
		updateAbs();
	
	if ($_POST['button']=='Supprimer')
		deleteAbs();
		
	if ($_POST['button']=='Exporter en CSV')
	{
		?><script>document.location="vues/v_csv.php?id=<?php echo $_GET['id']?>";</script><?php
	}
	
	if ($_POST['button']=='Exporter en PDF')
	{
		?><script>document.location="vues/v_pdf.php?id=<?php echo $_GET['id']?>";</script><?php
	}

echo "</section>"; // END CONTENT
?>