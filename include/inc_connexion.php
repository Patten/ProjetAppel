<?php

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
?>