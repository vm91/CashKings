<?php
$db_knytning = mysql_connect("studssh.iu.hio.no","s171645","");
if (!$db_knytning)
{
    trigger_error(mysql_error());
    return "Kunne ikke knytte til server!";
}
$db = mysql_select_db("s171645");
if(!$db)
{
    trigger_error(mysql_error());
    return "Fikk ikke forbindelse til den valgte databasen hos Cash Kings";
}
?>

