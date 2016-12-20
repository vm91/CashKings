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
include ("updatevare.php");
if($_REQUEST["oppdater"])
{
$vare = new vare();
$vare->set_varenavn($_REQUEST["varenavn"]);
$vare->set_varenr($_REQUEST["varenr"]);
$vare->set_pris($_REQUEST["pris"]);
$vare->set_antall($_REQUEST["antall"]);
$vare->set_kategorinr($_REQUEST["kategori"]);
$vare->set_hyllenr($_REQUEST["hylle"]);
$vare->set_betegnelse($_REQUEST["betegnelse"]);
$vare->set_bildeadresse($_REQUEST["bildeadresse"]);

echo "Her er detaljene tatt fra forige side: <br/>";
echo "Varenavn : " .$vare->get_varenavn()." <br/>";
echo "Varenr : " .$vare->get_varenr()." <br/>";
echo "Pris : " .$vare->get_pris()." <br/>";
echo "Antall : " .$vare->get_antall()." <br/>";
echo "Kategori nr : " .$vare->get_kategorinr()." <br/>";
echo "Hylle nr : " .$vare->get_hyllenr()." <br/>";
echo "Betegnelse : " .$vare->get_betegnelse()." <br/>";
echo "Bildeadresse : " .$vare->get_bildeadresse()." <br/>";
$vare->delt_db();
}
?>
<p>© CashKings © 2011</p>


</div>
	
<?php
include "bunn.htm";
?>