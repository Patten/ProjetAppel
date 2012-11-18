<?php
	if (mail('Ligeret_julien@yahoo.fr', 'Absence', $_POST['message']) ) echo "Envoi du mail réussi.";
?>