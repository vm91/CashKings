<?php
include "topp.htm";
?>
<script type= "text/javascript">
	function valider_Fornavn()
	{
		regEx = /^[a-zA-ZøæåØÆÅ ]{2,30}$/;
		OK = regEx.test(document.skjema.Fornavn.value);
		if(!OK)
		{
			document.getElementById("feilFornavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
			return false;
		}
		document.getElementById("feilFornavn").innerHTML="Godkjent";
		return true;
	}
	function valider_Etternavn()
	{
		regEx = /^[a-zA-ZøæåØÆÅ ]{2,30}$/;
		OK = regEx.test(document.skjema.Etternavn.value);
		if(!OK)
		{
			document.getElementById("feilEtternavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
			return false;
		}
		document.getElementById("feilEtternavn").innerHTML="Godkjent";
		return true;
	}
	function valider_Adresse()
	{
		regEx = /^[a-zA-ZøæåØÆÅ0-9'.\s]{2,50}$/;
		OK = regEx.test(document.skjema.Adresse.value);
		if(!OK)
		{
			document.getElementById("feilAdresse").innerHTML="Må inneholde en gyldig adresse";
			return false;
		}
		document.getElementById("feilAdresse").innerHTML="Godkjent";
		return true;
	}
	function valider_Telefonnr()
	{
		regEx = /^[0-9]{8}$/;
		OK = regEx.test(document.skjema.Telefonnr.value);
		if(!OK)
		{
			document.getElementById("feilTelefonnr").innerHTML="Feil, feltet må inneholde bare åtte sifferet tall";
			return false;
		}
		document.getElementById("feilTelefonnr").innerHTML="Godkjent";
		return true;
	}
	function valider_Epost()
	{
		regEx = /^[a-zA-Z0-9\.\_]+@[a-zA-Z0-9\.\_]+\.[a-z]{2,50}$/;
		OK = regEx.test(document.skjema.Epost.value);
		if(!OK)
		{
			document.getElementById("feilEpost").innerHTML="Feil i epost";
			return false;
		}
		document.getElementById("feilEpost").innerHTML="Godkjent";
		return true;
	}
	function valider_Postnr()
	{
		regEx = /^[0-9]{4}$/;
		OK = regEx.test(document.skjema.Postnr.value);
		if(!OK)
		{
			document.getElementById("feilPostnr").innerHTML="Feil, feltet må være fire sifferet";
			return false;
		}
		document.getElementById("feilPostnr").innerHTML="Godkjent";
		return true;
	}
        function valider_Poststed()
	{
		regEx = /^[a-zA-ZøæåØÆÅ ]{2,30}$/;
		OK = regEx.test(document.skjema.Poststed.value);
		if(!OK)
		{
			document.getElementById("feilPoststed").innerHTML="Feil poststed";
			return false;
		}
		document.getElementById("feilPoststed").innerHTML="Godkjent";
		return true;
	}
	function valider_Passord()
	{
		regEx = /^[a-zA-Z0-9\.]{1,50}$/i;
		OK = regEx.test(document.skjema.Passord.value);
		if(!OK)
		{
			document.getElementById("feilPassord").innerHTML="Feil i Passord";
			return false;
		}
		document.getElementById("feilPassord").innerHTML="Godkjent";
		return true;
	}
	function valider_alle()
	{		
		FornavnOK = valider_Fornavn();
		EtternavnOK = valider_Etternavn();
		AdresseOK = valider_Adresse();
		TelefonnrOK = valider_Telefonnr();
		EpostOK = valider_Epost();
		PostnrOK = valider_Postnr();
		PoststedOK = valider_Poststed();
		PassordOK = valider_Passord();
		if(FornavnOK && EtternavnOK && AdresseOK && TelefonnrOK && EpostOK && PostnrOK && PoststedOK && PassordOK)
		{
			return true;
		}
		return false;
	}
</script>

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

<h2>Ny kunde</h2>

<form action="kunde2.php" name="skjema" method="post"> <!--onsubmit="return valider_alle()">-->
	<table>
		<tr>
			<td>Fornavn : </td><td><input type="text" name="Fornavn" onChange ="valider_Fornavn()"/></td>
			<td><div id= "feilFornavn">*</div></td>
		</tr>
		<tr>
			<td>Etternavn : </td><td><input type="text" name="Etternavn" onChange ="valider_Etternavn()"/></td>
			<td><div id= "feilEtternavn">*</div></td>
		</tr>
		<tr>
			<td>Adresse : </td><td> <input type="text" name="Adresse" onChange ="valider_Adresse()"/></td>
			<td><div id= "feilAdresse">*</div></td>
		</tr>
		<tr>
			<td>Telefon nr : </td><td><input type="text" name="Telefonnr" onChange ="valider_Telefonnr()"/></td>
			<td><div id= "feilTelefonnr">*</div></td>
		</tr>
		<tr>
			<td>Epost : </td><td><input type="text" name="Epost" onChange ="valider_Epost()"/></td>
			<td><div id= "feilEpost">*</div></td>
		</tr>
		<tr>
			<td>Postnr : </td><td><input type="text" name="Postnr" onChange ="valider_Postnr()"/></td>
			<td><div id= "feilPostnr">*</div></td>
		</tr>
		<tr>
			<td>Poststed : </td><td><input type="text" name="Poststed" onChange ="valider_Poststed()"/></td>
			<td><div id= "feilPoststed">*</div></td>
		</tr>
		<tr>
			<td>Passord : </td><td><input type="text" name="Passord" onChange ="valider_Passord()"/></td>
			<td><div id= "feilPassord">*</div></td>
		</tr>
	</table>
		<br/>
		<input type="submit" name="bekreft" value="bekreft" />
</form>		
<p>© CashKings © 2011</p>


</div>

	
<?php
include "bunn.htm";
?>