<?php

	if(!isset($etu['photoEtu']))	$etu['photoEtu']='';
	if(!isset($_POST['photo']))	$_POST['photo']=$etu['photoEtu'];
	if(!isset($_GET['idEtu']))	$_GET['idEtu']='-2';
	if(!isset($_POST['idSpe']))	$_POST['idSpe']='1';

	function ajouteretudiant(){
		/* recherche d'un id dispo pour créer une entreprise*/
		$req="SELECT MAX(idEnt) as id FROM entreprise";
		$exereq = mysql_query($req) or die(mysql_error());
		$ligne = mysql_fetch_array($exereq);
		if ($ligne['id']>0)
		{
			$idEnt = $ligne['id'];
			$idEnt++;
		}
		else
			$idEnt = 1;
			
		/* création de l'entreprise */
		$req="INSERT INTO  `entreprise` (
				`idEnt` ,
				`libEnt` ,
				`libAdEnt` ,
				`cpEnt` ,
				`villeEnt` ,
				`nomMA` ,
				`prenomMA` ,
				`telMA` ,
				`mailMA` ,
				`nomRH` ,
				`prenomRH` ,
				`telRH` ,
				`mailRH`
				)
				VALUES (
				'".$idEnt."' ,  '".$_POST['nomEnt']."', '".$_POST['adEnt']."',  '".$_POST['cpEnt']."',  '".$_POST['villeEnt']."',
				'".$_POST['nomma']."',  '".$_POST['prenomma']."',  '".$_POST['telma']."',  '".$_POST['mailma']."',
				'".$_POST['nomrh']."',  '".$_POST['prenomrh']."',  '".$_POST['telrh']."',  '".$_POST['mailrh']."'
				);		";
		$exereq = mysql_query($req) or die(mysql_error());
		
		/* création d'étudiant */
		$req="	INSERT INTO  `etudiant` (
				`idEtu` ,
				`nomEtu` ,
				`prenomEtu` ,
				`dateNaissEtu` ,
				`telPortEtu` ,
				`telFixEtu` ,
				`mailEtu` ,
				`libAdEtu` ,
				`cpEtu` ,
				`villeEtu` ,
				`anneeEtudeEtu` ,
				`photoEtu` ,
				`idSpe` ,
				`idEnt`
				)
				VALUES (
				NULL ,  
				'".$_POST['nom']."',  
				'".$_POST['prenom']."',  
				'".$_POST['datenaiss']."', 
				'".$_POST['telp']."', 
				'".$_POST['telf']."',  
				'".$_POST['mail']."',  
				'".$_POST['ad']."',
				'".$_POST['cp']."', 
				'".$_POST['ville']."', 
				'".$_POST['annee']."', 
				'".$_POST['photo']."',
				'".$_POST['spe']."', 
				'".$idEnt."'
				);			";

		$exereq = mysql_query($req) or die(mysql_error());

		?><script>document.location="index.php?lien=gestion";</script><?php

	}											/* fin ajout étudiant */
	
	
	/* modifier étudiant */
	/* pré-condition : $_POST['idEtu'] existe */
	function modifierEtudiant(){
		/* Modifiacation de l'entreprise */
		$req="	SELECT idEnt FROM etudiant WHERE idEtu='".$_POST['idEtu']."'";
		$exereq = mysql_query($req) or die(mysql_error());
		$idEnt = mysql_fetch_array($exereq);
		
		$req="	UPDATE  `entreprise` SET  
					`libEnt` 	=  '".$_POST['nomEnt']."',
					`libAdEnt` 	=  '".$_POST['adEnt']."',
					`cpEnt` 	=  '".$_POST['cpEnt']."',
					`villeEnt` 	=  '".$_POST['villeEnt']."',
					`nomMA` 	=  '".$_POST['nomma']."',
					`prenomMA` 	=  '".$_POST['prenomma']."',
					`telMA` 	=  '".$_POST['telma']."',
					`mailMA` 	=  '".$_POST['mailma']."',
					`nomRH` 	=  '".$_POST['nomrh']."',
					`prenomRH` 	=  '".$_POST['prenomrh']."',
					`telRH` 	=  '".$_POST['telrh']."',
					`mailRH` 	=  '".$_POST['mailrh']."' 
					WHERE  `idEnt` =  ".$idEnt['idEnt'].";	";		
		$exereq = mysql_query($req) or die(mysql_error());

		/* modification de l'étudiant */
		$req="	UPDATE  `etudiant` SET  
						`nomEtu` 		=  '".$_POST['nom']."',
						`prenomEtu` 	=  '".$_POST['prenom']."',
						`dateNaissEtu`	=  '".$_POST['datenaiss']."',
						`telPortEtu`	=  '".$_POST['telp']."',
						`telFixEtu` 	=  '".$_POST['telf']."',
						`mailEtu` 		=  '".$_POST['mail']."',
						`libAdEtu` 		=  '".$_POST['ad']."',
						`cpEtu` 		=  '".$_POST['cp']."',
						`villeEtu` 		=  '".$_POST['ville']."',
						`anneeEtudeEtu` =  '".$_POST['annee']."',
						`photoEtu` 		=  '".$_POST['photo']."',
						`idSpe` 		=  '".$_POST['spe']."' 
						WHERE  `etudiant`.`idEtu` = ".$_POST['idEtu']." ;
						
			";
		$exereq = mysql_query($req) or die(mysql_error());

		?><script>document.location="index.php?lien=gestion";</script><?php

	}				/* fin modifier étudiant
	
	
	
	/* supprimer étudiant */
	/* pré-condition : $_GET['idEtu'] existe */
	function supprimerEtudiant(){
		//cherche idEnt de l'étudiant à sup
		print_r("1".$_GET['idEtu']."2");
		$req = " SELECT idEnt FROM etudiant
						WHERE idEtu = '".$_GET['idEtu']."'
							";
							
		$exereq = mysql_query($req) or die(mysql_error());
		$ligne = mysql_fetch_array($exereq);

		//sup étudiant
		$req = " DELETE FROM etudiant WHERE idEtu ='".$_GET['idEtu']."'";
		$exereq = mysql_query($req) or die(mysql_error());

		//sup entreprise
		if ($ligne['idEnt'] > 0)
		{
			$req = " DELETE FROM entreprise
							WHERE idEnt = '".$ligne['idEnt']."'
								";
			$exereq = mysql_query($req) or die(mysql_error());	
		}
		?><script>document.location="index.php?lien=gestion";</script><?php
		

	} /* fin supprimer étudiant*/
	
	/* chercher tous les étudiants */
	function listerEtudiant()
	{
		$req="select et.idEtu, nomEtu, prenomEtu, photoEtu, libEnt, libSpe, telPortEtu, mailEtu from etudiant et
				INNER JOIN entreprise en ON en.idEnt=et.idEnt
					INNER JOIN specialisation spe ON spe.idSpe=et.idSpe";
		$exereq = mysql_query($req) or die(mysql_error());
	
		while($ligne=mysql_fetch_array($exereq))
		{
			$tab[]=$ligne;
		}

		return $tab;
	}
	
	/* toutes les infos d'un étudiant */
	function infoEtudiant()
	{
		$req="SELECT * FROM etudiant et
				INNER JOIN entreprise en ON en.idEnt=et.idEnt
					WHERE idEtu='".$_GET['idEtu']."'";
		$exereq = mysql_query($req) or die(mysql_error());
		$ligne=mysql_fetch_array($exereq);
		
		return $ligne;
	}
	

	

?>