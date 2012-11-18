<?php
		//requete appelée plusieurs fois pour ajouter les absences de tous les étudiants

	/*connection pour Windows --> WAMP */
	$serveur="localhost";
	$utilisateur="root";
	$mdp="";
	$connect=mysql_connect($serveur, $utilisateur, $mdp);
	
	/*connection pour Mac --> MAMP */
	if ($connect== "")
	{
		$serveur="localhost";
		$utilisateur="root";
		$mdp="root";
		$connect=mysql_connect($serveur, $utilisateur, $mdp);
	}
	
	mysql_select_db("projet_appel") or die("echec à la connection");		
		
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
		'".$_POST['heureDeb']."', 
		'".$_POST['heureFin']."',  
		'".$_POST['libCours']."',  
		'0',  
		'".$_POST['motif']."'
		);";
		
		

		$exereq = mysql_query($req) or die(mysql_error());
	
?>