
<section>

		
		<section id="content"> <!-- CONTENT -->
		
		<div class="span8 offset2">
			<header class="headGest">
				<ul class="nav nav-pills">
					<li <?php if($_GET['qui']=='etudiant') echo 'class="active"'; ?> ><a href='index.php?lien=gestion&qui=etudiant'>Etudiant</a></li>
					<li <?php if($_GET['qui']=='intervenant') echo 'class="active"'; ?> ><a href='index.php?lien=gestion&qui=intervenant'>Intervenant</a></li>
					<li <?php if($_GET['qui']=='spe') echo 'class="active"'; ?> ><a href='index.php?lien=gestion&qui=spe'>Spécialité</a></li>
				</ul>
			</header>
		</div>	
				
			<?php
				if(!(isset($_GET['qui']))) $_GET['qui'] = "etudiant";
				
				
				function affNouveau($modTab)
				{
					if($modTab){
						echo"
							<div class='btnAdd'><a href='index.php?lien=gestion&"; if ($_GET['qui']=='etudiant') echo "idEtu=-1"; else echo "idUti=-1"; echo "'>
			
							</a></div>
						";
					}
					else{

					echo "<a href='index.php?lien=gestion&"; if ($_GET['qui']=='etudiant') echo "idEtu=-1"; else echo "idUti=-1"; echo "'>
							<div name='newEtu' class='photoG' style='height:165px;'>
								<img src='images/new.jpg' width='165px'/>
								Nouveau<br>	
							</div>
						</a>";
					}
				}
				
				
				if ($_GET['qui']=='etudiant')
				{
					$tabTrombi = listerEtudiant();
					
					if($_SESSION['interface']=="Mode trombinoscope"){
						echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode tableau' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
						echo"<div id='interfaceTrombi' style='display:block;'>";
						echo "<div class='clear'></div>";
					}
					else{
						echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode trombinoscope' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
						echo"<div id='interfaceTrombi' style='display:none;'>";
						echo "<div class='clear'></div>";
					}


					affNouveau(false);
					foreach ($tabTrombi as $unEtu){
						echo "<a href='index.php?lien=gestion&idEtu=".$unEtu['idEtu']."'>
								<div name='".$unEtu['idEtu']."' class='photoG' style='height:165px;'>";
									if($unEtu['photoEtu']=='')
									{
										echo "<img src='images/default.jpg' width='170' height='180'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unEtu['photoEtu']."' width='170px' height='180px'  alt ='trombi'/>";
									}
									echo $unEtu['prenomEtu']." ".$unEtu['nomEtu']."<br>	

								</div>
							</a>";
					}
					
					echo "</div>";
				

					if($_SESSION['interface']=="Mode tableau")
						echo"<div id='interfaceTableau' style='display:block;'>";
					else
						echo"<div id='interfaceTableau' style='display:none;'>";
						affNouveau(true);
						echo"<br/><br/><br/>";
					?>
		

					<table class="footable">
						<thead>
							<tr>
								<th data-class="expand" data-sort-initial="true">
									<span title="table sorted by this column on load">Nom</span>
								</th>
								<th>
									<span title="sorting disabled on this column">Prénom</span>
								</th>
								<th data-hide="phone">
									Entreprise
								</th>
								<th data-hide="phone">
									Téléphone
								</th>
								<th data-hide="phone,tablet">
									Mail
								</th>
								<th data-hide="phone,tablet">
									Spécialité
								</th>
								<th data-sort-ignore="true"></th>
							</tr>
						</thead>
					<tbody>
					  		

						<?php
										
						foreach ($tabTrombi as $unUti){						
						echo "<tr>";							
							echo"<td>".$unUti['nomEtu']."</td>";
							echo"<td>".$unUti['prenomEtu']."</td>";
							echo"<td>".$unUti['libEnt']."</td>";
							echo"<td>".$unUti['telPortEtu']."</td>";
							echo"<td>".$unUti['mailEtu']."</td>";
							echo"<td>".$unUti['libSpe']."</td>";
							echo"<td><div onclick=document.location='index.php?lien=gestion&idEtu=".$unUti['idEtu']."' class='btn btn-primary'>ouvrir</div></td>";
						echo"</tr>";					
						}

						?>
						</tbody>
					</table>
					</div>
					<div class='clear'></div>
					<?php
					
				} // fin étudiant
				else if($_GET['qui']=='intervenant')// si intervenant
				{
					$tabTrombi = listerUtilisateur();
					
					if($_SESSION['interface']=="Mode trombinoscope"){
						echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode tableau' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
						echo"<div id='interfaceTrombi' style='display:block;'>";
						echo "<div class='clear'></div>";
					}
					else{
						echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode trombinoscope' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
						echo"<div id='interfaceTrombi' style='display:none;'>";
						echo "<div class='clear'></div>";
					}
				
					affNouveau(false);
					foreach ($tabTrombi as $unUti){
						echo "<a href='index.php?lien=gestion&idUti=".$unUti['idUti']."'>
								<div name='".$unUti['idUti']."' class='photoG' style='height:165px;'>";
									if($unUti['photoUti']=='')
									{
										echo "<img src='images/default.jpg' width='170' height='180'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unUti['photoUti']."' width='170px' height='180px'  alt ='trombi'/>";
									}
									echo $unUti['prenomUti']." ".$unUti['nomUti']."<br>	
								</div>
							</a>";
					}
					echo "</div>";


					if($_SESSION['interface']=="Mode tableau")
						echo"<div id='interfaceTableau' style='display:block;'>";
					else
						echo"<div id='interfaceTableau' style='display:none;'>";

					?>
		
					<table class="footable">
						<thead>
							<tr>
								<th data-class="expand" data-sort-initial="true">
									Nom
								</th>
								<th data-hide="phone,tablet">
									Prénom
								</th>
								<th data-hide="phone">
									Téléphone port
								</th>
								<th>
									Mail
								</th>
								<th data-hide="phone">
									Statut
								</th>
								<th data-sort-ignore="true"></th>
							</tr>
						</thead>
					<tbody>
					  					
							<?php
							affNouveau(true);
							echo"<br/><br/><br/>";
											
							foreach ($tabTrombi as $unUti){						
								echo "<tr>";
									echo"<td>".$unUti['nomUti']."</td>";
									echo"<td>".$unUti['prenomUti']."</td>";
									echo"<td>".$unUti['telPorUti']."</td>";
									echo"<td>".$unUti['mailUti']."</td>";
									echo"<td>".$unUti['statutUti']."</td>";	
									echo"<td><div onclick=document.location='index.php?lien=gestion&idUti=".$unUti['idUti']."' class='btn btn-primary'>ouvrir</div></td>";					
								echo"</tr>";					
							}
							?>
						</tbody>
					</table>
					</div>
					<div class='clear'></div>
					<?php	
				}
				
				if ($_GET['qui']=='spe')
				{
					$tab = listerSpe();
					echo "<div class='clear'></div><br>";					
					?>
					<div class="span4 offset4">
					<table class="footable">
						<thead>
							<tr>
								<th data-class="expand" data-sort-initial="true">
									Liste des spécialités
								</th>	
								<th data-sort-ignore="true"></th>							
							</tr>
						</thead>
					<tbody>		
							<?php										
							foreach($tab as $key => $uneSpe){						
								echo "<tr>";
									echo "<td class='center'>".$uneSpe."</td>";									
									echo "<td>";
										echo '<a href="#myModal'.$key.'" role="button" data-toggle="modal">';
											echo "<div title='modifier' class='icon-pencil'></div>   ";
										echo '</a>';
										echo "   <a title='supprimer' class='icon-remove'  href='index.php?lien=gestion&removeSpe=$key' onclick='return confirmAction()'></a>";										
									echo "</td>";									
								echo "</tr>";


							echo	'<div id="myModal'.$key.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-header">
									    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									    <h3 id="myModalLabel">Modifier la spécialité</h3>
									  </div>
									  <form method="post">
										  <div class="modal-body">
										  	<input type="hidden" name="updSpe">
										  	<input type="hidden" name="idSpe" value="'.$key.'">
										    <input type="text" name="libSpe" value="'.$uneSpe.'"
										  </div>
										  <div class="modal-footer">
										    <input type="submit" class="btn btn-primary" value="Modifier">
										  </div>
										</form>
									</div>';
							}
							?>
						</tbody>
					</table>
				</div>
					<?php
		
					echo "<br><br>Ajouter une spécialité :
					<form method='POST'>
						<input type='text' name='newSpe'>
						<input type='hidden' name='qui' value='spe'>
						<input class='btn btn-success' name='button' type='submit' value='Ajouter'>
					</form>";

				}

			?>
		
<script type="text/javascript" charset="utf-8">

function confirmAction(){
      var confirmed = confirm("Etes vous sûr de vouloir supprimer?");
      return confirmed;
}

$('td').each(function( index ) {
	if($(this).html() == ""){
		$(this).html('---');
	}
});

 $(function() {
	$('table').footable();
  
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	}).on('shown', function (e) {	
		$('.tab-pane.active table').trigger('footable_resize');
	});
});

$(document).ready(function() {
  
	$("#btn_gestionUti").click(function() { //Quand on clique sur le bouton de changement d'interface

		//sauvegarde du mode d'affichage dans une variable de session
		$.ajax({
			type: "POST",
			url: "model/m_interface.php", 
			data: "interface=" + $("#btn_gestionUti").val()      			
		});
		
		//Changement du texte du bouton
		if($("#btn_gestionUti").val() == "Mode trombinoscope")
			$("#btn_gestionUti").val("Mode tableau")
		else
			$("#btn_gestionUti").val("Mode trombinoscope"); 
				
		//Inversement des interfaces		
		if($('#interfaceTrombi').css('display')=='none'){ //Si le trombi n'était pas affiché
			$('#interfaceTrombi').css('display','block');//on affiche le trombi
			$('#interfaceTableau').css('display','none');//on cache le tableau
		}
		else{
			$('#interfaceTrombi').css('display','none');//on cache le trombi
			$('#interfaceTableau').css('display','block');//on affiche le tableau
		}
	});
		
	$('#btn_gestionUti').popover({placement:'left', trigger:'hover'}) // permet d'afficher les message d'aides quand on clique sur un bouton d'aide
			
});

</script>

		<br><br>
	</section> <!-- END CONTENT -->
</section>