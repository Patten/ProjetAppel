<?php

if($_SESSION['statut'] <> 'secretaire')
	exit;

include_once("vues/v_menu.php");
include_once("model/m_stats.php");
$tabStatsAbs = getAbsBySpe($_GET['spe']);
include_once("vues/v_stats.php");