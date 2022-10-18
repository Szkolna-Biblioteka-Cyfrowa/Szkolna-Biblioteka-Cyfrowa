<html>
<head>
<link rel="Stylesheet" type="text/css" href="style.css"/>
</head>


<?php
$Imie=$_POST['imie'];
$Plec=$_POST['plec'];
$R_buta=$_POST['rozmiar_buta'];
$Waga=$_POST['waga'];

$con = new mysqli("localhost","id19715355_root","Y&nO=^0-j+4~H^vb","id19715355_baza");
echo $Imie;
 
$q="INSERT INTO osoba (Imie, Plec, R_buta, Waga) VALUES ('".$Imie."' , '".$Plec."', '".$R_buta."', '".$Waga."'); ";
 $r= mysqli_query($con, $q);
$GG="select * from osoba";
if($wynik2=$con->query($GG)){
	echo "<table>";
while($row=$wynik2->fetch_array()){
	echo "<tr>";
	echo "<td>" .$row[0]. "</td>";
	echo "<td>" .$row[1]. "</td>";
	echo "<td>" .$row[2]. "</td>";
	echo "<td>" .$row[3]. "</td>";
	echo "<td>" .$row[4]. "</td>";
	echo "</tr>";
	
	
}

}
echo "</table>";
?>
</html>