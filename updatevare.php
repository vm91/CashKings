<?php 
class vare
{
	private $varenavn;
	private $varenr;
	private $pris;
	private $antall;
	private $kategorinr;
	private $hyllenr;	
	private $betegnelse;
	private $bildeadresse;	
	
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
        return preg_match("/[0-9]{1,5}/",$varenr);
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
        return preg_match("/[0-9]{2,10}/",$pris);
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
	public function set_kategorinr($kategorinr)
	{
		$this->kategorinr= $kategorinr;
	}
	public function get_kategorinr()
	{
		return $this-> kategorinr;
	}
	public function valider_kategorinr($kategorinr)
    {
        return preg_match("/[0-9]{1}/",$kategorinr);
    }
	public function set_hyllenr($hyllenr)
	{
		$this->hyllenr= $hyllenr;
	}
	public function get_hyllenr()
	{
		return $this-> hyllenr;
	}
	public function valider_hyllenr($hyllenr)
    {
        return preg_match("/[0-9]{1,4}/",$hyllenr);
    }	
	public function set_betegnelse($betegnelse)
	{
		$this->betegnelse= $betegnelse;
	}
	public function get_betegnelse()
	{
		return $this-> betegnelse;
	}
		public function valider_betegnelse($betegnelse)
    {
        return preg_match("/[a-zA-Z0-9\.]{2,1000}/",$betegnelse);
    }
	public function set_bildeadresse($bildeadresse)
	{
		$this->bildeadresse= $bildeadresse;
	}
	public function get_bildeadresse()
	{
		return $this-> bildeadresse;
	}
	public function valider_bildeadresse($bildeadresse)
    {
        return preg_match("/[a-zA-Z0-9\.]{2,200}/",$bildeadresse);
    }
 	public function delt_db()
    {
        $varenavn=$this->varenavn;
        $varenr=$this->varenr;
		$pris=$this->pris;
        $antall=$this->antall;
        $kategorinr=$this->kategorinr;
        $hyllenr=$this->hyllenr;
		$betegnelse=$this->betegnelse;
		$bildeadresse=$this->bildeadresse;
	    include 'connect-DB.php';
        $sql = "update vare Set varenavn = '$varenavn',varenr='$varenr',pris='$pris',antall='$antall',kategorinr='$kategorinr',hyllenr='$hyllenr',betegnelse='$betegnelse',bildeadresse='$bildeadresse' WHERE varenr = '$varenr'";
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

?>