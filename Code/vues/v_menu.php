<?php
//menu de navigation

	if($_SESSION['statut'] == "intervenant"){
		echo "<div id='wrap'>";
			echo "<nav id='menu'>";
				echo"<ul>";
					echo"<a href='index.php'><li class='categorie'>Appel</li></a>";
					
				echo "</ul>";
			echo "</nav>";
	}
	else if($_SESSION['statut'] == "secretaire"){
		echo "<div id='wrap'>";
			echo "<nav id='menu'>";
				echo"<ul>";
					echo"<a href='index.php'><li class='categorie'>Appel</li></a>";
					echo"<a href='index.php?lien=absence'><li class='categorie'>Absences</li></a>";
					echo"<a href='index.php?lien=gestion'><li class='categorie'>Gestion</li></a>";
				echo "</ul>";
			echo "</nav>";
	}
?>