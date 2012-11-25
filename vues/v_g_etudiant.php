<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<section>
	<a class="retourGestion" href='index.php?lien=gestion&qui=etudiant'>Revenir à la liste des étudiants</a>
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
				
					<article class="photoGestion"> <!-- Photo -->
						<?php
							if ($_GET['idEtu']==-1)
							{ 
								echo "<img src='images/new.jpg' width='300px' height='300px'/>";
							}
							else
							{ 	
								if($etu['photoEtu']=='')
								{
									echo "<img src='images/default.jpg' width='300px' height='300px'/>";
								}
								else
								{
									echo "<img src='images/".$etu['photoEtu']."' width='300px' height='300px'/>";
								}
								echo"<input name='lbPhoto' type='hidden' value='".$etu['photoEtu']."'>";
							}
						?>
						<label class="left" for="fichier_a_uploader" title="Recherchez le fichier à uploader !"></label><br>
						<input class="btn" name="fichier" type="file" id="fichier_a_uploader" />	
					</article> <!-- Fin Photo -->

					<article><!-- Info étudiant -->
						<?php echo '<a href="index.php?lien=absence&id='.$_GET['idEtu'].'"'; ?> ><input type="button" class="btn btn-warning" value="consulter les absences"></a><br><br>
						<div class="control-group">
							<div class="controls">																	
								<label for="nom"class="control-label">Nom</label>
								<input name='nom' class='text' id='nom' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomEtu']."'"; ?> size='30' required>	<br>									
							</div>
						</div>	
						<div class="control-group">
							<div class="controls">																									
								<label for="prenom" class="control-label">Prenom</label>
								<input name='prenom' class='text' id='prenom' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomEtu']."'"; ?> size='30' required> <br>										
							</div>
						</div>	
																
							
						<div class="control-group">
							<div class="controls">
								<label for="datenaiss" class="control-label">Date de naissance</label>																																	
								<input name='datenaiss' class='date' id='datenaiss' type='datetime' placeholder="Format AAAA-MM-JJ"		<?php if($mod) echo "value='".$etu['dateNaissEtu']."'"; ?>  > <br>								
							</div>
						</div>

						<div class="control-group">
							<div class="controls">																																	
								<label for="telp" class="control-label">Tel portable</label>	
								<input name='telp' class='tel' id='telp' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['telPortEtu']."'"; ?> size='30'>	<br>								
							</div>
						</div>
						<div class="control-group">
							<div class="controls">																																									
								<label for="telf" class="control-label">Tel fixe</label>
								<input name='telf' class='tel' id='telf' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['telFixEtu']."'"; ?> size='30'> <br>									
							</div>
						</div>	
						<div class="control-group">
							<div class="controls">																																																	
								<label for="mail" class="control-label">Mail</label>	
								<input name='mail' class='mail' id='mail' type='text'  placeholder="..."			<?php if($mod) echo "value='".$etu['mailEtu']."'"; ?> size='30'>	<br>										
							</div>
						</div>			
																																																				
						<label for="ad" >Adresse</label>									
						<input name='ad' id='ad' type='text' placeholder="..."				<?php if($mod) echo "value='".$etu['libAdEtu']."'"; ?> size='30'>		<br>									
					
						<div class="control-group">
							<div class="controls">																																																									
								<label for="cp" class="control-label">Code Postal</label>	
								<input name='cp' class='cp' id='cp' type='text' placeholder="..."				<?php if($mod) echo "value='".$etu['cpEtu']."'"; ?> size='3'>			<br>															
							</div>
						</div>	
						<div class="control-group">
							<div class="controls">																																																																	
								<label for="ville" class="control-label">Ville</label>
								<input name='ville' class='text' id='ville' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['villeEtu']."'"; ?> size='15'>		<br>								
							</div>
						</div>	
																
								
						<div class="control-group">
							<div class="controls">																																																																									
								<label for="telf" class="control-label">Année d'étude</label>	
								<input name='annee' class='year' id='annee' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['anneeEtudeEtu']."'"; else echo "value='".$annee."'"; ?> size='30'>	<br>								
							</div>
						</div>
							
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
						
						<div class="control-group">
							<div class="controls">
								<label for="nomEnt" class="control-label">Nom</label>
								<input name='nomEnt' class='text' id='nomEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['libEnt']."'"; ?> size='30'>	<br>
							</div>
						</div>

			
						<label for="adEnt">Adresse</label>
						<input name='adEnt' id='adEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['libAdEnt']."'"; ?> size='30'>		<br>
				

						<div class="control-group">
							<div class="controls">
								<label for="cpEnt" class="control-label">Code Postal</label>	
								<input class="cp" name='cpEnt' id='cpEnt' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['cpEnt']."'"; ?> size='3'>	<br>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<label for="villeEnt" class="control-label">Ville</label>	
								<input name='villeEnt' class='text' id='villeEnt' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['villeEnt']."'"; ?> size='15'>	<br>
							</div>
						</div>
						
								
						
						<fieldset class="right"> <!-- ENTREPRISE  RH --> 
							<legend>Responsable RH</legend>
							<div class="control-group">
								<div class="controls">	
									<label for="nomrh" class="control-label">Nom</label>	
									<input name='nomrh' class='text' id='nomrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomRH']."'"; ?> size='30'>	<br>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">	
									<label for="prenomrh" class="control-label">Prenom</label>									
									<input name='prenomrh' class='text' id='prenomrh' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomRH']."'"; ?> size='30'>	<br>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">	
									<label for="telrh" class="control-label">Tel</label>																			
									<input name='telrh' class='tel' id='telrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['telRH']."'"; ?> size='30'>		<br>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">	
									<label for="mailrh" class="control-label">Mail</label>																												
									<input name='mailrh' class='mail' id='mailrh' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['mailRH']."'"; ?> size='30'>		<br>
								</div>
							</div>						
								
									
							
						</fieldset> <!-- FIN ENTREPRISE RH -->
						
						<fieldset class="left"> <!-- ENTREPRISE  Maître d'apprentissage --> 
							<legend>Maître d'apprentissage</legend>
							<div class="control-group">
								<div class="controls">									
									<label for="nomma" class="control-label">Nom</label>	
									<input name='nomma' class='text' id='nomma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['nomMA']."'"; ?> size='30'>	<br>																																				
								</div>
							</div>	
							<div class="control-group">
								<div class="controls">													
									<label for="prenomma" class="control-label">Prenom</label>									
									<input name='prenomma' class='text' id='prenomma' type='text' placeholder="..."		<?php if($mod) echo "value='".$etu['prenomMA']."'"; ?> size='30'>	<br>																																			
								</div>
							</div>
							<div class="control-group">
								<div class="controls">	
									<label for="telma" class="control-label">Tel</label>																														
									<input name='telma' class='tel'id='telma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['telMA']."'"; ?> size='30'>		<br>																																		
								</div>
							</div>		
							<div class="control-group">
								<div class="controls">										
									<label for="mailma" class="control-label">Mail</label>	
									<input name='mailma'  class='mail' id='mailma' type='text' placeholder="..."			<?php if($mod) echo "value='".$etu['mailMA']."'"; ?> size='30'>		<br>																																				
								</div>
							</div>		
													
							
						</fieldset> <!-- FIN ENTREPRISE Maître d'apprentissage -->
						<div class="clear"></div>
						
					</fieldset> <!-- FIN ENTREPRISE --> 
					
					<input name='idEtu' type='hidden' value='<?php echo $_GET['idEtu'];?>'>
					<input name='qui' type='hidden' value='etudiant'>
					<input name='do' type='hidden' <?php if ($_GET['idEtu']==-1) echo "value='create'"; else echo  "value='modif'";?> > <!-- pour rester sur la bonne page -->
					<input name='lien' type='hidden' value="gestion"> <!-- pour rester sur la bonne page -->
					
					<br>
					<input id='save' class="sendgest btn btn-warning" name='button' type='submit' value='Enregistrer'>
					<input class="sendgest btn btn-danger" name='button' type='submit' value='Supprimer'>
					
				</form> <!-- FIN Article FORM -->
				
			</article>
			<div class="clear"></div>
		</section> <!-- END CONTENT -->
</section>

<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
	var oRegexTel;
	var buttonState;


    jQuery(function($){
		$.datepicker.regional['fr'] = {
			closeText: 'Fermer',
			prevText: 'Précédent',
			nextText: 'Suivant',
			currentText: 'Aujourd\'hui',
			monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
			'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
			monthNamesShort: ['Janv.','Févr.','Mars','Avril','Mai','Juin',
			'Juil.','Août','Sept.','Oct.','Nov.','Déc.'],
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
			dayNamesMin: ['D','L','M','M','J','V','S'],
			weekHeader: 'Sem.',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
		$.datepicker.setDefaults($.datepicker.regional['fr']);
	});
  
	
    $(function() {//Affichage d'un datapicker pour l'année
        $("#datenaiss").datepicker($.datepicker.regional['fr']);
    });
	if('<?php echo $mod ?>'){
		$('.control-group').each(function(index) {
   			$(this).addClass('success');
		});
	}

 	$('.control-group').change(function() {
		controll(this); 
	});
    $('.control-group').keyup(function() {
		controll(this); 
    });

    function controll(divInput){
    	var thisInput = $(divInput).children('.controls').children('input');

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
 		else if ($(thisInput).is('.date'))
 			oRegexTel = new RegExp('(0?[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[012])/((19|20)\\d\\d)');


 		

     	if($(thisInput).val()==""){
     		$(divInput).removeClass('error');
     		$(divInput).removeClass('success');
     	}
     	else if(oRegexTel.test($(thisInput).val())){
     		$(divInput).removeClass('error');
     		$(divInput).addClass('success');
     	}
     	else{
     		$(divInput).removeClass('success');
     		$(divInput).addClass('error');
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
    }
</script>