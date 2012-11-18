<?php

	$parQui = "Appel de ".$_SERVER["REMOTE_ADDR"]."<br><br>";

	$heure = date ('H:i:s');
	$mess = "Test du cron : m_cron.php appelé à ".$heure." ".$parQui;
	//mail('webdcedric@gmail.com', 'Absence', $mess);
	echo $mess;

	include_once ("../include/inc_connexion.php"); 

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
				'testCron',  
				'testCron',   
				'',
				'', 
				'', 
				'',
				'".$heure."',
				'', 
				'".$parQui."',
				'',
				'',
				'1', 
				'1'
				);			";

		//$exereq = mysql_query($req) or die(mysql_error());
		//echo "<br>Etu ajouté.";

?>