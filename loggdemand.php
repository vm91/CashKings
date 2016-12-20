<?php
session_start();
function krevInnlogging() {
	header ('WWW-autenticate: Basic realm="Du må logge inn"');
	header ('http/1.0 401 Unautorized');
	exit;
}

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	krevInnlogging();
}
else {
	if ( ($_SERVER['PHP_AUTH_USER'] == "Einar") &&
				($_SERVER['PHP_AUTH_PW'] == "einar") ) {
		echo "<p>Hei " . $_SERVER['PHP_AUTH_USER'] . "<br/>";
		echo "Oppgitt passord: {$_SERVER['PHP_AUTH_PW']}<br/>"L
		echo "...og du er nå autorisert!</p>";
		include "admin.php";
	}
	else {
		krevInnlogging();
		}
	}
?>
	