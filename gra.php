<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Minerva - gra przeglądarkowa!</title>
	<meta name="description" content="Gra przeglądarkowa, w której możesz zostać właścicielem ogromnej fortuny, dzięki poszukiwaniu najszlachetniejszych minerałów!" />
	<meta name="keywords" content="gra przeglądarkowa, gra, minerały, monety, metale, złoto, srebro, diamenty" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
	<link rel="stylesheet" href="style/style.css" type+"text/css" />
	<link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet"> 
	<link rel="stylesheet" href="social_icons_fontello/fontello.css" type+"text/css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
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
	<h1> Witamy Cię miłośniku kryształów! </h1>	
	
		<br />
		<div id="navgra">
			<ol>
				<li><a href="gra.php">Ekwipunek</a></li>
				<li><a href="ekspedycje.php">Ekspedycje</a></li>
				<li><a href="kopalnie.php">Kopalnie</a></li>
			</ol>
		</div>
		<br />
	
<?php
	
	require_once "connect.php";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$userName = $_SESSION['user'];
	$query = "SELECT * FROM minerva WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$ekwipunek = $rezultat->fetch_assoc();
	
echo<<<END

	<h1>Witaj {$_SESSION['user']}!</h1>
	
	<a href="logout.php"><input type="button"  class="button" value="Wyloguj się!"/></a><br />
	
	<br />	
	
	<table cellpadding="10" cellspacing="1" width="800" class="table">
	<tr>
		<td>Monety</td><td>Exp</td><td>Level</td>
	</tr>
	<tr>
		<td>{$ekwipunek['monety']}</td><td>{$ekwipunek['exp']}</td><td>{$ekwipunek['level']}</td>
	</tr>
	</table>
	
	<br />	
END;
	
		if(isset($_SESSION['monetybursztyny'])) echo "<h1>"."Sprzedałeś bursztyny o łącznej wartości ".$_SESSION['monetybursztyny']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetybursztyny']);
		if(isset($_SESSION['monetyagaty'])) echo "<h1>"."Sprzedałeś agaty o łącznej wartości ".$_SESSION['monetyagaty']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyagaty']);
		if(isset($_SESSION['monetymalachity'])) echo "<h1>"."Sprzedałeś malachity o łącznej wartości ".$_SESSION['monetymalachity']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetymalachity']);
		if(isset($_SESSION['monetyturkusy'])) echo "<h1>"."Sprzedałeś turkusy o łącznej wartości ".$_SESSION['monetyturkusy']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyturkusy']);
		if(isset($_SESSION['monetyametysty'])) echo "<h1>"."Sprzedałeś ametystyo łącznej wartości ".$_SESSION['monetyametysty']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyametysty']);
		if(isset($_SESSION['monetytopazy'])) echo "<h1>"."Sprzedałeś topazy o łącznej wartości ".$_SESSION['monetytopazy']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetytopazy']);
		if(isset($_SESSION['monetyszmaragdy'])) echo "<h1>"."Sprzedałeś szmaragdy o łącznej wartości ".$_SESSION['monetyszmaragdy']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyszmaragdy']);
		if(isset($_SESSION['monetyrubiny'])) echo "<h1>"."Sprzedałeś rubiny o łącznej wartości ".$_SESSION['monetyrubiny']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyrubiny']);
		if(isset($_SESSION['monetyszafiry'])) echo "<h1>"."Sprzedałeś szafiry o łącznej wartości ".$_SESSION['monetyszafiry']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyszafiry']);
		if(isset($_SESSION['monetydiamenty'])) echo "<h1>"."Sprzedałeś diamenty o łącznej wartości ".$_SESSION['monetydiamenty']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetydiamenty']);
		if(isset($_SESSION['monetysrebro'])) echo "<h1>"."Sprzedałeś srebro o łącznej wartości ".$_SESSION['monetyzrebro']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetysrebro']);
		if(isset($_SESSION['monetyzloto'])) echo "<h1>"."Sprzedałeś złoto o łącznej wartości ".$_SESSION['monetyzloto']." monet!"."<br />"."</h1>";
	unset($_SESSION['monetyzloto']);
		if(isset($_SESSION['bladint'])) echo $_SESSION['bladint'];
	unset($_SESSION['bladint']);
		if(isset($_SESSION['bladSprzedazy'])) echo $_SESSION['bladSprzedazy'];
	unset($_SESSION['bladSprzedazy']);
		if(isset($_SESSION['bladzero'])) echo $_SESSION['bladzero'];
	unset($_SESSION['bladzero']);
	
$polaczenie->close();	
?>

<?php

	function Stan($stan)
	{
		require "connect.php";
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		$userName = $_SESSION['user'];
		$query = "SELECT * FROM minerva WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		$ekwipunekStan = $rezultat->fetch_assoc();
		echo $ekwipunekStan[$stan];
		$polaczenie->close();
	}
?>

	<br />	
	
	<h1> Oto lista minerałów, które zebrałeś: </h1>
	
	<table border="10" cellpadding="10" cellspacing="1" width="1000" class="table">
	<tr>
		<td class="td1"><img src="img/bursztyny.png" alt="bursztyny" title="bursztyny"></td><td>Bursztyny</td><td><?php Stan('bursztyny'); ?></td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert1" class="insert"/>
		<input type="submit" name="submit1" value = sprzedaj class="submitSell"/></form>1 bursztyn = 1 moneta</td>
	</tr>
		<tr>
		<td class="td1"><img src="img/agat.jpg"/></td><td>Agaty</td><td><?php Stan('agaty'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert2" class="insert"/>
		<input type="submit" name="submit2" value = sprzedaj class="submitSell"/></form>1 agat = 2 monety</td>
	</tr>	
		<tr>
		<td class="td1"><img src="img/malachity.png"></td><td>Malachity</td> <td><?php Stan('malachity'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert3" class="insert"/>
		<input type="submit" name="submit3" value = sprzedaj class="submitSell"/></form>1 malachit = 3 monety</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/turkusy.png"></td><td>Turkusy</td> <td><?php Stan('turkusy'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert4" class="insert"/>
		<input type="submit" name="submit4" value = sprzedaj class="submitSell"/></form>1 turkus = 5 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/ametysty.png"></td><td>Ametysty</td> <td><?php Stan('ametysty'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert5" class="insert"/>
		<input type="submit" name="submit5" value = sprzedaj class="submitSell"/></form>1 ametysty = 10 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/topazy.png"></td><td>Topazy</td> <td><?php Stan('topazy'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert6" class="insert"/>
		<input type="submit" name="submit6" value = sprzedaj class="submitSell"/></form>1 topaz = 20 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/szmaragdy.png"></td><td>Szmaragdy</td> <td><?php Stan('szmaragdy'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert7" class="insert"/>
		<input type="submit" name="submit7" value = sprzedaj class="submitSell"/></form>1 szmaragd = 50 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/rubiny.png"></td><td>Rubiny</td> <td><?php Stan('rubiny'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert8" class="insert"/>
		<input type="submit" name="submit8" value = sprzedaj class="submitSell"/></form>1 rubin = 100 monet</td>
	</tr>	
	<tr>
		<td class="td1"><img src="img/szafiry.png"/</td><td>Szafiry</td> <td><?php Stan('szafiry'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert9" class="insert"/>
		<input type="submit" name="submit9" value = sprzedaj class="submitSell"/></form>1 szafir = 200 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/diamenty.png"></td><td>Diamenty</td> <td><?php Stan('diamenty'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert10" class="insert"/>
		<input type="submit" name="submit10" value = sprzedaj class="submitSell"/></form>1 diament = 500 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/srebro.png"></td><td>Srebro</td> <td><?php Stan('srebro'); ?></td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert11" class="insert"/>
		<input type="submit" name="submit11" value = sprzedaj class="submitSell"/></form>1 uncja srebra = 20 monet</td>
	</tr>
	<tr>
		<td class="td1"><img src="img/złoto.png"></td><td>Złoto</td> <td><?php Stan('zloto'); ?> </td>
		<td class="td2"><form action ="xaja.php" method="post"><input type="text" name="insert12" class="insert"/>
		<input type="submit" name="submit12" value = sprzedaj class="submitSell"/></form>1 uncja złota = 100 monet</td>
	</tr>
</table>

<br />
	<a href="logout.php"><input type="button"  class="button" value="Wyloguj się!"/></a><br />

		</div>
		
		<div id="footer">
		
			<div class="social"><div class="fb"><a href="https://www.facebook.com/" target="_blank" class="fblink"><i class="icon-facebook"></i></a></div></div>
			<div id="stopka"> <h1> Pisz do nas w mediach społecznościowych!<br />Pozostaw swoje opinie na temat gry!</div>
			<div class="social"><div class="tw"><a href="https://twitter.com/" target="_blank" class="twlink"><i class="icon-twitter"></i></a></div></div>
			
		</div>
		&#169 copyright &#169 Andrzej Olearka 2017
</div>
	
</body>
</html>