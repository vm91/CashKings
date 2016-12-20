<?php 
class kunde
{
	private $fornavn;
	private $etternavn;
	private $adresse;
	private $tlf;
	private $epost;
	private $postnr;	
	private $sted;	
	private $passord;	
	
	public function set_fornavn($fornavn)
	{
		$this->fornavn= $fornavn;
	}
	public function get_fornavn()
	{
		return $this-> fornavn;
	}
	function valider_fornavn($fornavn)
	{
		return preg_match("/^[a-åA-Å][a-åA-Å.]{2,30}$/", $_REQUEST["Fornavn"]);
	}
	public function set_etternavn($etternavn)
	{
		$this->etternavn= $etternavn;
	}
	public function get_etternavn()
	{
		return $this-> etternavn;
	}
	function valider_etternavn($etternavn)
	{
		return preg_match("/^[a-åA-Å][a-åA-Å.]{0,30}$/", $_REQUEST["Etternavn"]);
	}
	public function set_adresse($adresse)
	{
		$this->adresse= $adresse;
	}
	public function get_adresse()
	{
		return $this-> adresse;
	}
	function valider_adresse($adresse)
	{
		return preg_match("/^[a-åA-Å][a-åA-Å.][0-9]{2,50}$/", $_REQUEST["Adresse"]);
	}
	public function set_tlf($tlf)
	{
		$this->tlf= $tlf;
	}
	public function get_tlf()
	{
		return $this-> tlf;
	}	
	function valider_tlf($tlf)
	{
		return preg_match("/^[0-9]{8}$/", $_REQUEST["Telefonnr"]);
	}
	public function set_epost($epost)
	{
		$this->epost= $epost;
	}
	public function get_epost()
	{
		return $this-> epost;
	}
	function valider_epost($epost)
	{
		return preg_match("/^[a-åA-Å0-9]+@[a-åA-Å.]{2,50}$/", $_REQUEST["Epost"]);
	}
	public function set_postnr($postnr)
	{
		$this->postnr= $postnr;
	}
	public function get_postnr()
	{
		return $this-> postnr;
	}	
	function valider_postnr($postnr)
	{
		return preg_match("/^[0-9]{4}$/", $_REQUEST["Postnr"]);
	}	
	public function set_sted($sted)
	{
		$this->sted= $sted;
	}
	public function get_sted()
	{
		return $this-> sted;
	}		
	function valider_sted($sted)
	{
		return preg_match("/^[a-åA-Å][a-åA-Å.]{2,30}$/", $_REQUEST["Poststed"]);
	}
		public function set_passord($passord)
	{
		$this->passord= $passord;
	}
	public function get_passord()
	{
		return $this-> passord;
	}	
	function valider_passord($passord)
	{
		return preg_match("/^[a-åA-Å][a-åA-Å.][0-9]{1,50}$/", $_REQUEST["Passord"]);
	}
 	public function delt_db()
    {
        $fornavn=$this->fornavn;
        $etternavn=$this->etternavn;
		$adresse=$this->adresse;
        $tlf=$this->tlf;
        $epost=$this->epost;
        $postnr=$this->postnr;
		$sted=$this->sted;
		$passord=$this->passord;
        include 'connect-DB.php';
        $sql = "Insert into kunde (fornavn,etternavn,adresse,tlf,epost,postnr,sted,passord)";
        $sql.= "Values ('$fornavn','$etternavn','$adresse','$tlf','$epost','$postnr','$sted', Password('$passord'))";
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
if(isset ($_REQUEST["valider"]))
{	
	$person = new kunde();
	if($person-> valider_fornavn($_REQUEST["Fornavn"]))
	{
	$person->set_fornavn($_REQUEST["Fornavn"]);
	}
	else
	{
	echo "Feil fornavn";
	}
	if($person-> valider_etternavn($_REQUEST["Etternavn"]))
	{
	$person->set_etternavn($_REQUEST["Etternavn"]);
	}
	else
	{
	echo "Feil fornavn";
	}
	if($person-> valider_adresse($_REQUEST["Adresse"]))
	{
	$person->set_adresse($_REQUEST["Adresse"]);
	}
	else
	{
	echo "Feil Adresse";
	}
	if($person-> valider_tlf($_REQUEST["Telefonnr"]))
	{
	$person->set_tlf($_REQUEST["Telefonnr"]);
	}
	else
	{
	echo "Feil telefonnr";
	}
	if($person-> valider_epost($_REQUEST["Epost"]))
	{
	$person->set_epost($_REQUEST["Epost"]);
	}
	else
	{
	echo "Feil epost";
	}
	if($person-> valider_postnr($_REQUEST["Postnr"]))
	{
	$person->set_postnr($_REQUEST["Postnr"]);
	}
	else
	{
	echo "Feil postnr";
	}
	if($person-> valider_sted($_REQUEST["Poststed"]))
	{
	$person->set_sted($_REQUEST["Poststed"]);
	}
	else
	{
	echo "Feil passord";
	}
	if($person-> valider_passord($_REQUEST["Passord"]))
	{
	$person->set_passord($_REQUEST["Passord"]);
	}
	else
	{
	echo "Feil Passord";
	}
}
?>