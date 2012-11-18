	<!-- début du form dans v_choixDate -->
		<br><strong> Spécialité : </strong>
		<select name="spe">
		<?php // remplissage de la comboBox avec les spécialisation
			$tabListeSpe = getAllSpe();
			foreach ($tabListeSpe as $uneSpe){
				echo "<option value='".$uneSpe['idSpe']."' ";
				if ($_GET['spe'] == $uneSpe['idSpe']) echo "selected";
				echo ">".$uneSpe['libSpe']."</option>";
				print_r($tabListeSpe);
			}
		?>
		</select>
		<br>

		<strong> Promotion : </strong>
		<select name="annee"> // remplissage de la comboBox avec les années
		<?php
			for($i=$annee; $i>=2012; $i--)
			{
				echo "<option value='".$i."'>".$i."</option>";
			}
		?>
		</select><br>


		<input type="submit" class="btn">


	</form>	<!-- Fin du formulaire "dateDeb dateFin annee specialité" -->
</header> <!-- Fin section formulaire -->

<section>
	<?php
		$tabTrombi = listerAbsents();
		
		if($_SESSION['interface']=="Mode trombinoscope"){
			echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode tableau' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Switchez !'style='float:right;'/>";
			echo "<br/><br/>";
			echo"<div id='interfaceTrombi' style='display:block;'>";
			echo "<div class='clear'></div>";
		}
		else{
			echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode trombinoscope' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Switchez !'style='float:right;'/>";
			echo "<br/><br/>";
			echo"<div id='interfaceTrombi' style='display:none;'>";
			echo "<div class='clear'></div>";
		}		
		foreach ($tabTrombi as $unEtu){
			echo "<a class='photoAbs' href='index.php?lien=absence&id=".$unEtu['idEtu']."&dateDeb=".$_GET['dateDeb']."&dateFin=".$_GET['dateFin']."'>
					<div name='".$unEtu['idEtu']."' alt ='trombi'>";
						if ($unEtu['photoEtu']<>'')
							echo "<img src='images/".$unEtu['photoEtu']."'width='140px' height='140px'/>";
						else
							echo "<img src='images/default.jpg' width='140px' height='140px'/>";
						echo $unEtu['prenomEtu']." ".$unEtu['nomEtu']."<br>".
						$unEtu['nbAbs']." absence(s)
					</div>
				</a>";
		}
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
							<th><center>Nombre d'absences</center></th>
						</tr>
					</thead>
					<tbody>				
						<?php				
							foreach ($tabTrombi as $unEtu){					
							echo"<tr onDblclick=document.location='index.php?lien=absence&id=".$unEtu['idEtu']."&dateDeb=".$_GET['dateDeb']."&dateFin=".$_GET['dateFin']."'>";
								echo"<td>".$unEtu['nomEtu']."</td>";
								echo"<td>".$unEtu['prenomEtu']."</td>";
								echo"<td class='center'>".$unEtu['nbAbs']."</td>";
							echo"</tr>";					
						}
						?>
					</tbody>
				</table>
				</div>
				<?php	
				
	?>
	<div class="clear"></div>
	
	
	
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
	
	<br>
</section>