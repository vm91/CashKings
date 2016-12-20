<?php
session_start();
?>
<?php
include "topp.htm";
?>
<div id="menu1"> 
<ul class="glossymenu">
	<li><a href="index.php"><b>Forsiden</b></a></li>
	<li><a href="data.php"><b>Data og datautstyr</b></a></li>
	<li><a href="elektronikk.php"><b>Elektronikk</b></a></li>
	<li><a href="klokker.php"><b>Klokker og smykker</b></a></li>
	<li><a href="transport.php"><b>Kjøretøy</b></a></li>
</ul>
</div> 

<div id="innhold">

<?php


if( isset( $_SESSION['handlekurv'] ) )
{
	$handlekurv = $_SESSION['handlekurv'];
	print "<h3>Handlekurv</h3>";
	print '<div id="kurvtabell">';
	print "<table border=1>"; 
	   echo "<tr><th>Varennr: </th><th>Antall: </th><th>Varenavn: </th><th>Pris per Enhet: </th><th>Totalpris:</th></tr>"; 
	foreach( $handlekurv as $varenr => $antall )
	{
		$sql = "SELECT * FROM vare WHERE varenr=" . $varenr;
		mysql_connect( "localhost", "root", "" );
		mysql_select_db( "cashkings" );
		$resultat = mysql_query( $sql );

		
		if( !resultat )
			die( "Kunne ikke hente varedata" );
		else
		{
				
			while( $rad = mysql_fetch_object( $resultat ) )
			{
				
		$totalprisprvare = $rad->pris * $antall;
				$output = "<tr><td>".$rad->varenr . "</td> <td>" . $antall ." stk </td><td>" . $rad->varenavn . "</td>  <td>" . $rad->pris . "kr</td>  <td>" . $totalprisprvare . "kr</td><br/>";
				echo $output;
				$mail.=$output;
				$_SESSION['ordreinfo']=$mail;
			}
		}
	}
echo "</table>"; 
echo "</div>";
}
 
else
	echo "Du har ikke puttet noen varer her ennå. Handlekurven er tom";

?>
<form action="send.php" method="POST">
<div id="frakt">
<table>
<br><tr><td>Fraktmåte:</td></tr><br>
<tr><br><td>Kameltransport - 75kr</td>
<td><input type="radio" name="frakt" value="75"/></td></tr><br>
<tr><td>Hestetransport - 130kr</td>
<td><input type="radio" name="frakt" value="130"/></td></tr><br>
<tr><td>Bil - 200kr</td>
<td><input type="radio" name="frakt" value="200"/></td></tr><br>
<tr><td>Hurtigtransport - 250kr</td>
<td><input type="radio" name="frakt" value="250"/></td></tr><br>
</table>

</div>
<?php
	echo "<br>";
	echo "<br>";
	echo "<a href='tomkurv.php'>Tøm handlekurven</a>";
	echo "<br>";
	echo "<a href='javascript:document.forms[0].submit();'>Send inn din bestilling</a>"; 
?>
</form>
		<p>© CashKings © 2011</p>
</div>

<?php
include "bunn.htm";
?>
