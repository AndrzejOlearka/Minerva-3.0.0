<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Minerva - gra przeglądarkowa!</title>
	<meta name="description" content="Gra przeglądarkowa, w której możesz zostać właścicielem ogromnej fortuny, dzięki poszukiwaniu najszlachetniejszych minerałów!" />
	<meta name="keywords" content="gra przeglądarkowa, gra, minerały, monety, metale, złoto, srebro, diamenty" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet"> 
	<link rel="stylesheet" href="social_icons_fontello/fontello.css" type+"text/css" />
	
</head>

<body>

	<div id="container">
	
	&#169 Andus Games Presents &#169
	
		<div id ="top">
		<h1>Minerva</h1>
		</div>
	
		<div id="header">
		<h1>Gra przeglądarkowa z kryształami w tle...</h1>
		</div>
	
		<div id="nav">
			<ol>
				<li><a href="index.php">Logowanie</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
				<li><a href="statystyki.php">Statystyki</a></li>
				<li><a href="samouczek.php">Samouczek</a></li>
				<li><a href="autorzy.php">Autorzy</a></li>
			</ol>
		</div>
	
		<div id="content">
		
		<br />
		<h1> Statystyki graczy </h1>
		<br />
		<h2> Najbardziej doświadczeni gracze:</h2>
<?php

	require_once "connect.php";
	$polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
	$query = "SELECT user, exp FROM minerva ORDER BY `minerva`.`exp` DESC limit 10 ";
	$rezultat = mysqli_query($polaczenie, $query); 
	
	$i=1; 
	while ($tablica=mysqli_fetch_assoc($rezultat))
		{				
			echo "<table border=5px;' cellspacing='2' width='600' class='table'>
				<tr>
					<td class='statystykiNumer'>{$i}</td>
					<td class='statystykiGracz'>{$tablica['user']}</td>
					<td class='statystykiWynik'>{$tablica['exp']}</td>
				</tr></table>";				
		$i++;		
		}
	
echo "<br>";
echo "<h2>Najbogatsi gracze:</h2>";
	
	$query = "SELECT user, monety FROM minerva ORDER BY `minerva`.`monety` DESC limit 10 ";
	$rezultat = mysqli_query($polaczenie, $query); 
	
	$i=1; 
	while ($tablica=mysqli_fetch_assoc($rezultat))
		{						
			echo "<table border=5px;' cellspacing='2' width='600' class='table'>
				<tr>
					<td class='statystykiNumer'>{$i}</td>
					<td class='statystykiGracz'>{$tablica['user']}</td>
					<td class='statystykiWynik'>{$tablica['monety']}</td>
				</tr></table>";				
		$i++; 
		}
		
mysqli_close($polaczenie);

?>		
		<br />
		
		<div id="footer">
		
			<div class="social"><div class="fb"><a href="https://www.facebook.com/" target="_blank" class="fblink"><i class="icon-facebook"></i></a></div></div>
			<div id="stopka"> <h1> Pisz do nas w mediach społecznościowych!<br />Pozostaw swoje opinie na temat gry!</div>
			<div class="social"><div class="tw"><a href="https://twitter.com/" target="_blank" class="twlink"><i class="icon-twitter"></i></a></div></div>
			
		</div>
		&#169 copyright &#169 Andrzej Olearka 2017
</div>
	
</body>
</html>