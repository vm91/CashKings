<?php
$db_knytning = mysql_connect("localhost","root","");
if (!$db_knytning)
{
    trigger_error(mysql_error());
    return "Kunne ikke knytte til server!";
}
$db = mysql_select_db("cashkings");
if(!$db)
{
    trigger_error(mysql_error());
    return "Fikk ikke forbindelse til den valgte databasen hos Cash Kings";
}
?>

