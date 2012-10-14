<section>

		<?php 
			if ($_GET['idEtu'] >=0)		
			{
				$mod = true;
				$etu = infoEtudiant();
			}
			else 	$mod = false;
			
			/* Liste des spécialisations */
			$tabSpe = listerSpe();
			
			/* anneeEtudeEtu*/
			$annee = date('Y');
			if(date('m') <= 8) $annee--;
		?>		

		<section id="content"> <!-- CONTENT -->
			<article class = "formgest"> <!-- Article FORM --> 
				<form method="POST" enctype="multipart/form-data" >
				
					<article class="left"> <!-- Photo -->
						<?php
							if ($_GET['idEtu']==-1)
							{ 
								echo "<img src='images/new.jpg' width='200px' height='200px'/>";
							}
							else
							{ 	
								if($etu['photoEtu']=='')
								{
									echo "<img src='images/default.jpg' width='200px' height='200px'/>";
								}
								else
								{
									echo "<img src='images/".$etu['photoEtu']."' width='200px' height='200px'/>";
								}
								echo"<input name='lbPhoto' type='hidden' value='".$etu['photoEtu']."'>";
							}
							
							
						?>
						<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
						<input name="fichier" type="file" id="fichier_a_uploader" />
		
	
						
					</article> <!-- Fin Photo -->

					<article><!-- Info étudiant -->
						<label for="nom">Nom</label>						<input name='nom' id='nom' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomEtu']."'"; ?> size='30' required>	<br>
						<label for="prenom">Prenom</label>					<input name='prenom' id='prenom' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomEtu']."'"; ?> size='30' required> <br>
						<label for="datenaiss">Date de naissance</label>	<input name='datenaiss' id='datenaiss' type='datetime' placeholder="Format AAAA-MM-JJ"		<?php if($mod) echo "value='".$etu['dateNaissEtu']."'"; ?>  > <br>
						<label for="telp">Tel portable</label>				<input name='telp' id='telp' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['telPortEtu']."'"; ?> size='30'>	<br>
						<label for="telf">Tel fixe</label>					<input name='telf' id='telf' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['telFixEtu']."'"; ?> size='30'> <br>
						<label for="mail">Mail</label>						<input name='mail' id='mail' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['mailEtu']."'"; ?> size='30'>	<br>
						
						<label for="ad">Adresse</label>				<input name='ad' id='ad' type='text' placeholder="..."				<?php if($mod) echo "value='".$etu['libAdEtu']."'"; ?> size='30'>		<br>
						<label for="cp">Code Postal</label>			<input name='cp' id='cp' type='text' placeholder="..."				<?php if($mod) echo "value='".$etu['cpEtu']."'"; ?> size='3'>
						<label for="ville">Ville</label>			<input name='ville' id='ville' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['villeEtu']."'"; ?> size='15'>		<br>
						
						<label for="telf">Année d'étude</label>		<input name='annee' id='annee' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['anneeEtudeEtu']."'"; else echo "value='".$annee."'"; ?> size='30'>	<br>
						<label for="spe">Spécialité</label>			<select name="spe" id='spe'>
																	<?php 	foreach($tabSpe as $key => $value)
																			{
																				echo "<option value='".$key."'";
																				if($mod){if($etu['idSpe']==$key) echo 'selected';}
																				echo">".$value."</option>";
																			}
																	?>
																	</select>
					</article class="right"><br><br> <!-- Fin Info Etudiant -->
					
					<fieldset> <!-- ENTREPRISE --> 
						<legend style="text-align:center;">Entreprise</legend><br>
						<label for="nomEnt">Nom</label>				<input name='nomEnt' id='nomEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['libEnt']."'"; ?> size='30'>	<br>
						<label for="adEnt">Adresse</label>			<input name='adEnt' id='adEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['libAdEnt']."'"; ?> size='30'>		<br>
						<label for="cpEnt">Code Postal</label>		<input name='cpEnt' id='cpEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['cpEnt']."'"; ?> size='3'>	
						<label for="villeEnt">Ville</label>			<input name='villeEnt' id='villeEnt' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['villeEnt']."'"; ?> size='15'>	<br>
						
						<fieldset class="right"> <!-- ENTREPRISE  RH --> 
							<legend>Responsable RH</legend>
							<label for="nomrh">Nom</label>			<input name='nomrh' id='nomrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomRH']."'"; ?> size='30'>	<br>
							<label for="prenomrh">Prenom</label>	<input name='prenomrh' id='prenomrh' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomRH']."'"; ?> size='30'>	<br>
							<label for="telrh">Tel</label>			<input name='telrh' id='telrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['telRH']."'"; ?> size='30'>		<br>
							<label for="mailrh">Mail</label>		<input name='mailrh' id='mailrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['mailRH']."'"; ?> size='30'>		<br>
						</fieldset> <!-- FIN ENTREPRISE RH -->
						
						<fieldset class="left"> <!-- ENTREPRISE  Maître d'apprentissage --> 
							<legend>Maître d'apprentissage</legend>
							<label for="nomma">Nom</label>			<input name='nomma' id='nomma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomMA']."'"; ?> size='30'>	<br>
							<label for="prenomma">Prenom</label>	<input name='prenomma' id='prenomma' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomMA']."'"; ?> size='30'>	<br>
							<label for="telma">Tel</label>			<input name='telma' id='telma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['telMA']."'"; ?> size='30'>		<br>
							<label for="mailma">Mail</label>		<input name='mailma' id='mailma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['mailMA']."'"; ?> size='30'>		<br>
						</fieldset> <!-- FIN ENTREPRISE Maître d'apprentissage -->
						<div class="clear"></div>
						
					</fieldset> <!-- FIN ENTREPRISE --> 
					
					<input name='idEtu' type='hidden' value='<?php echo $_GET['idEtu'];?>'>
					<input name='qui' type='hidden' value='etudiant'>
					<input name='do' type='hidden' <?php if ($_GET['idEtu']==-1) echo "value='create'"; else echo  "value='modif'";?> > <!-- pour rester sur la bonne page -->
					<input name='lien' type='hidden' value="gestion"> <!-- pour rester sur la bonne page -->
					
					<input class="sendgest" name='button' type='submit' value='Enregistrer'>
					<input class="sendgest" name='button' type='submit' value='Supprimer'>
					
				</form> <!-- FIN Article FORM -->
				
			</article>
			<div class="clear"></div>
		</section> <!-- END CONTENT -->
</section>