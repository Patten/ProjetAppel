<?php
	if(!isset($_GET['photo']))	$_GET['photo']='';
	if(!isset($_GET['idUti']))	$_GET['idUti']='-2';

	/* chercher tous les utilisateurs */
	function listerUtilisateur()
	{
		$req="select idUti, nomUti, prenomUti, photoUti, telPorUti, mailUti, statutUti from utilisateur";
		$exereq = mysql_query($req) or die(mysql_error());
	
		while($ligne=mysql_fetch_array($exereq))
		{
			$tab[]=$ligne;
		}

		return $tab;
	}
	
	function ajouterUtilisateur(){
		if ($_POST['statut'] != "secretaire") $_POST['statut'] = "intervenant";
		
		/* crÈation de l'utilisateur */
		$req="	INSERT INTO  `utilisateur` (
				`idUti` ,
				`nomUti` ,
				`prenomUti` ,
				`statutUti` ,
				`logUti` ,
				`mdpUti` ,
				`telFixUti` ,
				`telPorUti` ,
				`mailUti` ,
				`libAdUti` ,
				`cpUti` ,
				`villeUti` ,
				`photoUti`
				)
				VALUES (
				NULL ,  '".$_POST['nom']."',  '".$_POST['prenom']."',  '".$_POST['statut']."',  '".$_POST['log']."',  
				'".md5(KEY.$_POST['mdp'])."',  '".$_POST['telp']."',  '".$_POST['telf']."',  '".$_POST['mail']."',
				  '".$_POST['ad']."',  '".$_POST['cp']."',  '".$_POST['ville']."',  '".$_POST['photo']."'
				); ";

		$exereq = mysql_query($req) or die(mysql_error());
		
		?><script>document.location="index.php?lien=gestion&qui=intervenant";</script><?php

	}
	
	/* modifier utilisateur */
	/* prÈ-condition : $_POST['idUti'] existe */
	function modifierUtilisateur(){
		$reqmdp= "SELECT `mdpUti` FROM utilisateur WHERE `idUti` 	= 	'".$_POST['idUti']."'";
		$exereqmdp = mysql_query($reqmdp) or die(mysql_error());
		$ligne = mysql_fetch_array($exereqmdp);
	
		$req="	UPDATE  `utilisateur` SET  
						`nomUti` 		=  '".$_POST['nom']."',
						`prenomUti` 	=  '".$_POST['prenom']."',
						`statutUti` 	=  '".$_POST['statut']."',
						`logUti`	 	=  '".$_POST['log']."',";
		if ($_POST['mdp'] != $ligne['mdpUti'])			$req.=	"`mdpUti` =  '".md5(KEY.$_POST['mdp'])."',"; // attention, le mdp est chiffré en md5
		$req.=		"	`telPorUti`		=  '".$_POST['telp']."',
						`telFixUti` 	=  '".$_POST['telf']."',
						`mailUti` 		=  '".$_POST['mail']."',
						`libAdUti` 		=  '".$_POST['ad']."',
						`cpUti` 		=  '".$_POST['cp']."',
						`villeUti` 		=  '".$_POST['ville']."',
						`photoUti` 		=  '".$_POST['photo']."'
						WHERE  `idUti` 	= 	".$_POST['idUti']." ;
			";

		$exereq = mysql_query($req) or die(mysql_error());
		
		?><script>document.location="index.php?lien=gestion";</script><?php

	}				/* fin modifier Ètudiant
	
	/* supprimer utilisateur */
	/* pré-condition : $_GET['idUti'] existe */
	function supprimerUtilisateur(){

		$req = " DELETE FROM utilisateur WHERE idUti ='".$_GET['idUti']."'";
		$exereq = mysql_query($req) or die(mysql_error());
			
		?><script>document.location="index.php?lien=gestion&qui=intervenant";</script><?php

		

	} /* fin supprimer Ètudiant*/
	
	/* toutes les infos d'un utilisateur */
	function infoUtilisateur()
	{
		$req="SELECT * FROM utilisateur 
					WHERE idUti='".$_GET['idUti']."'";
		$exereq = mysql_query($req) or die(mysql_error());
		$ligne=mysql_fetch_array($exereq);
		
		return $ligne;
	}
	
	
	

?>