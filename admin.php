<?php
include "authorization.php";
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
if (isset($_SESSION['admin'])) {  
echo "<h3>Velkommen, " .$_SESSION['admin']." </h3>
<p> Du er n� logget inn som administrator.</p>";
}
else{  
echo "<h3>Du er ikke verifisert administrator</h3>
<p> Fors�k p� hacking vil bli politianmeldt.</p>";
}  
?>

<?php
$holdbarhet = time() + 60*60*24*30; // 30 dager
if (isset ($_COOKIE['besok'])) {
setcookie ('besok', $_COOKIE['besok']+1, $holdbarhet);
$_COOKIE['besok']++;
}
?>
<?php
echo 'Du har v�rt her '.$_COOKIE['besok'].' ganger.';
?>
<br>
<br> 
<p>� CashKings � 2011</p>


</div>

<?php
include "bunn.htm";
?>