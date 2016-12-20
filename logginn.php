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
Ny kunde: <a href="nykunde.php">klikk her</a>
<br>

<form name="form1" method="post" action="checklogin.php">
	<table>
    	<tr>
        	<td>Epost:</td>
            <td><input type="text" name="epost" /></td>
        </tr>
        <tr>
        	<td>Passord:</td>
            <td><input type="password" name="passord" /></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="knapp" value="Logg Inn" /></td>
        </tr>
    </table>
</form>
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>