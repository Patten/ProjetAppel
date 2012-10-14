<?php
include_once("../include/inc_connexion.php");

$req = "SELECT nomEtu, prenomEtu FROM etudiant WHERE idEtu='".$_GET['id']."'";
$exereq = mysql_query($req) or die(mysql_error());
$ligne=mysql_fetch_array($exereq);

echo "Liste des absences de;;".$ligne['prenomEtu'].";".$ligne['nomEtu']."\n\n";


header("Content-Type: application/csv-tab-delimited-table");
 /*?><script src="application/csv-tab-delimited-table" ><?php*/
 /*?><script type="application/csv-tab-delimited-table"></script><?php*/
header("Content-disposition: filename=listeAbsences.csv");
/*?><script>document.execCommand="filename=listeAbsences.csv";</script><?php*/

$requette = mysql_query("SELECT ab.idAbs, ab.jourAbs, ab.hDebAbs , ab.hFinAbs, ab.libCoursAbs, ab.justifAbs, ab.motifAbs, nomUti, prenomUti	
								FROM absence ab 
									INNER JOIN utilisateur ut ON ut.idUti=ab.idUti
										WHERE idEtu='".$_GET['id']."'");
if (mysql_num_rows($requette) != 0) {
  $champs = mysql_num_fields($requette);
  $i = 0;
  while ($i < $champs) {
    echo mysql_field_name($requette, $i).";";
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