<section>

		
		<section id="content">
			<fieldset id ="fieldset">
				<!-- <legend>Cours de : <?php echo $_POST['libCours']; ?></legend> -->
				

				<?php 
						// Affichage de chaque élève étant dans la spécialité
						echo "<div class='row'>
									<div class='span9'>";
									foreach ($tabTrombi as $unePhoto){
										echo "<div name='".$unePhoto['idEtu']."' class='photo'>";
											if($unePhoto['photoEtu']=='')	echo "<img src='images/default.jpg' width='140px' height='140px' alt='trombi'/>";
											else							echo "<img src='images/".$unePhoto['photoEtu']."'width='140px' height='140px' alt='trombi'/>";
											echo $unePhoto['nomEtu']." ";
											echo $unePhoto['prenomEtu'];						
											echo "<div class='abs' name=".$unePhoto['idEtu']."></div>"; 
										echo "</div>";	
									}
						echo 		"</div>
									<div class='span3'>
										<h3>Liste des absents</h3>
										<h6>Clickez sur les photos des absents</h6>
										<hr>
									</div>
								</div>";
				?>





				<script>
				var idUtilisateur = "<?php echo $_SESSION['id']; ?>";
				var libCours = "<?php echo $_POST['libCours']; ?>";
				var heureDeb = "<?php echo $_POST['heureDeb']; ?>";
				var heureFin = "<?php echo $_POST['heureFin']; ?>";
					
				var tabAbs= new Array();
				
					$('.abs').click(function(){
						if($(this).css("opacity") == 0){
							$(this).fadeTo('fast',0.7);
							
							tabAbs[$(this).attr("name")] = $(this).attr("name");
						}
						else{
							delete tabAbs[$(this).attr("name")];
							$(this).fadeTo('fast',0);
						}
					});

					
					setTimeout("confAbs()",3600000); //3 600 000 pour une Heure
					 
					function confAbs(){ // fonction confirmation des absents
					  
						if(confirm("Les élèves séléctionnés vont être comfirmés absents.")){
							var nbAbs = 0;
							for(unAbs in tabAbs){
								ajouterAbsence(unAbs, idUtilisateur, heureDeb, heureFin);
								if(unAbs!="")//Permet de compter le nombre d'absent
								{
									nbAbs ++;
								}
							}
							
							envoyerMail(nbAbs);
							
						}

					}
					function ajouterAbsence(unAbs, idUti){
						$.ajax({
							type:"POST",
							data:"&unAbs="+ unAbs+"&idUti="+idUti+"&heureDeb="+heureDeb+"&heureFin="+heureFin+"&libCours="+libCours,
							url:"model/m_ajouterAbs.php",
							dataType:"html",
							success:function(data){	
							}
						});
					}
					
					function envoyerMail(nb){
					
						var chaineMail = "Bonjour, aujourd hui il y a eu : "+ nb +" absents pendant le cours de " + libCours +" entre "+heureDeb+" et "+heureFin+"\n http://www.yakssa.free.fr";											
					
						$.ajax({
							type:"POST",
							data:"&message="+ chaineMail,
							url:"model/m_envoyerMail.php",
							dataType:"html",
							success:function(data){	
								window.location="index.php";
							}
						});
					}
					 
				</script>

			</fieldset>
			
		
			<div class="clear"></div>
		</section>
	</div>
</section>
			