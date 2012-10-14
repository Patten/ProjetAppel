<section>

		<?php

			if ($_GET['idUti'] >=0)		
			{
				$mod = true;
				$uti = infoUtilisateur();
			}
			else 	$mod = false;
		?>		
		
		<section id="content"> <!-- CONTENT -->
			<article class = "formgest"> <!-- Article FORM --> 
				<form method="POST" enctype="multipart/form-data">
				
					<article class="left"> <!-- Photo -->
						<?php 
							if ($_GET['idUti']==-1)
							{ echo "<img src='images/new.jpg' width='200px' height='200px'/>";
							}
							else
							{
								if($uti['photoUti']=='')
								{
									echo "<img src='images/default.jpg' width='200px' height='200px'/>";
								}
								else
								{
									echo "<img src='images/".$uti['photoUti']."' width='200px' height='200px'/>";
								}
								echo"<input name='lbPhoto' type='hidden' value='".$uti['photoUti']."'>";
							}
						?>
						<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
						<input name="fichier" type="file" id="fichier_a_uploader" />
		
		
					</article> <!-- Fin Photo -->
					
					<article class="right"><!-- Info utilisateur -->
						<label for="nom">Nom</label>						<input name='nom' id='nom' type='text' placeholder="..."			<?php if($mod) echo "value='".$uti['nomUti']."'"; ?> size='30' required>	<br>
						<label for="prenom">Prenom</label>					<input name='prenom' id='prenom' type='text' placeholder="..."		<?php if($mod) echo "value='".$uti['prenomUti']."'"; ?> size='30' required> <br>
						<label for="statut">Statut</label>					<input name='statut' id='statut' type='text' placeholder="secretaire/intervenant"		<?php if($mod) echo "value='".$uti['statutUti']."'"; ?> size='30'> <br>
						<label for="log">Login</label>				<input name='log'	 id='log' type='text'  placeholder="..."			<?php if($mod) echo "value='".$uti['logUti']."'"; ?> size='30'>	<br>
						<label for="mdp">Mot de passe</label>				<input name='mdp'	 id='mdp' type='password'  placeholder="..."			<?php if($mod) echo "value='".$uti['mdpUti']."'"; ?> size='30'>	<br>
						<label for="telp">Tel portable</label>				<input name='telp' id='telp' type='text'  placeholder="..."			<?php if($mod) echo "value='".$uti['telPorUti']."'"; ?> size='30'>	<br>
						<label for="telf">Tel fixe</label>					<input name='telf' id='telf' type='text'  placeholder="..."			<?php if($mod) echo "value='".$uti['telFixUti']."'"; ?> size='30'> <br>
						<label for="mail">Mail</label>						<input name='mail' id='mail' type='text'  placeholder="..."			<?php if($mod) echo "value='".$uti['mailUti']."'"; ?> size='30'>	<br>
						
						<label for="ad">Adresse</label>				<input name='ad' id='ad' type='text' placeholder="..."				<?php if($mod) echo "value='".$uti['libAdUti']."'"; ?> size='30'>		<br>
						<label for="cp">Code Postal</label>			<input name='cp' id='cp' type='text' placeholder="..."				<?php if($mod) echo "value='".$uti['cpUti']."'"; ?> size='3'>
						<label for="ville">Ville</label>			<input name='ville' id='ville' type='text' placeholder="..."		<?php if($mod) echo "value='".$uti['villeUti']."'"; ?> size='15'>		<br>
						
					</article> <!-- Fin Info Etudiant -->
					
					
					<input name='idUti' type='hidden' value='<?php echo $_GET['idUti'];?>'>
					<input name='qui' type='hidden' value='utilisateur'>
					<input name='do' type='hidden' <?php if ($_GET['idUti']==-1) echo "value='create'"; else echo  "value='modif'";?> > <!-- pour rester sur la bonne page -->
					<input name='lien' type='hidden' value="gestion"> <!-- pour rester sur la bonne page -->
					<p class="clear"></p>
					
					<input class="sendgest" name='button' type='submit' value='Enregistrer'>
					<input class="sendgest" name='button' type='submit' value='Supprimer'>
					
				</form> <!-- FIN Article FORM -->
				
			</article>
			
			<div class="clear"></div>
		</section> <!-- END CONTENT -->
</section>