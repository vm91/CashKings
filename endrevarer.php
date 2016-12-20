<?php
include "authorization.php";

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
<?php
include 'connect-DB.php';
//Skriver ut alt i tabellen 
$query = "SELECT * from vare";
$result = mysql_query($query); 

?>
<h2>Endre/slette varer</h2>
	<table>
	<thead>
		<tr>
			<th>Varenavn</th>
			<th>Varenr</th>
			<th>Pris</th>
			<th>Lagerstatus</th>
			<th>Kategori nr.</th>
			<th>Hylle nr</th>
			<th>Endre</th>
			<th>Slett</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if($_REQUEST['slett']=="ja")
		{
			mysql_query("delete from vare where varenr = ".$_REQUEST['varenr']);
		}
		while( $rad = mysql_fetch_object( $result ) )
		{					
		?>
		<tr>
			<td><?php echo $rad->varenavn; ?></td>
			<td><?php echo $rad->varenr; ?></td>
			<td><?php echo $rad->pris; ?></td>
			<td><?php echo $rad->antall; ?></td>
			<td><?php echo $rad->kategorinr; ?></td>
			<td><?php echo $rad->hyllenr; ?></td>
			<td><?php echo '<a href="endrevare.php?varenr='.$rad->varenr.'">'; ?>Endre</a></td>
			<td><?php echo '<a href="endrevarer.php?slett=ja&varenr='.$rad->varenr.'">'; ?>Slett</a></td>
		</tr>
		<?php 
		} 
		?>
		</tbody>
	</table>

<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>