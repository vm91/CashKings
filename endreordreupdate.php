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
if(isset($_REQUEST['antall']))
{
	$antall = $_REQUEST['antall'];
	if($antall == 0)
	{
		mysql_query("delete from ordrelinje where ordrenr = ".$_GET['ordrenr']." and varenr=".$_GET['varenr']);
	}
	else
	{
		mysql_query("update ordrelinje set antall = $antall where ordrenr = ".$_GET['ordrenr']." and varenr=".$_GET['varenr']);
	}
}
//Skriver ut alt i tabellen 
$query = "select ordrelinje.*, ordre.kundenr, ordre.ordredato, vare.pris, vare.varenavn FROM vare, ordre, ordrelinje WHERE ordrelinje.varenr = vare.varenr and ordre.ordrenr = ordrelinje.ordrenr and ordre.ordrenr = ".$_GET['ordrenr']." and vare.varenr = ".$_GET['varenr']; 
$result  = mysql_query($query);
$i = mysql_fetch_array($result);

$kundenr = $i['kundenr'];
$ordrenr = $i['ordrenr'];
$ordredato = $i['ordredato'];
$pris = $i['pris'];
$varenavn = $i['varenavn'];
$varenr = $i['varenr'];
$antall = $i['antall'];

	echo "<form action='' method='get'>
		<h3>Endre eksisterende ordre med ordrenummer ".$ordrenr."</h3>";
	echo "<table>
				<tr><td>Kundenr</td><td>".$kundenr."</td></tr>
				<tr><td>Ordrenr</td><td>".$ordrenr."</td></tr>
				<tr><td>Ordredato</td><td>".$ordredato."</td></tr>
				<tr><td>Pris</td><td>$pris</td></tr>
				<tr><td>Varenavn</td><td>$varenavn</td></tr>
				<tr><td>Varenr</td><td>$varenr</td></tr>
				<tr><td>Antall</td><td><input type='text' name='antall' value='".$antall."' /></td></tr>
			 </table>
	<input type = 'hidden' name = 'ordrenr' value='".$ordrenr."'>
	<input type = 'hidden' name = 'varenr' value='".$varenr."'>
	<input type = 'submit' value='OK' name='changeorder' onclick='timedRefresh(2)'/>";
?>

<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>
