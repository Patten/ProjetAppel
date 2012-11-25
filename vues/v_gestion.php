
<section>

		
		<section id="content"> <!-- CONTENT -->
		
		<div class="span6">
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
						echo"<div class='clear'></div>
							<div class='btnAdd'><a href='index.php?lien=gestion&"; if ($_GET['qui']=='etudiant') echo "idEtu=-1"; else echo "idUti=-1"; echo "'>
							<div style='float:left;' class='btn btn-success'>Ajouter un nouveau</div>
							</a></div>";
						
					}
					else{
					echo "<a href='index.php?lien=gestion&"; if ($_GET['qui']=='etudiant') echo "idEtu=-1"; else echo "idUti=-1"; echo "'>
							<div name='newEtu' class='photo'>
								<img src='images/new.jpg 'width='140px' height='140px'/>
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

					foreach ($tabTrombi as $unEtu){
						echo "<a href='index.php?lien=gestion&idEtu=".$unEtu['idEtu']."'>
								<div name='".$unEtu['idEtu']."' class='photo' style='height:165px;'>";
									if($unEtu['photoEtu']=='')
									{
										echo "<img src='images/default.jpg' width='140' height='140'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unEtu['photoEtu']."' width='140px' height='140px'  alt ='trombi'/>";
									}
									echo $unEtu['prenomEtu']." ".$unEtu['nomEtu']."<br>	

								</div>
							</a>";
					}
					affNouveau(false);
					
					echo "</div>";
				

					if($_SESSION['interface']=="Mode tableau")
						echo"<div id='interfaceTableau' style='display:block;'>";
					else
						echo"<div id='interfaceTableau' style='display:none;'>";

					?>
		
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-hover" id="tabGestion" width="100%">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Entreprise</th>
								<th>Telephone</th>
								<th>Mail</th>
								<th>Spécialité</th>
							</tr>
						</thead>
					<tbody>
					

					<?php
					affNouveau(true);
					echo"<br/><br/><br/>";
									
					foreach ($tabTrombi as $unUti){						
					echo "<tr onDblclick=document.location='index.php?lien=gestion&idEtu=".$unUti['idEtu']."'>";
						echo"<td>".$unUti['nomEtu']."</td>";
						echo"<td>".$unUti['prenomEtu']."</td>";
						echo"<td>".$unUti['libEnt']."</td>";
						echo"<td>".$unUti['telPortEtu']."</td>";
						echo"<td>".$unUti['mailEtu']."</td>";
						echo"<td>".$unUti['libSpe']."</td>";
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
				
					
					foreach ($tabTrombi as $unUti){
						echo "<a href='index.php?lien=gestion&idUti=".$unUti['idUti']."'>
								<div name='".$unUti['idUti']."' class='photo' style='height:165px;'>";
									if($unUti['photoUti']=='')
									{
										echo "<img src='images/default.jpg' width='140' height='140'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unUti['photoUti']."' width='140px' height='140px'  alt ='trombi'/>";
									}
									echo $unUti['prenomUti']." ".$unUti['nomUti']."<br>	
								</div>
							</a>";
					}
					affNouveau(false);
					echo "</div>";


					if($_SESSION['interface']=="Mode tableau")
						echo"<div id='interfaceTableau' style='display:block;'>";
					else
						echo"<div id='interfaceTableau' style='display:none;'>";

					?>
		
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-hover" id="tabGestion" width="100%">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prenom</th>
								<th>tel Port</th>
								<th>Mail</th>
								<th>Statut</th>

							</tr>
						</thead>
						<tbody>				
							<?php
							affNouveau(true);
							echo"<br/><br/><br/>";
											
							foreach ($tabTrombi as $unUti){						
								echo "<tr onDblclick=document.location='index.php?lien=gestion&idUti=".$unUti['idUti']."'>";
									echo"<td>".$unUti['nomUti']."</td>";
									echo"<td>".$unUti['prenomUti']."</td>";
									echo"<td>".$unUti['telPorUti']."</td>";
									echo"<td>".$unUti['mailUti']."</td>";
									echo"<td>".$unUti['statutUti']."</td>";						
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
					echo "<div class='clear'><br>";					
					?>
					<table cellpadding="0" cellspacing="0" border="0" class="display table table-hover" id="tabG" width="100%">
						<thead>
							<tr>
								<th><center>Liste des spécialités</center></th>
							</tr>
						</thead>
						<tbody>				
							<?php										
							foreach($tab as $uneSpe){						
								echo "<tr>";
									echo "<td class='center'>".$uneSpe."</td>";									
								echo"</tr>";					
							}
							?>
						</tbody>
					</table>
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

	$('#tabGestion').dataTable( {  
		"oLanguage": {
			"sDom": 'T<"clear">lfrtip',
			"oTableTools": {
				"sRowSelect": "multi",
				"aButtons": [ "select_all", "select_none" ]
			},
			"sLengthMenu": 'Afficher <select STYLE="width:80">'+
				  '<option value="10">10</option>'+
				   '<option value="20">20</option>'+
				   '<option value="30">30</option>'+
				   '<option value="40">40</option>'+
				   '<option value="50">50</option>'+
				   '<option value="-1">Tous</option>'+
				   '</select> résultats',
		   
			"sZeroRecords": "Aucun résultat - désolé",
			"sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ résultats",
			"sInfoEmpty": "Showing 0 to 0 sur 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)",
			"sSearch": "Rechercher :",
			"oPaginate": {
				"sNext": "Suivant",
				"sPrevious": "Précédent"
			}			
		}
	});
				
	var oTable;
	var giRedraw = false;

	$("#tabGestion tbody").click(function(event) {
		$(oTable.fnSettings().aoData).each(function (){
			$(this.nTr).removeClass('row_selected');
		});
		$(event.target.parentNode).addClass('row_selected');
	});
		
	/* permet de deselectionner les lignes */
	$('#delete').click( function() {
		var anSelected = fnGetSelected( oTable );
		oTable.fnDeleteRow( anSelected[0] );
	} );

	oTable = $('#tabGestion').dataTable();

	/* recupere la ligne selectionnée */
	function fnGetSelected( oTableLocal )
	{
		var aReturn = new Array();
		var aTrs = oTableLocal.fnGetNodes();
		
		for ( var i=0 ; i<aTrs.length ; i++ )
		{
			if ( $(aTrs[i]).hasClass('row_selected') )
			{
				aReturn.push( aTrs[i] );
			}
		}
		return aReturn;
	}
		
	$('#btn_gestionUti').popover({placement:'right', trigger:'hover'}) // permet d'afficher les message d'aides quand on clique sur un bouton d'aide
			
});

</script>

		<br><br>
	</section> <!-- END CONTENT -->
</section>