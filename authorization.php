<?php
session_start();
function krevInnlogging() {
	echo "<center><h2>ACCESS DENIED</h2>";
	echo "<center>Attempts to hack this website will result in police investigation.";
	echo '</br></br>If you have Admin privilegies, please procceed to login @ <a href="adminlogginn.php">Admin</a></br></br>';
	echo "<i>Regards, CashKings security.</i>";
	exit;
}

if (!isset($_SESSION['admin'])) {
	krevInnlogging();
}
else {
	if ( ($_SESSION['admin'] == "Einar") &&
				($_SESSION['passord'] == "einar") ) {

		include "toppadmin.html";
		
	}


	else {
		krevInnlogging();
		}
	}
?>