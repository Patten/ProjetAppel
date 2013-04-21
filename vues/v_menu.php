<!-- Récupération des spécialités -->
<?php
	include_once('model/m_connexion.php');
	$allSpe = getAllSpe();

	/* absences */
	$jourMenu = date('d');
	$moisMenu = date('m');
	$anneeMenu = date('Y');
	$getToday = $jourMenu.'%2F'.$moisMenu.'%2F'.$anneeMenu;

?>

<!-- Le menu quelque soit la page -->
	
	<div class="navbar navbar-inverse">
  		<div class="navbar-inner">
  			<?php if($_SESSION['statut'] == "secretaire"){ ?>
				<a class="brand" href="index.php?lien=accueil">Accueil</a>
			<?php
			}
			else
			{
			?>
				<a class="brand" href="index.php?lien=accueil">Accueil</a>
			<?php	} ?>

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </a>

			<div class="nav-collapse collapse ">
				<ul class="nav">	

					 <?php if($_SESSION['statut'] == "secretaire"){ ?>
					 	<li  <?php if($lien == 'accueil') echo 'class="active"'; ?> ><a href='index.php?lien=accueil'>Appel</a></li>
	 					<li  <?php if($lien == 'absence') echo 'class="active"'; echo" ><a href='index.php?lien=absence&dateDeb=".$getToday."&dateFin=".$getToday."'>Absences</a></li>"; ?>
						<li  <?php if($lien == 'gestion') echo 'class="active"'; ?> ><a href='index.php?lien=gestion'>Gestion</a></li>
						<li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Statistiques<b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                          <li class="nav-header">Spécialité</li>
	                          <?php
	                          		foreach ($allSpe as $value) {
	                          			echo ' <li><a href="index.php?lien=stats&spe='.$value['idSpe'].'">'.$value['libSpe'].'</a></li>';
	                          		}
	                          ?>
	                        </ul>
                      	</li>
	 				<?php } ?>
	 			</ul>
 				 <ul class="nav pull-right">
	 				<li><a href='include/inc_deconnexion.php'>Déconnexion [ <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> ]</a></li>
	 			</ul>
 			</div>




		</div>
	</div>





      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->


