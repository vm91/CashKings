<?php
include "topp.htm";
?>


<div id="menu1"> 
<ul class="glossymenu">
	<li><a href="index.php"><b>Forsiden</b></a></li>
	<li><a href="data.php"><b>Data og datautstyr</b></a></li>
	<li><a href="elektronikk.php"><b>Elektronikk</b></a></li>
	<li><a href="klokker.php"><b>Klokker og smykker</b></a></li>
	<li><a href="transport.php"><b>Transport</b></a></li>
</ul>
</div> 

<div id="innhold">
<?php
include ("kunde.php");
if($_REQUEST["bekreft"])
{
$kunde = new kunde();
$kunde->set_fornavn($_REQUEST["Fornavn"]);
$kunde->set_etternavn($_REQUEST["Etternavn"]);
$kunde->set_adresse($_REQUEST["Adresse"]);
$kunde->set_tlf($_REQUEST["Telefonnr"]);
$kunde->set_epost($_REQUEST["Epost"]);
$kunde->set_postnr($_REQUEST["Postnr"]);
$kunde->set_sted($_REQUEST["Poststed"]);
$kunde->set_passord($_REQUEST["Passord"]);


echo "Her detaljene om deg fra forige side: <br/>";
echo "Fornavn : " .$kunde->get_fornavn()." <br/>";
echo "Etternavn : " .$kunde->get_etternavn()." <br/>";
echo "Adresse : " .$kunde->get_adresse()." <br/>";
echo "Telefon nr : " .$kunde->get_tlf()." <br/>";
echo "Epost : " .$kunde->get_epost()." <br/>";
echo "Postnr : " .$kunde->get_postnr()." <br/>";
echo "Poststed : " .$kunde->get_sted()." <br/>";
echo "Passord : " .$kunde->get_passord()." <br/>";
$kunde->delt_db();
}
?>
<p>© CashKings © 2011</p>
