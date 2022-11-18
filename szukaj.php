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
	</style>

    <script src="/js/blurowanie.js"></script>
	<script>
		function logo()	{
			window.location.href = '/';
		}
	</script>
</head>

<body id="body" style="color:white;">
	<div id="loading"><img src="/img/loading.gif"></div>
    <div id="content">
    <div id="gora">
        <div id="logo"><img src="/img/sbc_logo.png" id="logoId" class="logo" onclick="logo()" /></div>
        <div id="szukaj_blok">
            <form action="szukaj.php" enctype="text/plain" method="get">
                <input type="text" name="s" id="wyszukiwarka" placeholder="Szukaj w bibliotece..."><input type="submit"
                    id="szukaj" value="🔍">
            </form>
        </div>
    </div>

	<?php
	$s = $_GET['s'];
	$w = 0;

	$con = new mysqli("localhost","root","","baza");

	$GG="SELECT * FROM ksiazki WHERE Tytul LIKE '%" . $s . "%' OR Autor LIKE '%" . $s . "%'";
	if($wynik2=$con->query($GG)){
		echo "<div id='tlo'>";

	while($row=$wynik2->fetch_array()){
		echo "
			<div class='calosc'><div class='wyszukanie'><img src='/img/" . $row[0] . ".jpg' class='miniaturka' /><a href=''><span class='tytul'>" . $row[1] . "</span></a><span class='autor'> " . $row[2] . "</span>
			<br /><span class='opis'>" . $row[3] . "</span></div><div id='wypozycz' onclick='wypozycz" . $row[0] ."()'>
            Wypożycz
        </div></div><hr />

		<script>
			function wypozycz" . $row[0] ."()	{
				location.href = '/wypozycz?k=" . $row[0] ."';
			}
		</script>
		";
		
		$w = $w + 1;
	}

	}

	if ($w == 0)
	{
		echo "<div id='brakw'><span class='opis'>Nie znaleziono wyników dla: <span style='font-style:italic;'>" . $s . "</span></span></div>";
	}

	echo "</div>";

	if ($s == null)
		echo "<title>Wyszukiwarka | Szkolna Biblioteka Cyfrowa</title>";
	else
		echo "<title>Wyszukiwarka: " . $s . " | Szkolna Biblioteka Cyfrowa</title>";

		echo "<meta name='description' content='Wyniki wyszukania dla: " . $s . "'>";
		echo "<meta property='og:description' content='Wyniki wyszukania dla: " . $s . "'>";
		echo "<meta property='twitter:description' content='Wyniki wyszukania dla: " . $s . "'>";
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
