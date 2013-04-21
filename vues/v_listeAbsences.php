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
			echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode tableau' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
			echo "<br/><br/>";
			echo"<div id='interfaceTrombi' style='display:block;'>";
			echo "<div class='clear'></div>";
		}
		else{
			echo "<input type='button' id='btn_gestionUti' class='btn btn-primary' value='Mode trombinoscope' rel='popover' data-content='Cliquer sur ce bouton vous permet de changer la présentation des étudiants.' data-original-title='Changez !'style='float:right;'/>";
			echo "<br/><br/>";
			echo"<div id='interfaceTrombi' style='display:none;'>";
			echo "<div class='clear'></div>";
		}		
		foreach ($tabTrombi as $unEtu){
			echo "<a class='photo' href='index.php?lien=absence&id=".$unEtu['idEtu']."&dateDeb=".$_GET['dateDeb']."&dateFin=".$_GET['dateFin']."'>
					<div name='".$unEtu['idEtu']."' alt ='trombi'>";
						if ($unEtu['photoEtu']<>'')
							echo "<img src='images/".$unEtu['photoEtu']."'width='170px' height='180px'/>";
						else
							echo "<img src='images/default.jpg' width='170px' height='180px'/>";
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
	
				<div class='clear'></div>
				<table class="footable">
				<thead>
					<tr>
						<th data-class="expand" data-sort-initial="true">
							Nom
						</th>
						<th data-hide="phone">
							Prénom
						</th>
						<th data-type="numeric">
							Nombre d'absences
						</th>	
						<th data-sort-ignore="true"></th>					
					</tr>

					<tbody>				
						<?php				
							foreach ($tabTrombi as $unEtu){					
							echo"<tr onDblclick=document.location=''>";
								echo"<td>".$unEtu['nomEtu']."</td>";
								echo"<td>".$unEtu['prenomEtu']."</td>";
								echo"<td class='center'>".$unEtu['nbAbs']."</td>";
								echo"<td><div onclick=document.location='index.php?lien=absence&id=".$unEtu['idEtu']."&dateDeb=".$_GET['dateDeb']."&dateFin=".$_GET['dateFin']."' class='btn btn-primary'>ouvrir</div></td>";
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

	$(function() {
		$('table').footable({
			breakpoints: {
			    mamaBear: 1200,
			    babyBear: 600
			}
		});

		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		}).on('shown', function (e) {	
			$('.tab-pane.active table').trigger('footable_resize');
		});
	});
		
	$('#btn_gestionUti').popover({placement:'left', trigger:'hover'}) // permet d'afficher les message d'aides quand on clique sur un bouton d'aide
			
});

</script>		
	
	<br>
</section>