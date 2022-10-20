<html>

<head>
    <meta charset="utf-8"></meta>

    <meta name="last-updated" content="2022-10-19, 23:51 CET">

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

	<link rel="stylesheet" href="./szukaj.css">
    <link rel="stylesheet" href="stronaglowna.css">

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
		}

		#brakw	{
			display: flex;
			justify-content: center;
			margin: auto;
		}

		#tlo	{
			background-color: white;
			border-radius: 10px;
			padding: 10px 10px 10px 10px;
		}

		hr:last-child	{
			margin-bottom: 0px;
			border: 0px;
		}
	</style>

	<script>
		function logo()	{
			window.location.href = './index.html';
		}
	</script>
</head>

<body style="color:white;">
	<div id="zawartosc">
    <div id="gora">
        <div id="logo"><img src="./img/sbc_logo.png" id="logoId" class="logo" onclick="logo()"/></div>
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

	$con = new mysqli("localhost","root","","id19715355_baza");

	$GG="SELECT * FROM ksiazki WHERE Tytul LIKE '%" . $s . "%' OR Autor LIKE '%" . $s . "%'";
	if($wynik2=$con->query($GG)){
		echo "<hr /><div id='tlo'>";

	while($row=$wynik2->fetch_array()){
		echo "
			<div class='wyszukanie'><img src='./img/" . $row[0] . ".jpg' class='miniaturka' /><a href=''><span class='tytul'>" . $row[1] . "</span></a><span class='autor'> " . $row[2] . "</span>
			<br /><span class='opis'>" . $row[3] . "</span></div><hr />
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
	</div>
	<div id="footer">
        <div>
            <div>
                <a href="https://github.com/Szkolna-Biblioteka-Cyfrowa">
                    <img src="./img/github.png" class="footer_zdjecie" />
            </div>
            <div></a></div>
            </a>
        </div>
        <span id="footer_tekst">Ⓒ SZKOLNA BIBLIOTEKA CYFROWA</span>
        <a href="./index.html"><img src="./img/sbc_slogo.png" class="footer_zdjecie" /></a>
    </div>

    <script>
        if (window.screen.width < 768)
            document.getElementById('footer_tekst').innerHTML = 'Ⓒ SBC';
    </script>
</body>

</html>