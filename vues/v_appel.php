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
											echo"<div  style='background-color:red;'><div id='photo".$unePhoto['idEtu']."' class='thePhoto'>";
												if($unePhoto['photoEtu']=='')	echo "<img src='images/default.jpg' width='140px' height='140px' alt='trombi'/>";
												else echo "<img src='images/".$unePhoto['photoEtu']."'width='140px' height='140px' alt='trombi'/>";
											echo"</div></div>";
												echo $unePhoto['nomEtu']." ";
												echo $unePhoto['prenomEtu'];						
										    echo"<div class='btn-group' data-toggle='buttons-radio'>
											    	<button id='".$unePhoto['idEtu']."' type='button' class='btn btn-success active' style='width:70px;'>Présent</button>
											    	<button id='".$unePhoto['idEtu']."' type='button' class='btn btn-danger'style='width:70px;'>Absent</button>
										    	</div>";
										echo "</div>";	
									}
						echo 		"</div>
									<div class='span3'>
										<h3>Liste des absents</h3>
										<hr>";
										foreach ($tabTrombi as $unePhoto){
											echo "<div id='txt".$unePhoto['idEtu']."' style='display:none;'>".$unePhoto['nomEtu']." ".$unePhoto['prenomEtu']."</div>";
										}
									echo "</div>
								</div>";
								if (empty($coursDuMoment))
								{
									?><script>	
										$('.btn').each(function(index) {
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
	

					$('.btn-success').click(function(){
						if (!$(this).is('.active')) { // Check si le bouton a déjé été activé
							$('#photo'+$(this).attr('id')).fadeTo('fast',1);
							$('#txt'+$(this).attr('id')).css('display', 'none');
							retirerAbsence($('#txt'+$(this).attr('id')).attr('value'),this);		
						}				
					});

					$('.btn-danger').click(function(){
						if (!$(this).is('.active')) { // Check si le bouton a déjé été activé
							$('#photo'+$(this).attr('id')).fadeTo('fast',0.5);
							$('#txt'+$(this).attr('id')).css('display', 'block');
							ajouterAbsence(idUtilisateur, $(this).attr('id'),this);
						}
					});



					function ajouterAbsence(idUti, unAbs, element){
						$.ajax({
							type:"POST",
							data:"&type=1&unAbs="+ unAbs+"&idUti="+idUti+"&libCours="+libCours+"&hDeb="+heureDeb+"&hFin="+heureFin,
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
			