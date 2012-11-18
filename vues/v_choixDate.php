	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
		<script>
		    $(function() {
		        $( "#dateDeb" ).datepicker();
		    });
		    $(function() {
		        $( "#dateFin" ).datepicker();
		    });
    	</script>

<header class= "headAbs span8 tright">	
	<form method="GET"> <!-- formulaire "dateDeb dateFin" + "annee specialité" dans v_listeAbsence -->
			<br><strong>Date :</strong> du 
			<input type="text" name="dateDeb" id="dateDeb" placeholder="Date de Début" <?php /*if($_GET['dateDeb'] != '') echo 'value="'.$_GET['dateDeb'].'"';*/ ?> >
			<br>
			au
			<input type="text" name="dateFin" id="dateFin" placeholder="Date de fin" <?php /*if($_GET['dateDeb'] != '') echo 'value="'.$_GET['dateDeb'].'"';*/ ?> >
			
			<input type="hidden" name="lien" id="lien" value="absence">
			
			<?php if(isset($_GET['id']))
			{
				if($_GET['id'] >= 0)
					echo '<input type="hidden" name="id" id="id" value="'.$_GET['id'].'">'; 
			}
			?>
			
	<!-- ne pas fermer le formulaire ici -->
