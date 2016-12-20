
<?php
include "toppadmin.html";
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

<div id="innhold">
<?php
echo "<h3>Velkommen, " .$_SESSION['epost']." </h3>
<p> Du er nå logget inn.</p>";
?>
<br>
<br> 
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>