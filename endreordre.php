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
$query = "SELECT ordrelinje.*, ordre.kundenr, ordre.ordredato FROM ordre, ordrelinje WHERE ordre.ordrenr = ordrelinje.ordrenr ";
$result = mysql_query($query); 
echo "<table border='1'>
		<tr><td>Kundenr</td><td>Ordrenr</td><td>Ordredato</td><td>Pris</td><td>Varenavn</td><td>Varenr</td><td>Antall</td><td>ENDRE</td></tr>";
			while( $i = mysql_fetch_array($result) )
			{
			 	$kundenr = $i['kundenr'];
			 	$ordrenr = $i['ordrenr'];
			 	$ordredato = $i['ordredato'];
		 		$pris = $i['pris'];
			 	$varenavn = $i['varenavn'];
				$varenr = $i['varenr'];
				$antall = $i['antall'];
				$number = $ordrenr;
				echo "<form action='endreordreupdate.php' method='get'>
				 		<tr><td>".$kundenr."</td><td>".$ordrenr."</td><td>".$ordredato."</td><td>".$pris."</td><td>".$varenavn."</td><td>".$varenr."</td><td>".$antall."</td>
						<td><input type = 'hidden' name = 'ordrenr' value='".$ordrenr."'><input type = 'hidden' name = 'varenr' value='".$varenr."'><input type = 'submit' value='ENDRE' name='".$ordrenr."' /></td></tr>
					</form>";
			}
		echo "</table>";
?>

<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>
