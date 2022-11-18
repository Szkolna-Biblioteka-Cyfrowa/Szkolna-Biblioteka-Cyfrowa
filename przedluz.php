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
	
	if($_GET['k']==NULL)
	{
	    header( "Location: login.html" );
		exit;
	}
?>

<html>

<head>
    <meta charset="utf-8"></meta>

    <meta name="viewport" content="user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">
    <link rel="mask-icon" href="./safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <meta name="title" content="Szkolna Biblioteka Cyfrowa">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Szkolna Biblioteka Cyfrowa">
    <meta property="og:image"
        content="https://szkolnabibliotekacyfrowa.000webhostapp.com/img/sbcmeta.png">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="Szkolna Biblioteka Cyfrowa">
    <meta property="twitter:image"
        content="https://szkolnabibliotekacyfrowa.000webhostapp.com/img/sbcmeta.png">

	<link rel="stylesheet" href="/css/szukaj.css">
    <link rel="stylesheet" href="/css/stronaglowna.css">

	<style>
		@media (min-device-width: 768px) {
		    
		.miniaturka	{
			float: left;
			margin-right: 8px;
			height: auto;
		}

		.tytul	{
			font-weight: bold;
			font-size: 27px;
		}

		.autor	{
			font-size:14px;
			font-style: italic;
			color: rgb(210, 210, 210);
		}

		.opis	{
			font-size: 20px;
			color: black;
		}
		
		.informacje	{
			font-size: 25px;
		}
		
		.ktowypozyczyl	{
			font-size: 40px;
			margin-bottom: 5px;
		}
		
		#paneladmina	{
			color: black;
			width: 100%;
			text-align: center;
			font-size: 48px;
			font-weight: 700;
			margin-bottom:50px;
		}

		}

		@media (max-device-width: 768px) {

		.miniaturka	{
			display: none;
			margin-right: 8px;
		}

    	.tytul	{
			font-weight: bold;
			font-size: 45px;
		}

		.autor	{
			font-size:36px;
			font-style: italic;
			color: rgb(210, 210, 210);
		}

		.opis	{
			font-size: 40px;
			color: black;
		}
		
		.informacje	{
			font-size: 48px;
		}
		
		.ktowypozyczyl	{
			font-size: 48px;
			margin-bottom: 5px;
		}
		
		#paneladmina	{
			color: black;
			width: 100%;
			text-align: center;
			font-size: 72px;
			font-weight: 700;
			margin-bottom:50px;
		}

		}
		
		.wyszukanie	{
			display: inline-block;
			height: auto;
			overflow: hidden;
			text-overflow: ellipsis;
			width: -webkit-fill-available;
		}

		#brakw	{
			display: flex;
			justify-content: center;
			margin: auto;
		}

		#tlo	{
			background-color: rgb(255,255,255);
			border-radius: 10px;
			padding: 10px 10px 10px 10px;
		}

		hr:last-child	{
			margin-bottom: 0px;
			border: 0px;
		}

		.calosc	{
			display: flex;
		}

		.hr1	{
			opacity: 0.2;
			width: 96%;
		}

		.zalegle	{
			text-decoration: underline;
			text-decoration-color: #ee1708;
			color:#ee1708;
		}
	</style>
	
	<link rel="stylesheet" href="/css/form.css">

    <script src="/js/blurowanie.js"></script>
	<script>
		function logo()	{
			window.location.href = '/';
		}
		
		window.onload = function()	{
			var dzis = new Date().toISOString().split('T')[0];	

			document.getElementsByName("d_oddania")[0].setAttribute('min', dzis);
    	}
	</script>
</head>

<body id="body" style="color:black;">
	<div id="loading"><img src="/img/loading.gif"></div>
    <div id="content">
    <div id="gora">
        <div id="logo"><img src="/img/sbc_logo.png" id="logoId" class="logo" onclick="logo()" /></div>
        <div id="szukaj_blok">
            <form action="panel.php" enctype="text/plain" method="get">
                <input type="text" name="s" id="wyszukiwarka" placeholder="Szukaj w wypożyczeniach..."><input type="submit"
                    id="szukaj" value="🔍">
                <input type="hidden" name="nazwa_uzy" value="admin">
                <input type="hidden" name="haslo" value="zaq1@WSX">
            </form>
        </div>
    </div>

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
				header( "Location: login.html?nieprawidlowe=1" );
				exit;
			}
		}
	}
	
	$k = $_GET['k'];

	echo "<script>history.replaceState('x', 'x', '/przedluz')</script>";

	$GG="
		SELECT zamowienia.numer_zamowienia, ksiazki.LP, ksiazki.Tytul, ksiazki.Autor, ksiazki.Opis, zamowienia.Imie,
		zamowienia.Nazwisko, zamowienia.LP_ksiazki, zamowienia.Klasa, zamowienia.Data_wypozyczenia,
		zamowienia.Data_oddania FROM zamowienia
		INNER JOIN ksiazki ON zamowienia.LP_ksiazki=ksiazki.LP WHERE zamowienia.numer_zamowienia = " . $k . ";
	";

	if($wynik2=$con->query($GG)){
		echo "<div id='tlo'>";

	while($row=$wynik2->fetch_array()){
		echo "
			<div class='ktowypozyczyl'>" . $row[5] . " " . $row[6] . " z klasy " . $row[8] ." wypożyczył:</div>

			<div class='calosc'><div class='wyszukanie'><img src='/img/" . $row[1] . ".jpg' class='miniaturka' /><span class='tytul'>" . $row[2] . "</span><span class='autor'> " . $row[3] . "</span>
			<br /><span class='opis'>" . $row[4] . "</span>	
			</div>
        </div>
		<hr class='hr1' />
		<div class='informacje'>
			Data wypożyczenia: " . $row[9] ."<br />";
			
			if($dzis<$row[10])
			{
				echo "Data oddania: " . $row[10] ."<br />";
			}

			else
			{
				echo "<span class='zalegle'>Data oddania: " . $row[10] ." (zaległe wypożyczenie!)</span><br />";
			}

		echo "</div>
		
		<hr />
		
		<div id='form'>
            <form action='/przedluzsubmit.php' method='GET'>
                <div id='form2'>
                    <p>Data oddania:
                        <input type='date' name='d_oddania' required>
                    </p>

                    <div id='przyciski'>
                        <input type='submit' name='submit' value='Przedłuż'>
                    </div>
                </div>
                <input type='hidden' name='lp' value='" . $k ."' />
                <input type='hidden' name='nazwa_uzy' value='admin' />
                <input type='hidden' name='haslo' value='' />
            </form>
        </div>
        
        <title>Przedłuż wypożyczenie ucznia " . $row[5] . " " . $row[6] . " | Szkolna Biblioteka Cyfrowa</title>
		";
	}

	}

	echo "</div>";
	?>
	<div id="footer">
        <div class="footer_zdjecierazem">
            <a href="https://github.com/Szkolna-Biblioteka-Cyfrowa" target="_blank">
                <img src="/img/github.png" class="footer_zdjecie" title="Github" />
                <span class="footer_zdjecietekst">Github</span>
            </a>
        </div>
        <div id="footer_razem">
            <span id="footer_tytul">SZKOLNA BIBLIOTEKA CYFROWA</span>
            <span id="footer_tekst">
                <a href="https://github.com/MARKUSA19" target="_blank">M. Kusaj</a> | 
                <a href="https://github.com/Pietrox123" target="_blank">P. Kacprzycki</a> | 
                <a href="https://github.com/D3De200" target="_blank">D. Dąbrowski</a>
            </span>
        </div>
        <div class="footer_zdjecierazem">
            <a href="/">
                <span class="footer_zdjecietekst">Strona główna</span>
                <img src="/img/sbc_slogo.png" class="footer_zdjecie" title="Strona główna" />
            </a>
        </div>
    </div>
    </div>
</body>

</html>
