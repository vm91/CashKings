<?php

include "topp.htm";

class kunde {
	
	public $fornavn;
	public $etternavn;
	public $adresse;
	public $tlf;
	public $epost;
	public $postnr;	
	public $sted;	

	public function Valider($st, $val) {
		
		if($st == 'bokstaver') {
			return preg_match('/^[a-zA-Z]+$/s', $val);
		}
		
		if($st == 'tall') {
			return preg_match('/^\d+$/', $val);
		}
		
		if($st == 'email') {
			return preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $val);
		}
		
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
        include_once('connect-DB.php');
        $sql = "Insert into kunde (fornavn,etternavn,adresse,tlf,epost,postnr,poststed)";
        $sql.= "Values ('$fornavn','$etternavn','$adresse','$tlf','$epost','$postnr','$sted')";
        $resultat = mysql_query($sql) or die(mysql_query);
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

<h2>Ny kunde</h2>
<?php

$kunde = new kunde();

if(isset($_POST['bekreft'])) {
	
	$fornavn    = htmlspecialchars(mysql_real_escape_string($_POST['Fornavn']));
	$etternavn  = htmlspecialchars(mysql_real_escape_string($_POST['Etternavn']));
	$adresse    = htmlspecialchars(mysql_real_escape_string($_POST['Adresse']));
	$tlf        = htmlspecialchars(mysql_real_escape_string($_POST['Telefonnr']));
	$epost      = htmlspecialchars(mysql_real_escape_string($_POST['Epost']));
	$postnr     = htmlspecialchars(mysql_real_escape_string($_POST['Postnr']));
	$poststed   = htmlspecialchars(mysql_real_escape_string($_POST['Poststed']));

	if(
		!empty($fornavn) &&
		!empty($etternavn) &&
		!empty($adresse) &&
		!empty($tlf) &&
		!empty($epost) &&
		!empty($postnr) &&
		!empty($poststed)
		)
	{
	
	/** sjekker inputs **/
	if($kunde->Valider('bokstaver', $fornavn)) {
		if($kunde->Valider('bokstaver', $etternavn)) {
			if($kunde->Valider('bokstaver', $adresse)) {
				if($kunde->Valider('email', $epost)) {
					if($kunde->Valider('bokstaver', $poststed)) {
						if($kunde->Valider('tall', $tlf)) {
							if($kunde->Valider('tall', $postnr)) {
								
								/** setter variablene i classen **/
								$kunde->fornavn = $fornavn;
								$kunde->etternavn = $etternavn;
								$kunde->adresse = $adresse;
								$kunde->epost = $epost;
								$kunde->postnr = $postnr;
								$kunde->sted = $poststed;
								$kunde->tlf = $tlf;
								
								/** OK **/
								$kunde->delt_db();
								echo '<h1 style="color:green;">Velykket!</h1>';
								
							}
							else {
								echo 'Ugyldig postnummer! Det kan kun inneholde tall!';
							}
						}
						else {
							echo 'Ugyldig telefonnummer! Det kan kun inneholde tall!';
						}
					}
					else {
						echo 'Ugyldig poststed! Poststedet kan kun inneholde tegnene A-Z.';
					}
				}
				else {
					echo 'Ugyldig email!';
				}
			}
			else {
				echo 'Ugyldig adresse! Adressen kan kun inneholde tegnene A-Z.';
			}
		}
		else {
			echo 'Ugyldig etternavn! Navnet kan kun inneholde tegnene A-Z.';
		}
	}
	else {
		echo 'Ugyldig fornavn! Navnet kan kun inneholde tegnene A-Z.';
	}
	
	}
	else {
		echo 'Venligst fyll ut hele formen!';
	}
	
}

?>
<form method="post">
	<table>
		<tr>
			<td>Fornavn : </td><td><input type="text" name="Fornavn" <?php if(isset($_POST['Fornavn'])) { echo 'value="' . $_POST['Fornavn'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Etternavn : </td><td><input type="text" name="Etternavn" <?php if(isset($_POST['Etternavn'])) { echo 'value="' . $_POST['Etternavn'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Adresse : </td><td> <input type="text" name="Adresse" <?php if(isset($_POST['Adresse'])) { echo 'value="' . $_POST['Adresse'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Telefon nr : </td><td><input type="text" name="Telefonnr" <?php if(isset($_POST['Telefonnr'])) { echo 'value="' . $_POST['Telefonnr'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Epost : </td><td><input type="text" name="Epost" <?php if(isset($_POST['Epost'])) { echo 'value="' . $_POST['Epost'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Postnr : </td><td><input type="text" name="Postnr" <?php if(isset($_POST['Postnr'])) { echo 'value="' . $_POST['Postnr'] . '"'; } ?> /></td>
		</tr>
		<tr>
			<td>Poststed : </td><td><input type="text" name="Poststed" <?php if(isset($_POST['Poststed'])) { echo 'value="' . $_POST['Poststed'] . '"'; } ?> /></td>
		</tr>
	</table>
		<br/>
		<input type="submit" name="bekreft" value="bekreft" />
</form>
	
<p>© CashKings © 2011</p>

<?php
echo "<br/>";
setlocale(LC_TIME,"no_NO");
date_default_timezone_set("Europe/Oslo");
echo strftime("I dag er det %A %d %B %Y || %H : %M : %S"); 
?>
</div>
<div id="menu2"> 
<ul class="glossymenu1">
	<li><a href="betalingslosninger.php"><b>Betalingsløsninger</b></a></li>
	<li><a href="gavekort.php"><b>Gavekort</b></a></li>
	<li><a href="kontakt.php"><b>Kontakt oss</b></a></li>
	<li><a href="spmsvar.php"><b>Spørsmål og svar</b></a></li>
	<li><a href="admin.php"><b>Admin</b></a></li>

	


	
<?php
include "bunn.htm";
?>