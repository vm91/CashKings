<?php
include "authorization.php";
<div id="innhold">

<p>© CashKings © 2011</p>
<?php
include 'connect-DB.php';
echo "<h2>Øvelse tabellen:</h2>";
$sql="SELECT ordrelinje.*, ordre.kundenr, ordre.ordredato FROM ordre, ordrelinje WHERE ordre.ordrenr = ordrelinje.ordrenr

<tr>
	<td>OrdreNr: </td><td><input type="text" name="OrdreNr" /></td>
</tr>
if isset($_REQUEST["slett"]))

$sql="Delete * FROM ordrelinje WHERE $OrdreNr = $Slettordre";
$sql ";
	$resultat = mysql_query($sql);
	if (!$resultat)
	{
		echo "Feil, kunne ikke slette ordre fra databasen!";
	}
	elseif(mysql_affected_rows ()==0)
	{
		echo "Feil, ingen oppdatering, eller feil kundenr !";
	}
	else
	{
	echo "Sletting utført";
	}
}

?>