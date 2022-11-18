<?php
$nazwa_uzy1 = $_GET['nazwa_uzy'];

	$haslo1 = $_GET['haslo'];

	$dzis = date("Y-m-d");
	$con = new mysqli("localhost","root","","baza");

	$login="SELECT * FROM admin";
	if($wynik1=$con->query($login)){
		while($haslorow=$wynik1->fetch_array()){
			if(($haslorow[0]!=$nazwa_uzy1)||($haslorow[1]!=$haslo1))
			{
			    if(($nazwa_uzy1==NULL)||($haslo1==NULL))
			    {
			        header( "Location: login.html" );
				    exit;
			    }
			    
				header( "Location: login.html?nieprawidlowe=1" );
				exit;
			}
		}
	}
	
    if($_GET['lp']!=NULL)
    {
        $D_oddania=$_GET['d_oddania'];
        $LP=$_GET['lp'];

        $q = "UPDATE zamowienia SET Data_oddania = '" . $D_oddania . "' WHERE numer_zamowienia = ". $LP;
        $r = mysqli_query($con, $q);
        header( "Location: panel.php?nazwa_uzy=admin&haslo=&success=1" ); 
        exit;
    }
?>
