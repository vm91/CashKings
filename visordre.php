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
$number = mysql_num_rows($result); 
$i = 0; 
if ($number == 0) 
print "<CENTER><P>Fant ingen poster</CENTER>"; 
elseif ($number > 0)
{
       print "<table border=1>"; 
	   echo "<tr><td>Kundenr</td><td>Ordrenr</td><td>Ordredato</td><td>Pris</td><td>Varenavn</td><td>Varenr</td><td>Antall</td></tr>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
             
             echo "<tr><td>".$rad['kundenr']."</td><td>".$rad['ordrenr']."</td> <td>".$rad['ordredato']."</td><td>".$rad['pris']."</td> <td>".$rad['varenavn']."</td> <td>".$rad['varenr']."</td> <td>".$rad['antall']."</td></tr>";
			 }
} 
       print "</table></CENTER>"; 
?> 
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>