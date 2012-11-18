<?php
//vérification des champs concernants le cours et appel de trombi pour selectionner les absents
include("vues/v_menu.php");
include("model/m_appel.php");

//On affiche la promo 2012 de sept 2012 à août 2013 --> ensuite, on passe à la promo 2013...
$annee = date('Y');
if(date('m') <= 8) $annee--;
$tabTrombi = showTrombi($_POST['listSpe'], $annee);

include("vues/v_appel.php");	
?>