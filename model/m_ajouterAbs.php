<?php
		//requete appelée plusieurs fois pour ajouter les absences de tous les étudiants

	/*connection pour Windows --> WAMP */
	$serveur="46.218.144.13";
	$utilisateur="cedri374874";
	$mdp="28JEACcz";
	$connect=mysql_connect($serveur, $utilisateur, $mdp);
	
	mysql_select_db("cedri374874") or die("echec à la connection");	
		
		if($_POST['type']==1){
			$req="INSERT INTO  `absence` (
			`idAbs` ,
			`idUti` ,
			`idEtu` ,
			`jourAbs` ,
			`hDebAbs` ,
			`hFinAbs` ,
			`libCoursAbs` ,
			`justifAbs` ,
			`motifAbs`
			)
			VALUES (
			NULL ,  
			'".$_POST['idUti']."', 
			'".$_POST['unAbs']."',  
			'".date("Ymd")."', 
			'".$_POST['hDeb']."', 
			'".$_POST['hFin']."',   
			'".$_POST['libCours']."',   
			'0',  
			'0'
			);";
		}
		else{
			$req = "DELETE FROM `absence` WHERE `idAbs`=".$_POST['idAbs'];
		}
		$exereq = mysql_query($req) or die(mysql_error());
		echo mysql_insert_id();
?>