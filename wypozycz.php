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
			background-color: white;
			border-radius: 10px;
			padding: 10px 10px 10px 10px;
            margin-top: 20px;
		}

		hr:last-child	{
			margin-bottom: 0px;
			border: 0px;
		}

		.calosc	{
			display: flex;
		}

		@media (min-device-width: 768px) {
            body {
                font-size: 20pt;
            }

            #eula   {
                font-size: 10pt;
            }

            #form {
                display: block;
                width: 400px;
                background-color: rgb(241, 241, 241);
                border-color: black;
                border-style: dashed;
                border-width: 1px;
                border-radius: 20px;
                padding: 60px 0px 30px 60px;
                margin: auto;
            }

            #gora   {
                padding-bottom: 10px;
            }
        }

        @media (max-device-width: 767px) {
            body {
                font-size: 42pt;
            }

            #eula   {
                font-size: 35px;
            }

            input[type=text],
            input[type=submit],
            input[type=reset],
            input[type=date],
            select {
                padding: 30px;
                font-size: 42px;
                vertical-align: middle;
                width: -webkit-fill-available;
            }

            input[type="radio"],
            input[type="checkbox"] {
                transform: scale(3);
                margin: 0px 30px 0px 30px;
                vertical-align: middle;
            }

            #form {
                display: block;
				color: black;
                width: 830px;
                background-color: rgb(241, 241, 241);
                border-color: black;
                border-style: dashed;
                border-radius: 20px;
                padding: 60px 50px 20px 50px;
                margin: 28px 0;
            }

            input[type=submit]  {
                margin-bottom: 20px;
            }

            #przyciski {
                display: block;
                width: 712px;
                margin: auto;
            }

            #gora   {
                padding-bottom: 50px;
            }
        }

		#form2	{
			color: black;
		}
	</style>

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
	$k = $_GET['k'];

	$con = new mysqli("localhost","id19715355_root","E1Nc&M@>I=@?Sw]~","id19715355_baza");

	$GG="SELECT * FROM ksiazki WHERE LP=" . $k;
	if($wynik2=$con->query($GG)){
		echo "<div id='tlo'> ";

	while($row=$wynik2->fetch_array()){
		echo "
			<div class='calosc'><div class='wyszukanie'><img src='/img/" . $row[0] . ".jpg' class='miniaturka' /><a href=''><span class='tytul'>" . $row[1] . "</span></a><span class='autor'> " . $row[2] . "</span>
			<br /><span class='opis'>" . $row[3] . "</span></div></div><hr />
		";

		echo "<title>Wypożyczasz: &#8220;" . $row[1] ."&#8221; | Szkolna Biblioteka Cyfrowa</title>";
	}

	}

	echo "
    
    <div id='form'>
            <form action='/wypozyczsubmit.php' method='GET'>
                <div id='form2'>
                    <p>Imię: <input type='text' name='imie' required></p>
				    <p>Nazwisko: <input type='text' name='nazwisko' required></p>

                    <p>Klasa:
                        <select name='klasa' required>
                            <option value='' selected>--</option>
                            <option value='1B'>1B</option>
                            <option value='1C'>1C</option>
                            <option value='1D'>1D</option>
                            <option value='1E'>1E</option>
                            <option value='1F'>1F</option>
                            <option value='1G'>1G</option>
                            <option value='1K'>1K</option>
                            <option value='1P'>1P</option>
                            <option value='1O'>1O</option>

                            <option value='2C'>2C</option>
                            <option value='2D'>2D</option>
                            <option value='2E'>2E</option>
                            <option value='2F'>2F</option>
                            <option value='2G'>2G</option>
                            <option value='2K'>2K</option>
                            <option value='2P'>2P</option>
                            <option value='2O'>2O</option>

                            <option value='3C'>3C</option>
                            <option value='3D'>3D</option>
                            <option value='3E'>3E</option>
                            <option value='3F'>3F</option>
                            <option value='3G'>3G</option>
                            <option value='3K'>3K</option>
                            <option value='3P'>3P</option>
                            <option value='3O'>3O</option>

                            <option value='4C'>4C</option>
                            <option value='4D'>4D</option>
                            <option value='4E'>4E</option>
                            <option value='4F'>4F</option>
                            <option value='4G'>4G</option>
                            <option value='4K'>4K</option>
                            <option value='4P'>4P</option>
                            <option value='4O'>4O</option>

                            <option value='5C'>5C</option>
                            <option value='5C'>5D</option>
                            <option value='5C'>5E</option>
                            <option value='5C'>5F</option>
                            <option value='5C'>5G</option>
                            <option value='5C'>5K</option>
                            <option value='5C'>5P</option>
                            <option value='5C'>5O</option>
                        </select>

                        
                    </p>

                    <p>Data oddania:
                        <input type='date' name='d_oddania' required>
                    </p>

                    <p>
                        <input type='checkbox' name='zgadzam' value='zgadzam' required>
                        <span id='eula'>
                            Zgadzam się na przetwarzanie moich danych osobowych przez szkolnabibliotekacyfrowa.pl do identyfikacji wypożyczającego.
                        </span>
                    </p>

                    <div id='przyciski'>
                        <input type='submit' name='submit' value='Wypożycz'>
                        <input type='reset' name='reset' value='Wyczyść dane'>
                    </div>
                </div>
                <input type='hidden' name='lp' value='" . $k ."' />
            </form>
        </div>
    
    "

	?>


	</div>

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