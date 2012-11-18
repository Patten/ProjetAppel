<?php

//retourne un tableau contenant le cours (heure début, heure fin, nom du cours, spécialité) du moment pour cet intervenant
//si pas de cours en ce moment, return false;
function getCoursInter(){

    global $numCours;
    global $calendar;
    $numCours = 0;

	$urlCalendar = "http://www.google.com/calendar/feeds/2stnclhbdc78erj5s8bitnkp3c%40group.calendar.google.com/public/basic";

    $document_xml = new DomDocument;
    $document_xml->load($urlCalendar);
    $elements = $document_xml->getElementsByTagName('feed');
    $arbre = $elements->item(0);
    parsage_enfant($arbre); //Parse l'arbre xml avec comme racine le noeud 'commandes'
	return $calendar;
}

function parsage_enfant($noeud)// Fonction de parsage d'enfants
{
    $enfants_niv1 = $noeud->childNodes; // Les enfants du nœud traité 
    
    foreach($enfants_niv1 as $enfant) // Pour chaque enfant, on vérifie…
    {      
    		
            if($enfant->hasChildNodes() == true) // …s'il a lui-même des enfants
            {
                    parsage_enfant($enfant); // Dans ce cas, on revient sur parsage_enfant
            }
            else // ... s'il n'en a plus !
            {
                    parsage_normal($enfant); // On parse comme un nœud normal
            }
    }
    return parsage_normal($noeud);
}

function parsage_normal($noeud)
{  
    global $calendar;
    global $numCours;
  
    $nom = $noeud->nodeName; // On récupère le nom du nœud
    $contenu = $noeud->nodeValue; // Sinon, le contenu du nœud
       
    //On remplit le tableau $uneCommande avec les données du xml
    //Ne pas afficher les lignes récapitulatives

    if($nom == 'entry' )
   {
        $numCours++;
   }

    if($nom == 'title' )
   {
        $contenuCours = explode('(', $contenu);

        $calendar[$numCours]['libcours'] = $contenuCours[0];
        $calendar[$numCours]['intervenant'] = @substr($contenuCours[1], 0, 2);
        $calendar[$numCours]['spe'] = '1';

        $contenuSpe = explode('_', $contenu);
        if (isset($contenuSpe[1]))   $calendar[$numCours]['spe'] = $contenuSpe[1];
    
   }

   if($nom == 'summary' )
   {
        $convertMois = array(  'janv.' => '01',
                                    'f&eacute;vr.' => '02',
                                    'mars' => '03', 
                                    'avr.' => '04', 
                                    'mai' => '05',
                                    'juin' => '06', 
                                    'juil.' => '07', 
                                    'ao&ucirc;t' => '08', 
                                    'sept.' => '09', 
                                    'oct.' => '10', 
                                    'nov.' => '11', 
                                    'd&eacute;c.' => '12' );

        $contenu = explode(' ', $contenu);
        $annee=substr($contenu[5], 0, 4);
        $mois=substr($contenu[4], 0);
        $mois=$convertMois[$mois];
        $jour=$contenu[3];
        if ($jour < 10) $jour = '0'.$jour;
        $calendar[$numCours]['date'] = $jour.'-'.$mois.'-'.$annee;
        $calendar[$numCours]['heureDeb'] = $contenu[6];
        $calendar[$numCours]['heureFin'] = substr($contenu[8], 0, 5);

	}
}

function getCoursduMoment($calendar){
    $coursDuMoment = array();

    foreach ($calendar as $cours)
    {
        if ($cours['heureDeb'][0] >= 0 && $cours['heureDeb'][0] <= 9)
        {
            $heureSup = $cours['heureDeb'];
            $tabHeureSup = explode(':' , $heureSup);
            $tabHeureSup[0]++;
            if ($tabHeureSup[0] == 24) $tabHeureSup[0] = '00';
            $heureSup = $tabHeureSup[0].':'.$tabHeureSup[1];

            if($cours['intervenant'] == $_SESSION['initiales'] && $cours['date'] == date('d-m-Y') && $cours['heureDeb'] <= date('H:i') && $heureSup >= date('H:i'))
            {
                $coursDuMoment = $cours;
            }
        }
    }
    return $coursDuMoment;
}

function getNextCours($calendar){
    $lesCours = array();

    //var_dump($calendar);

    return $lesCours;
}



















function getAllCoursInter($idInter){

}
?>