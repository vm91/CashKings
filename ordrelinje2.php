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
class ordrelinje
{
	private $varenavn;
	private $varenr;
	private $pris;
	private $antall;

	
	public function set_varenavn($varenavn)
	{
		$this->varenavn= $varenavn;
	}
	public function get_varenavn()
	{
		return $this-> varenavn;
	}
	public function valider_varenavn($varenavn)
    {
        return preg_match("/[a-åA-Å. ]{2,30}/",$varenavn);
    }
	public function set_varenr($varenr)
	{
		$this->varenr= $varenr;
	}
	public function get_varenr()
	{
		return $this-> varenr;
	}
	public function valider_varenr($varenr)
    {
        return preg_match("/[0-9]{5}/",$varenr);
    }
	public function set_pris($pris)
	{
		$this->pris= $pris;
	}
	public function get_pris()
	{
		return $this-> pris;
	}
	public function valider_pris($pris)
	{
        return preg_match("/[0-9]{10,2}/",$pris);
    }
	public function set_antall($antall)
	{
		$this->antall= $antall;
	}
	public function get_antall()
	{
		return $this-> antall;
	}	
	public function valider_antall($antall)
    {
        return preg_match("/[0-9]{1,7}/",$antall);
    }
 	public function delt_db()
    {
        $varenavn=$this->varenavn;
        $varenr=$this->varenr;
		$pris=$this->pris;
        $antall=$this->antall;
	    include 'connect-DB.php';
        $sql = "Insert into ordrelinje (varenavn,varenr,pris,antall)";
        $sql.= "Values ('$varenavn','$varenr','$pris','$antall')";
        $resultat = mysql_query($sql);
        if(!$resultat)
        {
            trigger_error(mysql_error());
            return "Feil , kunne ikke sette inn i databasen";
        }
        elseif(mysql_affected_rows ()==0)
        {
            trigger_error("Insert return 0 rows");
            return "Feil, kunne ikke sette inn i databasen";
        }
    }

}
if($_REQUEST["kjop"])

$ordrelinje = new ordrelinje();
$ordrelinje->set_varenavn($_REQUEST["Varenavn"]);
$ordrelinje->set_varenr($_REQUEST["Varenr"]);
$ordrelinje->set_pris($_REQUEST["Pris"]);
$ordrelinje->set_antall($_REQUEST["Antall"]);


echo "Varen har blitt lagt i handlekurven <br/>";
echo "Varenavn : " .$ordrelinje->get_varenavn()." <br/>";
echo "Varenr : " .$ordrelinje->get_varenr()." <br/>";
echo "Pris : " .$ordrelinje->get_pris()." <br/>";
echo "Antall : " .$ordrelinje->get_antall()." <br/>";

$ordrelinje->delt_db();

?>
<p>© CashKings © 2011</p>


</div>
	
<?php
include "bunn.htm";
?>