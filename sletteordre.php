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
	<li><a href="transport.php"><b>Kj�ret�y</b></a></li>
</ul>
</div> 

<div id="h�yretopp1">
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
$query = "SELECT * FROM ordre"; 
$result = mysql_query($query); 
$sql_delete = "";
$number = -1;	//Fange opp hvilken knapp som er trykket
	echo "<table border='1'>";
		echo "<tr><td>Kundenr</td><td>Ordrenr</td><td>Ordredato</td><td>Pris</td><td>SLETT</td></tr>";
		while( $i = mysql_fetch_array($result) )
		{
			$kundenr = $i['kundenr'];
			$ordrenr = $i['ordrenr'];
			$ordredato = $i['ordredato'];
		 	$pris = $i['pris'];
			echo "<form action='' method='post'>";
			 	echo "<tr><td>".$kundenr."</td><td>".$ordrenr."</td><td>".$ordredato."</td><td>".$pris."</td>";
				echo "<td><input type = 'submit' value='SLETT' name='".$ordrenr."' onclick='timedRefresh(2)' />
					</td></tr>";

				if (isset($_POST[$ordrenr]) )
 				{
 					$number = $ordrenr;
 					
 				}

				$sql_delete = "DELETE FROM ordre WHERE ordrenr = '".$number."'";
				mysql_query($sql_delete);
			echo "</form>";
		}

	echo "</table>";
?>
<p>� CashKings � 2011</p>


</div>

<?php
include "bunn.htm";
?>