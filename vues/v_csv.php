<?php
include_once("../include/inc_connexion.php");

$champFr = array( 
          'idAbs' => "Identifiant de l'absence",
          'jourAbs' => 'Date',
          'hDebAbs' => 'Heure de debut du cours',
          'hFinAbs' => 'Heure de fin du cours',
          'libCoursAbs' => 'Nom du cours',
          'justifAbs' => 'Justification',
          'motifAbs' => 'Motif',
          'nomUti' => 'Nom de l\'intervenant',
          'prenomUti' => 'Prenom de l\'intervenant'
);


$req = "SELECT nomEtu, prenomEtu FROM etudiant WHERE idEtu='".$_GET['id']."'";
$exereq = mysql_query($req) or die(mysql_error());
$ligne=mysql_fetch_array($exereq);

echo "Liste des absences de;;".$ligne['prenomEtu'].";".$ligne['nomEtu']."\n\n";


header("Content-Type: application/csv-tab-delimited-table");
header("Content-disposition: filename=listeAbsences.csv");

$requette = mysql_query("SELECT ab.idAbs, ab.jourAbs, ab.hDebAbs , ab.hFinAbs, ab.libCoursAbs, ab.justifAbs, ab.motifAbs, nomUti, prenomUti	
								FROM absence ab 
									INNER JOIN utilisateur ut ON ut.idUti=ab.idUti
										WHERE idEtu='".$_GET['id']."'");
if (mysql_num_rows($requette) != 0) {
  $champs = mysql_num_fields($requette);
  $i = 0;
  while ($i < $champs) {
    echo $champFr[mysql_field_name($requette, $i)].";";
    $i++;
  }
  echo "\n";
  while ($arrSelect = mysql_fetch_array($requette, MYSQL_ASSOC)) {
   foreach($arrSelect as $elem) {
    echo "$elem;";
   }
   echo "\n";
  }
}

?>