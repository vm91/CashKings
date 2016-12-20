<?php
session_start();
?>
<?php
include "topp.htm";
?>
<?php
include "index.htm";
?>




<div id="høyretopp">
<div id="headlineright">

</div>
<div id="topp1">
<?php

$host="localhost";
$brukernavn="root";
$passord=""; 
$db_navn="cashkings";
$tbl_navn="vare";


mysql_connect("$host", "$brukernavn", "$passord")or die("Kunne ikke koble til"); 
mysql_select_db("$db_navn")or die("Kunne ikke velge database");

$query = "SELECT bildeadresse FROM vare WHERE kategorinr = 1 ORDER BY pris DESC Limit 1"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 

print "<table border=1>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
         
          
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='120' Height='60' /> " ;
			 echo "<td><a href=data.php>$bildeStreng</a></td>";
			 echo "</tr>"; 	



			 }
	print "</table></CENTER>"; 
	
?>

</div>

<div id="topp2">
<?php



$query = "SELECT bildeadresse FROM vare WHERE kategorinr = 2 ORDER BY pris DESC Limit 1"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 

print "<table border=1>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
         
          
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='120' Height='60' /> " ;
			 echo "<td><a href=elektronikk.php>$bildeStreng</a></td>";
			 echo "</tr>"; 	



			 }
	print "</table></CENTER>"; 
	
?>
</div>

<div id="topp3">
<?php
$query = "SELECT bildeadresse FROM vare WHERE kategorinr = 3 ORDER BY pris DESC Limit 1"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 

print "<table border=1>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
         
          
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='120' Height='60' /> " ;
			 echo "<td><a href=klokker.php>$bildeStreng</a></td>";
			 echo "</tr>"; 	



			 }
	print "</table></CENTER>"; 
	
?>
</div>

<div id="topp4">
<?php
$query = "SELECT bildeadresse FROM vare WHERE kategorinr = 4 ORDER BY pris DESC Limit 1"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 

print "<table border=1>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
         
          
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='120' Height='60' /> " ;
			 echo "<td><a href=transport.php>$bildeStreng</a></td>";
			 echo "</tr>"; 	



			 }
	print "</table></CENTER>"; 
	
?>
</div>

<div id="topp5">
<?php
$query = "SELECT bildeadresse FROM vare WHERE kategorinr = 5 ORDER BY pris DESC Limit 1"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 

print "<table border=1>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
         
          
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='120' Height='60' /> " ;
			 echo "<td>$bildeStreng</td>";
			 echo "</tr>"; 	



			 }
	print "</table></CENTER>"; 
	
?>
</div>

</div>
<div id="innhold">
<?php
if (isset($_SESSION['epost'])) {  
echo "<h3>Velkommen, " .$_SESSION['epost']." </h3>
<p> Du er nå logget inn.</p>";
}
elseif (isset($_SESSION['admin'])) {
echo "<h3>Logget inn som Admin: " .$_SESSION['admin']."";
}
else{  
echo "<h3>Velkommen, Gjest</h3>
<p> Logg inn eller utforsk siden.</p>";
}  
?>
<div id="reklame">

</div>


<p>

Sist oppdatert 13. Mai 13.50</p>
<p>© CashKings © 2011</p>


</div>

<?php
include "bunn.htm";
?>