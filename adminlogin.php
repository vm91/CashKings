<?php
session_start();
$host="localhost"; // Host navn 
$brukernavn="root"; // Mysql brukernavn
$passord=""; // Mysql passord
$db_navn="cashkings"; // Databasenavn
$tbl_navn="ansatte"; // Tabellnavn


// Kobler til server og velger database
mysql_connect("$host", "$brukernavn", "$passord")or die("Kunne ikke koble til"); 
mysql_select_db("$db_navn")or die("Kunne ikke velge database");

// Brukernavn og passord sendt fra form
$admin=$_POST['brukernavn']; 
$passord=$_POST['passord'];


// For å beskytte "MySQL injection"

$admin = stripslashes($admin);
$passord = stripslashes($passord);
$admin = mysql_real_escape_string($admin);
$passord = mysql_real_escape_string($passord);

// Velger ut brukernavn og passord fra databasen

$sql="SELECT * FROM $tbl_navn WHERE ansattnavn='$admin' and passord= Password('$passord')";
$result=mysql_query($sql);



// Mysql_num_row teller rows i tabell
$count=mysql_num_rows($result);

// Hvis resultat matcher $brukernavn og $passord, skal radene i tabellen være lik 1
if($count>0){

// Registrer $passord, $brukernavn og vidresend til fil "admin.php"

$_SESSION['admin'] = $admin;
$_SESSION['passord'] = $passord;

//session_register('admin');
//session_register('passord');
header("location:admin.php");
}
else 
{
header("location:admin.php");
}
ob_end_flush();
?>



