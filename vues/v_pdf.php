<?php
require('../include/fpdf/fpdf.php');

$champFr = array(	'jourAbs' => 'Date',
					'hDebAbs' => 'Heure de début du cours',
					'hFinAbs' => 'Heure de fin du cours',
					'libCoursAbs' => 'Nom du cours',
					'justifAbs' => 'Justification',
					'motifAbs' => 'Motif',
					'nomUti' => 'Nom de l\'intervenant',
					'prenomUti' => 'Prénom de l\'intervenant'
);

//connexion à la bd
/*connection pour Windows --> WAMP */
	$serveur="localhost";
	$utilisateur="root";
	$mdp="";
	$connect=mysql_connect($serveur, $utilisateur, $mdp);
	
	/*connection pour Mac --> MAMP */
	if ($connect== "")
	{
		$serveur="localhost";
		$utilisateur="root";
		$mdp="root";
		$connect=mysql_connect($serveur, $utilisateur, $mdp);
	}
	
	mysql_select_db("projet_appel") or die("echec à la connection");

//déclaration du document pdf
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

//requete SQL
$req = "SELECT nomEtu, prenomEtu FROM Etudiant WHERE idEtu='".$_GET['id']."'";
$exereq = mysql_query($req) or die(mysql_error());
$ligne=mysql_fetch_array($exereq);

$pdf->Cell(60,10,'Liste des absences de '.$ligne['prenomEtu'].' '.$ligne['nomEtu']);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);

$req = "SELECT ab.jourAbs, ab.hDebAbs , ab.hFinAbs, ab.libCoursAbs, ab.justifAbs, ab.motifAbs, nomUti, prenomUti	
				FROM Absence ab 
					INNER JOIN Utilisateur ut ON ut.idUti=ab.idUti
						WHERE idEtu='".$_GET['id']."'";

$exereq = mysql_query($req) or die(mysql_error());
while($ligne=mysql_fetch_array($exereq))
{
	
	$j=0;
	$i=0;
    foreach($ligne as $col)
	{
		if ($j%2)
		{
			$pdf->Cell(50,6, utf8_decode ($champFr[mysql_field_name($exereq, $i)]),1); 
            $pdf->Cell(145,6, utf8_decode ($col),1);
			$pdf->Ln();
			
			$i++;
		}
		$j++;
	}
   
   $pdf->Ln();
}

//AND.... IT'S GONE !
$pdf->Output();
?>