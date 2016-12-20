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
	print "<h3>Bestillingen er sendt</h3>";
	print "<p>Kvittering sendes til ".$_SESSION['epost']."</p>";
	print '<div id="kurvtabell">';
	print "<table border=1>"; 
	   echo "<tr><th>Varennr: </th><th>Antall: </th><th>Varenavn: </th><th>Pris per Enhet: </th><th>Totalpris:</th></tr>"; 

	mysql_connect( "localhost", "root", "" );
	mysql_select_db( "cashkings" );

	$frakt = $_REQUEST['frakt'];
	
	mysql_query("INSERT INTO ordre (kundenr,ansattnr,ordredato,totalpris) values (1,0,now(),0)");
	$ordrenr = mysql_insert_id();

	foreach( $handlekurv as $varenr => $antall )
	{
		$sql = "SELECT * FROM vare WHERE varenr=" . $varenr;
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
				mysql_query("INSERT INTO ordrelinje (ordrenr,varenr,prisprenhet,antall) values ($ordrenr,".$rad->varenr.",".$rad->pris.",".$antall.")"); 
			}
		}
	}
	$resultat = mysql_query("select sum(prisprenhet*antall) as total from ordrelinje where ordrenr = $ordrenr");
	$row = mysql_fetch_object($resultat);
	$totalsum = $row->total;
	mysql_query("update ordre set totalpris = $totalsum where ordrenr = $ordrenr");
	echo "<tr><td>Totalsum uten frakt:</td><td>$totalsum</td></tr>";
	echo "<tr><td>Totalsum med frakt:</td><td>".($totalsum+$frakt).".00</td></tr>";
echo "</table>"; 
echo "</div>";
	mail($_SESSION['epost'],"Kvittering fra cashkings","Du har bestilt varer for kr ".($totalsum+$frakt).".");
}
 
else
	echo "Du har ikke puttet noen varer her ennå. Handlekurven er tom";

?>
		<p>© CashKings © 2011</p>
</div>

<?php
include "bunn.htm";
?>
