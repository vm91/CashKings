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
include ("vare.php");
if($_REQUEST["bekreft"])

$vare = new vare();
$vare->set_varenavn($_REQUEST["Varenavn"]);
$vare->set_varenr($_REQUEST["Varenr"]);
$vare->set_pris($_REQUEST["Pris"]);
$vare->set_antall($_REQUEST["Antall"]);
$vare->set_kategorinr($_REQUEST["Kategori"]);
$vare->set_hyllenr($_REQUEST["Hylle"]);
$vare->set_betegnelse($_REQUEST["Betegnelse"]);
$vare->set_bildeadresse($_REQUEST["Bildeadresse"]);

echo "Her detaljene om deg fra forige side: <br/>";
echo "Varenavn : " .$vare->get_varenavn()." <br/>";
echo "Varenr : " .$vare->get_varenr()." <br/>";
echo "Pris : " .$vare->get_pris()." <br/>";
echo "Antall : " .$vare->get_antall()." <br/>";
echo "Kategori nr : " .$vare->get_kategorinr()." <br/>";
echo "Hylle nr : " .$vare->get_hyllenr()." <br/>";
echo "Betegnelse : " .$vare->get_betegnelse()." <br/>";
echo "Bildeadresse : " .$vare->get_bildeadresse()." <br/>";
$vare->delt_db();

?>
<p>© CashKings © 2011</p>


</div>
	
<?php
include "bunn.htm";
?>