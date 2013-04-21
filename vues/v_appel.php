<section>		
		<section id="content">
			<fieldset id ="fieldset">
				<!-- <legend>Cours de : <?php echo $_POST['libCours']; ?></legend> -->
				

				<?php 
						// Affichage de chaque élève étant dans la spécialité
						echo "<div class='row'>
									<div class='span9'>";

									if (!empty($coursDuMoment))
									{
										echo "<p class='messageCours'> 
													Cours de <strong>".$coursDuMoment['libcours']."</strong>
													de <strong>".$coursDuMoment['heureDeb']."</strong>
													à <strong>".$coursDuMoment['heureFin']."</strong>
												</p>";
									}
									else
									{
										echo "<p class='messageCours'><strong>Pas de cours pour vous en ce moment.</strong></p>";
									}

									foreach ($tabTrombi as $unePhoto){
										echo "<div class='photo'>";
											echo"<div class='divAppel'><div id='photo".$unePhoto['idEtu']."' class='thePhoto'>";
												if($unePhoto['photoEtu']=='')	echo "<img src='images/default.jpg' width='170px' height='180px' alt='trombi'/>";
												else echo "<img src='images/".$unePhoto['photoEtu']."'width='170px' height='180px' alt='trombi'/>";
											echo"</div></div>";
												echo $unePhoto['nomEtu']." ";
												echo $unePhoto['prenomEtu'];						
										    echo"<div class='btn-group btnPhotos' data-toggle='buttons-radio'>
											    	<button id='".$unePhoto['idEtu']."' type='button' class='btnAppel btn active here' style='width:70px;'>Présent</button>
											    	<button id='".$unePhoto['idEtu']."' type='button' class='btnAppel btn notHere'style='width:70px;'>Absent</button>
										    	</div>";
										echo "</div>";	
									}
						echo 		"</div>
									<div class=''>
										<div class='listAbs'>";

									if(!empty($coursDuMoment))
									{
										echo "<h3>Liste des absents</h3>
											<hr>";
											foreach ($tabTrombi as $unePhoto)
											{
												echo "<div class='nomAbs' id='txt".$unePhoto['idEtu']."' style='display:none;'>".$unePhoto['nomEtu']." ".$unePhoto['prenomEtu']."</div>";
											}
											echo "<div id='nobody' style='display:block;'>Personne n'est marqué absent</div>";					
									}
									else
									{
										?>

										<!-- Bouton pour créer un cours manuellement -->
										<a href="#myModal" role="button" data-toggle="modal">
											<button type='button' class='btn'>Créer un cours</button>
										</a>
										


										<!-- Modal -->
										<form method="post">
											<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											  <div class="modal-header">
											    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											    <h3 id="myModalLabel">Créer un cours manuellement</h3>
											  </div>
											  <div class="modal-body">
											  	<p>
										            Nom du cours :
										            <input name="nom_cours" type="text">
										        </p>
											  	<?php
											    	affChoiceHour("De", "debut");
											    	affChoiceHour("à", "fin");
											    ?>
											  </div>
											  <div class="modal-footer">
											    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
											    <input type="submit" class="btn btn-primary" value="Valider le cours">
											  </div>
											</div>
										</form>

										<?php
										}
										?>

									<?php
										echo "</div>";
									echo "</div>";
								echo "</div>";
								if (empty($coursDuMoment))
								{
									?><script>	
										$('.btnAppel').each(function(index) {
											$(this).css('display', 'none');
										});
									</script><?php
								}
				?>





				<script>

					var idUtilisateur = "<?php echo $_SESSION['id']; ?>";
					var libCours = "<?php echo $coursDuMoment['libcours'];?>"
					var heureDeb = "<?php echo $coursDuMoment['heureDeb'];?>";
					var heureFin = "<?php echo $coursDuMoment['heureFin'];?>";
	

					$('.here').click(function(){
						if (!$(this).is('.active')) { // Check si le bouton a déjé été activé
							$('#photo'+$(this).attr('id')).fadeTo('fast',1);
							$('#txt'+$(this).attr('id')).css('display', 'none');
							retirerAbsence($('#txt'+$(this).attr('id')).attr('value'),this);		
						}	

						var emptyAbs = true;					
						$( ".nomAbs" ).each(function() {
							if($(this).css('display')=='block')
								emptyAbs = false;
						});
						if (emptyAbs)
							$('#nobody').show();				
					});

					$('.notHere').click(function(){
						if (!$(this).is('.active')) { // Check si le bouton a déjé été activé
							$('#photo'+$(this).attr('id')).fadeTo('fast',0.5);
							$('#txt'+$(this).attr('id')).css('display', 'block');
							ajouterAbsence(idUtilisateur, $(this).attr('id'),this);
						}
						$('#nobody').css('display', 'none');

					});


					function ajouterAbsence(idUti, unAbs, element){
						$.ajax({
							type:"POST",
							data:"&type=1&unAbs="+unAbs+"&idUti="+idUti+"&libCours="+libCours+"&hDeb="+heureDeb+"&hFin="+heureFin,
							url:"model/m_ajouterAbs.php",
							dataType:"html",
							success:function(data){	
								$('#txt'+$(element).attr('id')).attr('value',data);
							}
						});
					}

					function retirerAbsence(idAbs, element){

						$.ajax({
							type:"POST",
							data:"&type=0&idAbs="+ idAbs,
							url:"model/m_ajouterAbs.php",
							dataType:"html",
							success:function(data){	
								$('#txt'+$(element).attr('id')).attr('value',data);
							}
						});
					}

					 
				</script>

			</fieldset>
			
		
			<div class="clear"></div>
		</section>
	</div>
</section>
			