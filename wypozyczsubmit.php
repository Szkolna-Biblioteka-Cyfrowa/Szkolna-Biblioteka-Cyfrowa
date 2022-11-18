<?php
if($_GET['lp']==NULL)
{
    header( "Location: /" ); 
    exit;
}

$Imie=$_GET['imie'];
$Nazwisko=$_GET['nazwisko'];
$Klasa=$_GET['klasa'];
$D_oddania=$_GET['d_oddania'];
$LP=$_GET['lp'];

$con = new mysqli("localhost","root","","baza");
$q = "INSERT INTO zamowienia (Imie, Nazwisko, LP_ksiazki, Klasa, Data_oddania) VALUES ('".$Imie."' , '".$Nazwisko."', '".$LP."', '".$Klasa."', '".$D_oddania."'); ";
$r = mysqli_query($con, $q);
header( "Location: index.html?success=1" ); 
exit;
?>
