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

foreach ($_SESSION as $nokkel => $verdi){ 
    //unset($_SESSION[$nokkel]); //sletter informasjon fra session 
    session_unregister($nokkel); 
} 
echo "Alt av innholdet er fjernet fra handlekurven. "; 

?> 
</div>

<?php
include "bunn.htm";
?>