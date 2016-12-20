<?php
session_start();
?>
<?php
include "topp.htm";
?>
<?php
include "elektronikk.htm";
?>

<div id="innhold">


<?php
include 'connect-DB.php';
//Skriver ut alt i tabellen 
$query = "SELECT* FROM vare WHERE kategorinr=2"; 
$result = mysql_query($query); 
$number = mysql_num_rows($result); 
$i = 0; 
if ($number == 0) 
   print "<CENTER><P>Fant ingen poster</CENTER>"; 
elseif ($number > 0)
{
       print "<table border=1>"; 
	   echo "<tr><th>Varenavn: </th><th>Vare nr: </th><th>Pris: </th><th>Lagerstatus: </th><th>Beskrivelse: </th><th>Bilde: </th><th>Antall: </th></tr>"; 
       while ($rad = mysql_fetch_assoc($result)){ 
           
		   echo "<form action='' method='post'>";
             echo "<tr><td>".$rad['varenavn']."</td> <td>".$rad['varenr']."</td> <td>".$rad['pris']."</td> <td>".$rad['antall']."</td> <td>".$rad['betegnelse']. " </td> " ; 
			 $bildeStreng = "<img src='".$rad['bildeadresse']."' width='100' Height='80' /> " ;
			 echo "<td>$bildeStreng</td>";
			 
			 echo "<td><input type='hidden' value='".$rad['varenr']."' name='varenr'/>
			 <input type='text' name='antall' size='3' maxlength='2'></td>"; //Man kan bestille fra 0 til 99 like varer.
			 echo "<td><input type='submit' name='kjop' value='Legg til i handlekurv' /></td>"; 
			 echo "</form>";
			 echo "</tr>"; 	



			 }

 }
 
       echo "</table></CENTER>"; 
	   if ( isset($_POST['kjop']) ) { 
    //lager en varenr som streng, for PHP aksepterer ikke numeriske indekser i $_SESSION 
    //$varenr =  "vareNr_" .  $_POST['varenr'];  
     
    //sjekker f?rst om antall er satt. Hvis ikke, legges 1 vare til kurven.  
	$varenr = $_POST['varenr']; //hidden field fra skjemaet
    if (!empty($_POST['antall']) ) { 
        $antall = $_POST['antall']; 
    } 
    else { 
        $antall = 1;   
    } 
         
		 
    //registrerer antallet av riktig vare, identifisert med en varenr.  
    if (!isset ($_SESSION["handlekurv"]) ) { 
        $_SESSION["handlekurv"] = array(); //hvis f?rste gang skal verdien legges inn direkte 
    } 
     
    $handlekurv = $_SESSION["handlekurv"];
	if( array_key_exists( $varenr, $handlekurv ) )
		$handlekurv[$varenr] += $antall; //hvis varer registrert tidligere, skal dette summeres opp.  
    else
		$handlekurv[$varenr] = $antall; 
	
     
	$_SESSION['handlekurv'] = $handlekurv;
    echo "<p style='background-color:lightgrey'>Varen " . $_POST['varenavn'] . " ble lagt til i handlekurven</p>"; 
} 
?>
<p>© CashKings © 2011</p>
</div>

<?php
include "bunn.htm";
?>
</form> 