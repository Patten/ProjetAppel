	<!-- début du form dans v_choixDate -->
		
		<input type="submit">
	</form>	<!-- Fin du formulaire "dateDeb dateFin" -->
</header> <!-- Fin section formulaire -->


<section>
			<?php 	$_GET['idEtu']=$_GET['id'];
					$etu = infoEtudiant(); ?>
		
			<h1> Liste des absences de <?php echo $etu['prenomEtu']." ".$etu['nomEtu'];?></h1>
			<a href="index.php?lien=gestion&idEtu=<?php echo $_GET['id']; ?>">Infos sur  <?php echo $etu['prenomEtu']." ".$etu['nomEtu'];?></a><br><br>
			
			<?php 
			
				//liste des absence de l'étudiant
				$list = absEtu(); 
				
				foreach ($list as $idAbs)
				{
					echo "<article class='uneAbsence'>";
						echo "<form method='POST'><p>Cours : ".$idAbs['libCoursAbs']."</p>";
						echo "<p>Intervenant : ".$idAbs['prenomUti']." ".$idAbs['nomUti']."</p>";
						
						//changer le format de la date pour avoir un affichage de type "européen"
						$annee = substr($idAbs['jourAbs'], 0, 4); 
						$mois = substr($idAbs['jourAbs'], 5, 2); 
						$jour = substr($idAbs['jourAbs'], 8, 2);  
						$date = $jour . '/' . $mois . '/' . $annee; 
						echo "<p>Date : ".$date." ";
						echo "Heure : ".$idAbs['hDebAbs']."/".$idAbs['hFinAbs']."</p>";
						echo 'Justifié : <input type="radio" name="justif" id="justif" value="1" ';	if ($idAbs['justifAbs'])echo 'checked'; echo'>Oui
										<input type="radio" name="justif" id="justif" value="0" ';	if (!($idAbs['justifAbs']))echo 'checked'; echo'>Non<br>';
						echo "Motif :<textarea name='motif'  rows='3' cols='30'>".$idAbs['motifAbs']."</textarea><br> ";
						echo 	"<input class='sendgest' name='button' type='submit' value='Enregistrer'>
								<input class='sendgest' name='button' type='submit' value='Supprimer'>
								<input type='hidden' name='lien' id='lien' value='absence'>
								<input type='hidden' name='idAbs' id='idAbs' value='".$idAbs['idAbs']."'>
								<input type='hidden' name='dateDeb' id='dateDeb' value='".$_GET['dateDeb']."'>
								<input type='hidden' name='dateFin' id='dateFin' value='".$_GET['dateFin']."'>";
						echo '</form>';
						
					echo "</article><br>";
				}

			?>
			
			<form method="POST">
				<input type='hidden' name='lien' id='lien' value='absence'>
				<input class='sendgest' name='button' type='submit' value='Exporter en CSV'>
				<input class='sendgest' name='button' type='submit' value='Exporter en PDF'>
			</form>
	<div class="clear"></div>
</section>