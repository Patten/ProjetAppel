<?php



function getAbsBySpe($spe){
	$tab = array();
	$req = "SELECT COUNT(idAbs)as nbAbs, libSpe, etudiant.prenomEtu as firstName, etudiant.nomEtu as lastName , absence.jourAbs, MONTH(absence.jourAbs) as month, YEAR(absence.jourAbs) as year 
			FROM absence, etudiant, specialisation 
			WHERE absence.idEtu = etudiant.idEtu 
			AND etudiant.idSpe = specialisation.idSpe 
			AND specialisation.idSpe = '$spe' 
			GROUP BY etudiant.idEtu, MONTH(absence.jourAbs), YEAR(absence.jourAbs)
			ORDER BY YEAR(absence.jourAbs) DESC, MONTH(absence.jourAbs) DESC";

	$exereq = mysql_query($req) or die(mysql_error());
	while($ligne=mysql_fetch_array($exereq))
		$tab[nbToMonth($ligne['month']).' '.$ligne['year']][$ligne['firstName'].' '.$ligne['lastName']] = $ligne['nbAbs'];

	return $tab;
}

function getAbsByMonth($student){
	$tab = array();
	$req = "SELECT COUNT(idAbs)as nbAbs, SUM(IF(justifAbs='1',1,0)) as nbJustif, etudiant.prenomEtu as firstName, etudiant.nomEtu as lastName , absence.jourAbs, MONTH(absence.jourAbs) as month, YEAR(absence.jourAbs) as year 
			FROM absence, etudiant
			WHERE absence.idEtu = etudiant.idEtu
			AND etudiant.idEtu = '$student' 
			GROUP BY MONTH(absence.jourAbs), YEAR(absence.jourAbs)
			ORDER BY YEAR(absence.jourAbs) DESC, MONTH(absence.jourAbs) DESC
			LIMIT 0 , 12";

	$exereq = mysql_query($req) or die(mysql_error());
	while($ligne=mysql_fetch_array($exereq))
	{
		$tab[nbToMonth($ligne['month'])]['total'] = $ligne['nbAbs'];
		$tab[nbToMonth($ligne['month'])]['justif'] = $ligne['nbJustif'];
	}

	$tab = array_reverse($tab); 
	
	return $tab;
}

function nbToMonth($nb){
	switch ($nb){
		case 1:
			$month = "Janvier";
			break;
		case 2:
			$month = "Février";
			break;
		case 3:
			$month = "Mars";
			break;
		case 4:
			$month = "Avril";
			break;
		case 5:
			$month = "Mai";
			break;
		case 6:
			$month = "Juin";
			break;
		case 7:
			$month = "Juillet";
			break;
		case 8:
			$month = "Août";
			break;
		case 9:
			$month = "Septembre";
			break;
		case 10:
			$month = "Octobre";
			break;
		case 11:
			$month = "Novembre";
			break;
		case 12:
			$month = "Décembre";
			break;
	}
	return $month;
}