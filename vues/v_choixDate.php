	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
	<script>
			jQuery(function($){
				$.datepicker.regional['fr'] = {
					closeText: 'Fermer',
					prevText: 'Précédent',
					nextText: 'Suivant',
					currentText: 'Aujourd\'hui',
					monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
					'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
					monthNamesShort: ['Janv.','Févr.','Mars','Avril','Mai','Juin',
					'Juil.','Août','Sept.','Oct.','Nov.','Déc.'],
					dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
					dayNamesShort: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
					dayNamesMin: ['D','L','M','M','J','V','S'],
					weekHeader: 'Sem.',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''};
				$.datepicker.setDefaults($.datepicker.regional['fr']);
			});
		    $(function() {
		        $( "#dateDeb" ).datepicker();
		    });
		    $(function() {
		        $( "#dateFin" ).datepicker();
		    });
    </script>

<header class= "headAbs span8 tright">	
	<form method="GET"> <!-- formulaire "dateDeb dateFin" + "annee specialité" dans v_listeAbsence -->
		<br><h4>Rechercher une absence :</h4>
			<strong>Date :</strong> du 
			<input type="text" name="dateDeb" id="dateDeb" placeholder="Date de Début" <?php if(isset($_GET['dateDeb'])) echo 'value="'.$_GET['dateDeb'].'"'; ?> >
			<br>
			au
			<input type="text" name="dateFin" id="dateFin" placeholder="Date de fin" <?php if(isset($_GET['dateFin'])) echo 'value="'.$_GET['dateFin'].'"'; ?> >
			
			<input type="hidden" name="lien" id="lien" value="absence">
			
			<?php if(isset($_GET['id']))
			{
				if($_GET['id'] >= 0)
					echo '<input type="hidden" name="id" id="id" value="'.$_GET['id'].'">'; 
			}
			?>
			
	<!-- ne pas fermer le formulaire ici -->
