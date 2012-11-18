<section>

		
		<section id="content"> <!-- CONTENT -->
			
			<header class="headGest">
				<a href='index.php?lien=gestion&qui=etudiant'>Etudiant</a>
				<a href='index.php?lien=gestion&qui=intervenant'>Intervenant</a>
				<a href='index.php?lien=gestion&qui=spe'>Spécialité</a>
			</header><br>
				
			<?php
				if(!(isset($_GET['qui']))) $_GET['qui'] = "etudiant";
					
				function affNouveau()
				{
					echo "<a href='index.php?lien=gestion&"; if ($_GET['qui']=='etudiant') echo "idEtu=-1"; else echo "idUti=-1"; echo "'>
							<div name='newEtu' class='photo'>
								<img src='images/new.jpg 'width='100px' height='100px'/>
								Nouveau<br>	
							</div>
						</a>";
				}
				
				
				if ($_GET['qui']=='etudiant')
				{
					$tabTrombi = listerEtudiant();
					
					foreach ($tabTrombi as $unEtu){
						echo "<a href='index.php?lien=gestion&idEtu=".$unEtu['idEtu']."'>
								<div name='".$unEtu['idEtu']."' class='photo'>";
									if($unEtu['photoEtu']=='')
									{
										echo "<img src='images/default.jpg' width='100' height='100'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unEtu['photoEtu']."' width='100px' height='100px'  alt ='trombi'/>";
									}
									echo $unEtu['prenomEtu']." ".$unEtu['nomEtu']."<br>	
								</div>
							</a>";
					}
					affNouveau();
					
				} // fin étudiant
				else if($_GET['qui']=='intervenant')// si intervenant
				{
					$tabTrombi = listerUtilisateur();
					
					foreach ($tabTrombi as $unUti){
						echo "<a href='index.php?lien=gestion&idUti=".$unUti['idUti']."'>
								<div name='".$unUti['idUti']."' class='photo'>";
									if($unUti['photoUti']=='')
									{
										echo "<img src='images/default.jpg' width='100' height='100'  alt ='trombi'/>";
									}
									else
									{
										echo "<img src='images/".$unUti['photoUti']."' width='100px' height='100px'  alt ='trombi'/>";
									}
									echo $unUti['prenomUti']." ".$unUti['nomUti']."<br>	
								</div>
							</a>";
					}
					affNouveau();
				}
				
				if ($_GET['qui']=='spe')
				{
					$tab = listerSpe();
					echo "<br>Liste des spécialités :<br><br>";
					foreach($tab as $uneSpe)
						echo $uneSpe."<br>";
					
					echo "<br><br>Ajouter une spécialité :
					<form method='POST'>
						<input type='text' name='newSpe'>
						<input type='hidden' name='qui' value='spe'>
						<input class='sendgest' name='button' type='submit' value='Ajouter'>
					</form>";

				}

			?>
			<div class="clear"></div>
		</section> <!-- END CONTENT -->
</section>