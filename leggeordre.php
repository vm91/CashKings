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
Skal du legge til vare for en kunde så må du velge kategori oppe eller så må du guide kunden. Anbefales at du guider kunden.
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>