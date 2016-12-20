<?php
include "authorization.php";
?>
<?php
session_start();
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

<div id="høyretopp1">
<a href="leggevarer.php"><b>Legge til varer</b></a><br>
<a href="endrevarer.php"><b>Endre varer</b></a><br>
<a href="slettevarer.php"><b>Slette varer</b></a><br><br>
<a href="visordre.php"><b>Vis ordre</b></a><br>
<a href="leggeordre.php"><b>Legge ordre</b></a><br>
<a href="endreordre.php"><b>Endre ordre</b></a><br>
<a href="sletteordre.php"><b>Slette ordre</b></a><br>
</div> 

<div id="innhold">
<?php	
include 'connect-DB.php';
//Skriver ut alt i tabellen 
$sql = "SELECT * FROM vare";
$result  = mysql_query($sql);
$sql_delete = "";
$knapp1 = -1;	//variabelen er kun for å fange opp hvilken knapp som er trykket
	echo "<table border='1'>";
		echo "<tr><td>Varenavn</td><td>Varenr</td><td>Pris</td><td>Lagerstatus</td><td>Kategori</td><td>Hylle</td><td>Beskrivelse</td><td>Bilde</td><td>SLETT</td></tr>";
		while( $i = mysql_fetch_array($result) )
		{
		 	$varenavn = $i['varenavn'];
		 	$varenr = $i['varenr'];
		 	$pris = $i['pris'];
		 	$antall = $i['antall'];
	 		$kategori = $i['kategorinr'];
		 	$hylle = $i['hyllenr'];
		 	$betegnelse = $i['betegnelse'];
			$bilde = $i['bildeadresse'];
			echo "<form action='' method='post'>";
			 	echo "<tr><td>".$varenavn."</td><td>".$varenr."</td><td>".$pris."</td><td>".$antall."</td><td>".$kategori."</td><td>".$hylle."</td><td>".$betegnelse."</td>";
				$bildestreng = "<img src='".$rad['bildeadresse']."' width='100' Height='80' /> " ;
				echo "<td>$bildestreng</td>";
				echo "<td><input type = 'submit' value='SLETT' name='".$varenr."'  onclick='timedRefresh(2)' />
					</td></tr>";

				if (isset($_POST[$varenr]) )
				{
					$knapp1 = $varenr;
				}
				$sql_delete = "DELETE FROM vare WHERE varenr = '".$knapp1."'";
				mysql_query($sql_delete);
				echo "</form>";
		}

	echo "</table>";

?>
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>