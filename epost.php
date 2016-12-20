<?php
session_start(); 
 $tema = "Bekreftelse på bestilling fra Cashkings"; 
 $fraEpostAdresse = "noreplay.cashkings.no"; //hvem som sender ut denne e-posten?  
    if (!strstr($_GET['epost'], "@"))  
        die("E-postadressen du har skrevet inn er feil. Du må ha @ i adressen"); 
     
    sendEpost($_GET['epost'], $tema, $melding, $fraEpostAdresse);  
    echo "En e-post med bestillingen er sendt til " . $_GET['epost']; 
	//ferdig med å sende bestillingen 

//ellers vises skjema for bestilling... 
else { 
?> 
    <form action="" method="get"> 
        Skriv inn e-postadresse vi skal sende til her: <input type="text" name="epost"><br> 
        <input type="submit" name="knapp"> 
    </form> 
<?php 
}
	
function sendEpost($mottaker, $tema, $melding, $fra) { 
    $melding = nl2br($melding); //gjør om alle \n til linjeskift <br> 
    $headere  = "MIME-Version: 1.0\n"; 
    $headere .= "Content-type: text/html; charset=iso-8859-1\n"; 
    $headere .= "From:$fra"; 
    if ( is_array($mottaker) ){ 
        foreach ($mottaker as $til) { 
            //mange motteakere 
            mail ($til, $tema, $melding, $headere); 
        } 
    }//if 
    else { 
        //en mottaker 
        mail ($mottaker, $tema, $melding, $headere); 
    }//else 
} 



?> 
