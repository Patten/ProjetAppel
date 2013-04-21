<section>

		<?php

			if ($_GET['idUti'] >=0)		
			{
				$mod = true;
				$uti = infoUtilisateur();
			}
			else 	$mod = false;
		?>		
		<a class="retourGestion" href='index.php?lien=gestion&qui=intervenant'>Revenir à la liste des intervenants</a>
		<section id="content"> <!-- CONTENT -->
			<article class = "formgest"> <!-- Article FORM --> 
				<form method="POST" enctype="multipart/form-data">
				
					<article class="photoGestion"> <!-- Photo -->
						<?php 
							if ($_GET['idUti']==-1)
							{ echo "<img src='images/new.jpg' width='300px' height='300px'/>";
							}
							else
							{
								if($uti['photoUti']=='')
								{
									echo "<img src='images/default.jpg' width='300px' height='300px'/>";
								}
								else
								{
									echo "<img src='images/".$uti['photoUti']."' width='300px' height='300px'/>";
								}
								echo"<input name='lbPhoto' type='hidden' value='".$uti['photoUti']."'>";
							}
						?>
					
						<label class="left" for="fichier_a_uploader" title="Recherchez le fichier à uploader !"></label><br>
						<input class="btn" name="fichier" type="file" id="fichier_a_uploader" />
					</article> <!-- Fin Photo -->
					
					<article class="right"><!-- Info utilisateur -->
																	
								
						<div class="control-group">
							<div class="controls">
								<label for="nom" class="control-label">Nom</label>
								<input name='nom' class='text' id='nom' type='text' placeholder="..."			<?php if($mod) echo "value='".$uti['nomUti']."'"; ?> size='30' required>	<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label for="prenom" class="control-label">Prenom</label>	
								<input name='prenom' class='text' id='prenom' type='text' placeholder="..."		<?php if($mod) echo "value='".$uti['prenomUti']."'"; ?> size='30' required> <br>				
							</div>
						</div>	
						<div class="control-group">
							<div class="controls">
								<label for="statut" class="control-label" >Statut</label>
								<select name="statut">
									<option value="intervenant" <?php if($mod && $uti['statutUti']=="intervenant") echo "selected"; ?>>Intervenant</option>
									<option value="secretaire" <?php if($mod && $uti['statutUti']=="secretaire") echo "selected"; ?>>Secrétaire</option>
								</select>
							</div>
						</div>	
						<label for="log">Login</label>				<input name='log'	 id='log' type='text'  placeholder="..."			<?php if($mod) echo "value='".$uti['logUti']."'"; ?> size='30'>	<br>
						<label for="mdp">Mot de passe</label>				<input name='mdp'	 id='mdp' type='password'  placeholder="..."			<?php if($mod) echo "value='".$uti['mdpUti']."'"; ?> size='30'>	<br>


				

						<div class="control-group">
							<div class="controls">
								<label for="telp" class="control-label" >Tel portable</label>				
								<input name='telp' id='telp' class="tel" type='text'  placeholder="..."	<?php if($mod) echo "value='".$uti['telPorUti']."'"; ?> size='30'>	<br>
							</div>
						</div>	


						<div class="control-group">
							<div class="controls">
								<label for="telf" class="control-label" >Tel fixe</label>	
								<input name='telf' id='telf' class="tel" type='text'  placeholder="..."	<?php if($mod) echo "value='".$uti['telFixUti']."'"; ?> size='30'> <br>
							</div>
						</div>				

						<div class="control-group">
							<div class="controls">
								<label for="mail" class="control-label" >Mail</label>	
								<input name='mail' id='mail' class="mail" type='text'  placeholder="..."	<?php if($mod) echo "value='".$uti['mailUti']."'"; ?> size='30'>	<br>
							</div>
						</div>	

																						
						<label for="ad">Adresse</label>	
						<input name='ad' id='ad' type='text' placeholder="..."				<?php if($mod) echo "value='".$uti['libAdUti']."'"; ?> size='30'>		<br>
											
						<div class="control-group">
							<div class="controls">
								<label for="cp" class="control-label">Code Postal</label>	
								<input class="cp"  name='cp' id='cp' type='text' placeholder="..."	<?php if($mod) echo "value='".$uti['cpUti']."'"; ?> size='3'>			<br>
							</div>
						</div>	

						<div class="control-group">
							<div class="controls">
								<label for="ville" class="control-label">Ville</label>	
								<input class="text" name='ville' id='ville' type='text' placeholder="..."		<?php if($mod) echo "value='".$uti['villeUti']."'"; ?> size='15'>		<br>
							</div>
						</div>	


						
						
					</article> <!-- Fin Info Etudiant -->
					
					
					<input name='idUti' type='hidden' value='<?php echo $_GET['idUti'];?>'>
					<input name='qui' type='hidden' value='utilisateur'>
					<input name='do' type='hidden' <?php if ($_GET['idUti']==-1) echo "value='create'"; else echo  "value='modif'";?> > <!-- pour rester sur la bonne page -->
					<input name='lien' type='hidden' value="gestion"> <!-- pour rester sur la bonne page -->
					<p class="clear"></p>
					
					<br>
					<input id='save' class="sendgest btn btn-warning" name='button' type='submit' value='Enregistrer'>
					<input class="sendgest btn btn-danger" name='button' type='submit' value='Supprimer'>
					


				</form> <!-- FIN Article FORM -->
				
			</article>
			
			<div class="clear"></div>
		</section> <!-- END CONTENT -->
</section>

<script>
	var oRegexTel;
	var buttonState;


	if('<?php echo $mod ?>'){
		$('.control-group').each(function(index) {
   			$(this).addClass('success');
		});
	}

    $('.control-group').keyup(function() {
 		var thisInput = $(this).children('.controls').children('input');

        if ($(thisInput).is('.tel')) //Si l'input possede la class téléphone
			oRegexTel = new RegExp('^[0-9]{10}$');
		else if ($(thisInput).is('.mail'))
			 oRegexTel = new RegExp('^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$');
		else if ($(thisInput).is('.cp'))
 			oRegexTel = new RegExp('([0-9]{5})');
 		else if ($(thisInput).is('.text'))
 			oRegexTel = new RegExp('^[a-zA-Z]{3,30}$');
 		else if ($(thisInput).is('.year'))
 			oRegexTel = new RegExp('([0-9]{4})');

     	if($(thisInput).val()==""){
     		$(this).removeClass('error');
     		$(this).removeClass('success');
     	}
     	else if(oRegexTel.test($(thisInput).val())){
     		$(this).removeClass('error');
     		$(this).addClass('success');
     	}
     	else{
     		$(this).removeClass('success');
     		$(this).addClass('error');
     	}

		buttonState = true;
     	$('.control-group').each(function(index) {
   			if ($(this).is('.error')){
   				buttonState = false;
   			} 
		});
		if(buttonState)			
			$('#save').removeAttr('disabled');
		else
			$('#save').attr('disabled', 'disabled');
              
    });
</script>