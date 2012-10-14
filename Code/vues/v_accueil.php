<section>

		
		<div id="content">
			<fieldset id ="fieldset">
				<legend><?php echo "Bienvenue ".$_SESSION['prenom']." ".$_SESSION['nom'];?></legend><br>
				<br>
				
				<form action='index.php?lien=launchAppel' method='post'>
					Choisir la spécialité : 
					
					<select name="listSpe">
					<?php // remplissage de la comboBox avec les spécialisation
						foreach ($tabListeSpe as $uneSpe){
							echo "<option value=".$uneSpe['idSpe'].">".$uneSpe['libSpe']."</option>";
						}
					?>
					</select> 
				
					<br>
					Choisir la matière : 
					<input name="libCours" placeholder="..." required type="text"/>
					<br>
					Choisir l'heure du cours : 
					
					<select name="heureDeb">
						<?php affHeures(); ?>
					</select>
					
					<select name="heureFin">
						<?php affHeures(); ?>
					</select>
					<br><br>
					<input type="submit" name="Submit" value="Commencer l'appel">
				</form>
			</fieldset>
			
	
			<div class="clear"></div>
		</div>
	</div>
</section>