<!-- Le menu quelque soit la page -->
	
	<div class="navbar navbar-inverse">
  		<div class="navbar-inner">
			<a class="brand" href="index.php">Accueil</a>
			<ul class="nav">	
				
				 <?php if($_SESSION['statut'] == "secretaire"){ ?>
				 	<li  <?php if($lien == 'accueil') echo 'class="active"'; ?> ><a href='index.php'>Appel</a></li>
 					<li  <?php if($lien == 'absence') echo 'class="active"'; ?> ><a href='index.php?lien=absence'>Absences</a></li>
					<li  <?php if($lien == 'gestion') echo 'class="active"'; ?> ><a href='index.php?lien=gestion'>Gestion</a></li>
 				<?php } ?>
 			</ul>
 			<ul class="nav pull-right">
 				<li><a href='include/inc_deconnexion.php'>Déconnexion [ <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> ]</a></li>
 			</ul>
		</div>
	</div>
