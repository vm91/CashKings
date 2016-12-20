<?php
session_start();
$host="localhost"; // Host navn 
$brukernavn="root"; // Mysql brukernavn
$passord=""; // Mysql passord
$db_navn="cashkings"; // Databasenavn
$tbl_navn="kunde"; // Tabellnavn


// Kobler til server og velger database
mysql_connect("$host", "$brukernavn", "$passord")or die("Kunne ikke koble til"); 
mysql_select_db("$db_navn")or die("Kunne ikke velge database");

// Brukernavn og passord sendt fra form
$epost=$_POST['epost']; 
$passord=$_POST['passord'];


// For å beskytte "MySQL injection"

$epost = stripslashes($epost);
$passord = stripslashes($passord);
$epost = mysql_real_escape_string($epost);
$passord = mysql_real_escape_string($passord);

// Velger ut brukernavn og passord fra databasen

$sql="SELECT * FROM $tbl_navn WHERE epost='$epost' and passord= Password('$passord')";
$result=mysql_query($sql);



// Mysql_num_row teller rows i tabell
$count=mysql_num_rows($result);

// Hvis resultat matcher $epost og $passord, skal radene i tabellen være lik 1
if($count>0){

// Registrer $epost, $brukernavn og vidresend til fil "index.php"

$_SESSION['epost'] = $epost;
$_SESSION['passord'] = $passord;

//session_register('epost');
//session_register('passord');
header("location:index.php");
}
else 
{
echo "Feil brukernavn eller passord";
}
ob_end_flush();

?>

<?php
$holdbarhet = time() + 60*60*24*30; // 30 dager
if (isset ($_COOKIE['besok'])) {
setcookie ('besok', $_COOKIE['besok']+1, $holdbarhet);
$_COOKIE['besok']++;
} else {
setcookie ('besok', "1", $holdbarhet);
$_COOKIE['besok'] = 1;
} ?>

