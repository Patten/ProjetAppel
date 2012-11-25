<?php

	function listerAbsents(){
		$tab = array();

		$date = array();
		
		if($_GET['dateDeb']!=''){
			$date = explode('/',$_GET['dateDeb']);
			$dateDeb = $date[2].'-'.$date[1].'-'.$date[0];
		}
		else{
			$dateDeb = date('Y-m-d', strtotime("-1 year"));
		}
		if($_GET['dateFin']!=''){
			$date = explode('/',$_GET['dateFin']);
			$dateFin = $date[2].'-'.$date[1].'-'.$date[0];
		}
		else{
			$dateFin = date('Y-m-d');
		}

		$req="SELECT DISTINCT et.idEtu, nomEtu, prenomEtu, photoEtu
				FROM etudiant et
				 INNER JOIN absence ab on ab.idEtu=et.idEtu 
					WHERE et.anneeEtudeEtu = '".$_GET['annee']."'";
		if ($_GET['spe'] != 1) $req .= " AND et.idSpe =  '".$_GET['spe']."'";
		if ($dateDeb != '') $req .= " AND ab.jourAbs >=  '".$dateDeb."'";
		if ($dateFin != '') $req .= " AND ab.jourAbs <=  '".$dateFin."'";

		$exereq = mysql_query($req) or die(mysql_error());
	
		while($ligne=mysql_fetch_array($exereq))
		{
			$tab[$ligne['idEtu']]=$ligne;
			$tab[$ligne['idEtu']]['nbAbs'] = 0;
		}
		
		//ajouter le nombre de demi-journées d'absence
		foreach($tab as $etu)
		{
			$req="SELECT COUNT(idEtu) as 'nbAbs'
						FROM absence
							WHERE idEtu = '".$etu['idEtu']."' ";
		if ($dateDeb != '') $req .= " AND jourAbs >=  '".$dateDeb."'";
		if ($dateFin != '') $req .= " AND jourAbs <=  '".$dateFin."'";
			$exereq = mysql_query($req) or die(mysql_error());
			$ligne=mysql_fetch_array($exereq);
			$tab[$etu['idEtu']]['nbAbs'] = $ligne['nbAbs'];

		}
		
		return $tab;
	
	}
	
	function absEtu()
	{
		$tab = array();

		$date = array();
		
		if($_GET['dateDeb']!=''){
			$date = explode('/',$_GET['dateDeb']);
			$dateDeb = $date[2].'-'.$date[1].'-'.$date[0];
		}
		else{
			$dateDeb = date('d/m/Y', strtotime("-1 year"));
		}
		if($_GET['dateFin']!=''){
			$date = explode('/',$_GET['dateFin']);
			$dateFin = $date[2].'-'.$date[1].'-'.$date[0];
		}
		else{
			$dateFin = date('d/m/Y', strtotime("-1 year"));
		}

		$req="SELECT *
				FROM absence ab
					INNER JOIN utilisateur ut ON ut.idUti=ab.idUti
						INNER JOIN etudiant et ON et.idEtu=ab.idEtu
						WHERE ab.idEtu = '".$_GET['id']."'";
		if ($dateDeb != '') $req .= " AND ab.jourAbs >=  '".$dateDeb."'";
		if ($dateFin != '') $req .= " AND ab.jourAbs <=  '".$dateFin."'";
		
		$exereq = mysql_query($req) or die(mysql_error());
		while($ligne=mysql_fetch_array($exereq))
		{
			$tab[$ligne['idAbs']] = $ligne;
		}
		
		/*echo "<pre>";
		print_r($tab);
		echo "</pre>";*/
		return $tab;
	}
	
	function deleteAbs()
	{
		$req="DELETE FROM absence WHERE idAbs='".$_POST['idAbs']."'";
		$exereq = mysql_query($req) or die(mysql_error());
		header("location:index.php?lien=absence&id=".$_GET['id']);
	}
	
	function updateAbs()
	{
		$req="UPDATE  `absence` 
				SET 	`justifAbs` =  '".$_POST['justif']."',
						`motifAbs` =  '".$_POST['motif']."'
				WHERE  `idAbs` ='".$_POST['idAbs']."'";
		$exereq = mysql_query($req) or die(mysql_error());
		header("location:index.php?lien=absence&id=".$_GET['id']);
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>