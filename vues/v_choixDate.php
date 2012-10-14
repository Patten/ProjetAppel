<header class= "headAbs">
		
	<form method="GET"> <!-- formulaire "dateDeb dateFin" + "annee specialité" dans v_listeAbsence -->
			Du 
			<input type="date" name="dateDeb" id="dateDeb" placeholder="AAAA-MM-JJ" <?php if($_GET['dateDeb'] != '') echo 'value="'.$_GET['dateDeb'].'"'; ?> >
			au
			<input type="date" name="dateFin" id="dateFin" placeholder="AAAA-MM-JJ" <?php if($_GET['dateFin'] != '') echo 'value="'.$_GET['dateFin'].'"'; ?> >
			
			<input type="hidden" name="lien" id="lien" value="absence"> <br>
			
			<?php if(isset($_GET['id']))
			{
				if($_GET['id'] >= 0)
					echo '<input type="hidden" name="id" id="id" value="'.$_GET['id'].'">'; 
			}
			?>
			
	<!-- ne pas fermer le formulaire ici -->
