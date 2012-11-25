<?php

	//ce cron est appelé toutes les 5 minutes

	include_once("../include/inc_connexion.php");
	include_once("m_calendar.php");

	$calendar = getCoursInter();
	$coursDuMoment = getCoursduMomentAllInter($calendar);
	$heure = date('H');
	$minute = date('i');

	$temps = $heure*60+$minute;

	//si il y a un cours en ce moment
	if (!empty($coursDuMoment))
	{
		$coursDeb = $coursDuMoment['heureDeb'];
		$coursDeb = explode(":", $coursDeb);
		$coursDeb = $coursDeb[0]*60+$coursDeb[1];

		// si c'est le moment d'envoyer un mail (entre 1h00 et 1h05)
		var_dump($coursDuMoment);
		var_dump($coursDeb);
		var_dump($temps);

		$diffTemps = $temps - $coursDeb;
		$jour = date("Y-m-d");
		if ($diffTemps >= 60 && $diffTemps < 65)
		{
			$absences = array();

			//requete pour savoir qui est absent
			$req = "SELECT idAbs, nomEtu, prenomEtu, libEnt, telRH, nomRH, prenomRH
						FROM etudiant et
							INNER JOIN absence ab ON ab.idEtu = et.idEtu
								INNER JOIN entreprise ent ON ent.idEnt= et.idEnt
									WHERE jourAbs = '".$jour."'
									 AND hDebAbs = '".$coursDuMoment['heureDeb'].":00'
					";
			$exereq = mysql_query($req) or die(mysql_error());
			while ($ligne = mysql_fetch_array($exereq))
			{
				$absences[$ligne['idAbs']]['nom'] = $ligne['nomEtu'];
				$absences[$ligne['idAbs']]['prenom'] = $ligne['prenomEtu'];
				$absences[$ligne['idAbs']]['entreprise'] = $ligne['libEnt'];
				$absences[$ligne['idAbs']]['telRh'] = $ligne['telRH'];
				$absences[$ligne['idAbs']]['nomRh'] = $ligne['nomRH'];
				$absences[$ligne['idAbs']]['prenomRh'] = $ligne['prenomRH'];
			}

			$destinataire = "webdcedric@gmail.com";
			$sujet = "Les absences du cours de ".$coursDuMoment['libcours'];
			$message = "Bonjour,\n \n 

						Voici les absents du cours de ".$coursDuMoment['libcours']." de ".$coursDuMoment['heureDeb']." / ".$coursDuMoment['heureFin'].".\n \n ";

			if (empty($absences))
			{
				$message .= "Il n'y a pas d'absent. =)";
			}
			else
			{
				foreach ($absences as $key => $value) {
					$message .= $value['prenom']." ".$value['nom']." est absent. Son entreprise est ".$value['entreprise'].".\n
					RH de son entreprise : ".$value['prenomRh']." ".$value['nomRh'].", tel : ".$value['telRh']."\n\n";
				}
			}



			echo $message;
			//envoie du mail
			mail($destinataire, $sujet, $message);
		}
	}

?>