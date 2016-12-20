<?php
include "authorization.php";
?>
<?php
session_start();
?>

<script type= "text/javascript">
	function valider_Varenavn()
	{
		regEx = /^[a-zA-ZøæåØÆÅ ]{2,30}$/;
		OK = regEx.test(document.skjema.Varenavn.value);
		if(!OK)
		{
			document.getElementById("feilVarenavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
			return true;
		}
		document.getElementById("feilVarenavn").innerHTML="Godkjent";
		return false;
	}
	function valider_Varenr()
	{
		regEx = /^[0-9]{1,5}$/;
		OK = regEx.test(document.skjema.Varenr.value);
		if(!OK)
		{
			document.getElementById("feilVarenr").innerHTML="Feil, feltet må maks inneholde fem sifferet tall";
			return false;
		}
		document.getElementById("feilVarenr").innerHTML="Godkjent";
		return true;
	}
		function valider_Pris()
	{
		regEx = /^[0-9\,]{2,10}$/;
		OK = regEx.test(document.skjema.Pris.value);
		if(!OK)
		{
			document.getElementById("feilPris").innerHTML="Feil, feltet må inneholde minst tre sifferet tall";
			return false;
		}
		document.getElementById("feilPris").innerHTML="Godkjent";
		return true;
	}
	function valider_Antall()
	{
		regEx = /^[0-9]{1,7}$/;
		OK = regEx.test(document.skjema.Antall.value);
		if(!OK)
		{
			document.getElementById("feilAntall").innerHTML="Feil, feltet må inneholde bare fire sifferet tall";
			return false;
		}
		document.getElementById("feilAntall").innerHTML="Godkjent";
		return true;
	}
	function valider_Kategori()
	{
		regEx = /^[0-9]{1}$/;
		OK = regEx.test(document.skjema.Kategori.value);
		if(!OK)
		{
			document.getElementById("feilKategori").innerHTML="Feil, feltet må inneholde bare et tall";
			return false;
		}
		document.getElementById("feilKategori").innerHTML="Godkjent";
		return true;
	}
	function valider_Hylle()
	{
		regEx = /^[0-9]{1,4}$/;
		OK = regEx.test(document.skjema.Hylle.value);
		if(!OK)
		{
			document.getElementById("feilHylle").innerHTML="Feil, feltet må inneholde være maks fire sifferet tall";
			return false;
		}
		document.getElementById("feilHylle").innerHTML="Godkjent";
		return true;
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

<div id="høyretopp1">
<a href="leggevarer.php"><b>Legge til varer</b></a><br>
<a href="endrevarer.php"><b>Endre varer</b></a><br>
<a href="slettevarer.php"><b>Slette varer</b></a><br><br>
<a href="visordre.php"><b>Vis ordre</b></a><br>
<a href="leggeordre.php"><b>Legge ordre</b></a><br>
<a href="endreordre.php"><b>Endre ordre</b></a><br>
<a href="sletteordre.php"><b>Slette ordre</b></a><br>
</div> 

<div id="innhold">
<h2>Ny vare</h2>
<form action="vare2.php" name="skjema" method="post" onsubmit="return valider_alle()">
	<table>
		<tr>
			<td>Varenavn: </td><td><input type="text" name="Varenavn" onChange ="valider_Varenavn()"/></td>
			<td><div id= "feilVarenavn">*</div></td>
		</tr>
		<tr>
			<td>Varenr: </td><td><input type="text" name="Varenr" onChange ="valider_Varenr()"/></td>
			<td><div id= "feilVarenr">*</div></td>
		</tr>
		<tr>
			<td>Pris : </td><td> <input type="text" name="Pris" onChange ="valider_Pris()"/></td>
			<td><div id= "feilPris">*</div></td>
		</tr>
		<tr>
			<td>Lagerstatus : </td><td><input type="text" name="Antall" onChange ="valider_Antall()"/></td>
			<td><div id= "feilAntall">*</div></td>
		</tr>
		<tr>
			<td>Kategori nr : </td><td><input type="text" name="Kategori" onChange ="valider_Kategori()"/></td>
			<td><div id= "feilKategori">*</div></td>
		</tr>
		<tr>
			<td>Hylle nr : </td><td><input type="text" name="Hylle" onChange ="valider_Hylle()"/></td>
			<td><div id= "feilHylle">*</div></td>
		</tr>
		<tr>
			<td>Alternativ tekst : </td><td><textarea rows="7" cols="25" name="Betegnelse" ></textarea></td>
	
		</tr>
		<tr>
			<td>Bildeadresse : </td><td><input type="text" name="Bildeadresse" /></td>
			
		</tr>
	</table>
		<br/> 
		<input type="submit" name="bekreft" value="bekreft" />
</form>

<br>
<br> 
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>