	<!-- début du form dans v_choixDate -->
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

		<select name="annee"> // remplissage de la comboBox avec les années
		<?php
			for($i=$annee; $i>=2012; $i--)
			{
				echo "<option value='".$i."'>".$i."</option>";
			}
		?>
		</select>
		<input type="submit">
	</form>	<!-- Fin du formulaire "dateDeb dateFin annee specialité" -->
</header> <!-- Fin section formulaire -->

<section>
	<?php
		$tabTrombi = listerAbsents();
					
		foreach ($tabTrombi as $unEtu){
			echo "<a href='index.php?lien=absence&id=".$unEtu['idEtu']."&dateDeb=".$_GET['dateDeb']."&dateFin=".$_GET['dateFin']."'>
					<div name='".$unEtu['idEtu']."' class='photo' alt ='trombi'>";
						if ($unEtu['photoEtu']<>'')
							echo "<img src='images/".$unEtu['photoEtu']."'width='100px' height='100px'/>";
						else
							echo "<img src='images/default.jpg' width='100px' height='100px'/>";
						echo $unEtu['prenomEtu']." ".$unEtu['nomEtu']."<br>".
						$unEtu['nbAbs']." absence(s)
					</div>
				</a>";
			
		}
	?>
	<div class="clear"></div>
</section>