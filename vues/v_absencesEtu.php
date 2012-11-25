	<!-- début du form dans v_choixDate -->
		<br>
		<input type="submit" class="btn">
	</form>	<!-- Fin du formulaire "dateDeb dateFin" -->
</header> <!-- Fin section formulaire -->
<div class="clear"></div>

<section>
			<?php 	$_GET['idEtu']=$_GET['id'];
					$etu = infoEtudiant(); ?>
		
			<div class="row-fluid">
				<div class="offset1 span8">
					<h2> Liste des absences de <?php echo $etu['prenomEtu']." ".$etu['nomEtu'];?></h2>
				</div>
				<div class="span2">
					<div class="btn btn-warning"><a href="index.php?lien=gestion&idEtu=<?php echo $_GET['id']; ?>">Informations sur<br> <?php echo $etu['prenomEtu']." ".$etu['nomEtu'];?></a></div><br><br>
				</div>
			</div>

			<?php 
			
				//liste des absence de l'étudiant
				$list = absEtu(); 
				
				foreach ($list as $idAbs)
				{
					echo "<article class='uneAbsence'>";
						echo "<form method='POST'>
								<div class ='row-fluid'>
									<div class ='span1'>
										Cours : 
									</div>
									<div class='span2'>
										<strong>".$idAbs['libCoursAbs']."</strong>
									</div>
									<div class='span3'>";
									echo "<p>Intervenant : <strong>".$idAbs['prenomUti']." ".$idAbs['nomUti']."</strong></p>
									</div>";
									
									//changer le format de la date pour avoir un affichage de type "européen"
									$annee = substr($idAbs['jourAbs'], 0, 4); 
									$mois = substr($idAbs['jourAbs'], 5, 2); 
									$jour = substr($idAbs['jourAbs'], 8, 2);  
									$date = $jour . '/' . $mois . '/' . $annee; 
									echo "<div class='span6'>
												<p>Date : <strong>".$date."</strong> ";
									echo "		Heure : <strong>".$idAbs['hDebAbs']."/".$idAbs['hFinAbs']."</strong></p>
											</div>
								</div>";
						echo '	<div class ="row-fluid">
									<div class ="span1">
										Justifié : 
									</div>
									<div class ="span2"><strong>
										<input type="radio" name="justif" id="justif" value="1" ';	if ($idAbs['justifAbs'])echo 'checked'; echo'>Oui<br>
										<input type="radio" name="justif" id="justif" value="0" ';	if (!($idAbs['justifAbs']))echo 'checked'; echo'>Non
									</strong></div>';
							echo "	<div class ='span9'>
										Motif : <textarea name='motif' style='width:85%'>".$idAbs['motifAbs']."</textarea>
									</div>
								</div>";
									echo 	"<input class='sendgest btn btn-warning' name='button' type='submit' value='Enregistrer'>
											<input class='sendgest btn btn-danger' name='button' type='submit' value='Supprimer'>
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
				<input class='sendgest btn' name='button' type='submit' value='Exporter en CSV'>
				<input class='sendgest btn' name='button' type='submit' value='Exporter en PDF'>
			</form>
	<div class="clear"></div>
</section>