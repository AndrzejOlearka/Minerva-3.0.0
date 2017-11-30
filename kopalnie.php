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
	<link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet"> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../gra1/javascript/onclick.js"></script>
	
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

<h1> Posiądź własną kopalnię i odkrywaj jeszcze więcej kamieni!</h1>

<br />
	<div id="navgra">
			<ol>
				<li><a href="gra.php">Ekwipunek</a></li>
				<li><a href="ekspedycje.php">Ekspedycje</a></li>
				<li><a href="kopalnie.php">Kopalnie</a></li>
			</ol>
	</div>
<br />

<a href="logout.php"><input type="button"  class="button" value="Wyloguj się!"/></a><br />

<br />

<h1>	

<?php

if(isset($_SESSION['bladLevela']))
{echo $_SESSION['bladLevela'];}
unset($_SESSION['bladLevela']);

if(isset($_SESSION['bladMonet']))
{echo $_SESSION['bladMonet'];}
unset($_SESSION['bladMonet']);

if(isset($_SESSION['bladSrebra']))
{echo $_SESSION['bladSrebra'];}
unset($_SESSION['bladSrebra']);

if(isset($_SESSION['bladZlota']))
{echo $_SESSION['bladZlota'];}
unset($_SESSION['bladZlota']);

if(isset($_SESSION['UdanyZakupKopalni']))
{echo $_SESSION['UdanyZakupKopalni'];}
unset($_SESSION['UdanyZakupKopalni']);	

?>
</h1>
<h1>
<?php

	require_once "connect.php";
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$userName = $_SESSION['user'];
	$query = "SELECT * FROM minerva WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$ekwipunek = $rezultat->fetch_assoc();

$data = getdate();
$rok = $data["year"];
$miesiac = $data["mon"];
$dzien = $data['mday'];
if($dzien<10) $dzien="0".$dzien;
if($miesiac<10) $dzien="0".$miesiac;
$dataczas = "$rok-$miesiac-$dzien";

if($dataczas >= $ekwipunek['nagrodastart'])
{
	if(($ekwipunek['kopalnia1'] > 0) || ($ekwipunek['kopalnia2'] > 0) || ($ekwipunek['kopalnia3'] > 0) || ($ekwipunek['kopalnia4'] > 0) || ($ekwipunek['kopalnia5'] > 0) || ($ekwipunek['kopalnia6'] > 0) || ($ekwipunek['kopalnia7'] > 0) || ($ekwipunek['kopalnia8'] > 0) || ($ekwipunek['kopalnia9'] > 0) || ($ekwipunek['kopalnia10'] > 0) || ($ekwipunek['kopalnia11'] > 0) || ($ekwipunek['kopalnia12'] > 0))
	{
			echo "Do odebrania masz nagrodę za wczorajszą pracę kopalni!"."<br /><br />";
			echo '<form action="cron.php" method="post"><input type="hidden" name="NagrodaKopalnia" value="NagrodaKopalnia"><input type="submit" name="NagrodaKopalnia" class="buttonOdbierzNagrode" value="Odbierz nagrodę!"></form>';
?> 
<script type="text/javascript">
$(document).ready(function(){
	alert ("Pamiętaj, że masz do odebrania nagrodę za wczorajszą pracę kopalni !");
})
</script>
<?php	
			
	}
}
	if(isset($_SESSION['nagroda1']) || isset($_SESSION['nagroda2']) || isset($_SESSION['nagroda3']) || isset($_SESSION['nagroda4']) || isset($_SESSION['nagroda5']) || isset($_SESSION['nagroda6']) || isset($_SESSION['nagroda7']) || isset($_SESSION['nagroda8']) || isset($_SESSION['nagroda9']) || isset($_SESSION['nagroda10']) || isset($_SESSION['nagroda11']) || isset($_SESSION['nagroda12'])) 
	{
		echo 'Z wczorajszej pracy twoich kopalni otrzymałeś ';
		echo ($_SESSION['nagroda1']); unset($_SESSION['nagroda1']);
		echo ($_SESSION['nagroda2']); unset($_SESSION['nagroda2']);
		echo ($_SESSION['nagroda3']); unset($_SESSION['nagroda3']);
		echo ($_SESSION['nagroda4']); unset($_SESSION['nagroda4']);
		echo ($_SESSION['nagroda5']); unset($_SESSION['nagroda5']);
		echo ($_SESSION['nagroda6']); unset($_SESSION['nagroda6']);
		echo ($_SESSION['nagroda7']); unset($_SESSION['nagroda7']);
		echo ($_SESSION['nagroda8']); unset($_SESSION['nagroda8']);
		echo ($_SESSION['nagroda9']); unset($_SESSION['nagroda9']);
		echo ($_SESSION['nagroda10']); unset($_SESSION['nagroda10']);
		echo ($_SESSION['nagroda11']); unset($_SESSION['nagroda11']);
		echo ($_SESSION['nagroda12']); unset($_SESSION['nagroda12']);
		echo "<br />";
	}
$polaczenie->close();
?>	

</h1>

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

	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopsrebro.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 4000 monet<br/>Nagrody:<br/>20 - 100 uncji srebra dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia srebra</h3>Kupujesz starą kopalnię miedzi, lecz można znaleźć tu wiele srebra, lub tez nie, ale to jest właśnie ryzyko, które musisz podjąć pozyskując tą kopalnię.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia11'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="hidden" name="kopalnia11" value="kopalnia11"><input type="submit" class = "buttonKopalnia" name="kopalnia11" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>		

	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopzloto.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 6000 monet<br/>Nagrody:<br/>5 - 30 uncji złota dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia złota</h3>Każdy słyszał o gorączce złota, lecz teraz będzie ci to dane przeżyć, kupując kopalnię tego najszlachetniejszego metalu, lecz pamiętaj szczęści ci może nie dopisać.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia12'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia12" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopbursztyny.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 1000 monet, 200 srebra, 20 złota<br/>Nagrody:<br/>200 - 400 bursztynów dziennie</div>
		</div>	
		<div class="opiskopalni">
			<h3>Kopalnia bursztynów</h3>Bursztyny to kamienie, które najlepiej wydobywa się z okolic nadmorskich, dlatego możesz zakupić położoną nad pięknym brzegiem kopalnię tej zastygniętej żywicy.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia1'); ?> kopalnie </h4>	
			<form action="zakupkopalni.php" method="post"><input type="hidden" name="kopalnia1" value="kopalnia1"><input type="submit" class = "buttonKopalnia" name="kopalnia1" value="kopalnia1"></form>
			</div><div style="clear: both;"></div>
	</div><br/>


	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopagaty.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 1200 monet, 220 srebra, 25 złota<br/>Nagrody:<br/>150 - 250 agatów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia agatów</h3>Agaty występują w bardzo starych pasmach górskich, praktycznie w każdym miejscu wystepowania, ich kolory są inne, dlatego zakup jedną z kopalni tego minerału i przekonaj się sam.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia2'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia2" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>		
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopmalachity.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 1400 monet, 240 srebra, 30 złota<br/>Nagrody:<br/>120 - 200 malachitów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia malachitów</h3>Bloki malachitów potrafią ważyć nawet kilka ton, dlatego niezbędny ci będzie profesjonalny sprzęt do jego wydobywania, lecz możesz być o to spokojny, gdy kupisz tą kopalnię.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia3'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia3" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopturkusy.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 1600 monet, 260 srebra, 35 złota<br/>Nagrody:<br/>80 - 120 turkusów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia turkusów</h3>Turkusy to kamienie, które wydobywa się na masową skalę coraz rzadziej, łatwo go podrobić barwiąc inne minerały na modłe turkusu, lecz w tej kopalni na pewno znajdziesz oryginalne kamienie.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia4'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia4" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
		
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopametysty.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 1800 monet, 280 srebra, 40 złota<br/>Nagrody:<br/>50 - 80 ametystów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia ametystów</h3>Ametysty często występują w postaci szczotek, dlatego ważne jest by wydobywać je w sposób delikatny, by nie przez przypadek nie uszkodzić pięknych kamieni, kup kopalnie i poinformuj o tym swoją załogę.<br /><h4> Obecnie posiadasz <?php Stan('kopalnia5'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia5" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>		

	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/koptopazy.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 2000 monet, 300 srebra, 45 złota<br/>Nagrody:<br/>30 - 50 topazów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia topazów</h3>Topazy to kamienie szlachetne, od których warto zaczać poszukiwanie, znalezienie dużych okazów daje naprawde dużo radości, zakup ich kopalnię i przekonaj się o tym sam.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia6'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia6 value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>		
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopszmaragdy.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 2500 monet, 350 srebra, 50 złota<br/>Nagrody:<br/>16 - 24 szmaragdów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia szmaragdów</h3>Kopalnia odkrywkowa jest bardzo dobra, gdy chcesz znaleźć troche pięknych minerałów jakimi są szmaragdy, warto więc kupić tego typu kopalnię i zacząć je poszukiwać.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia7'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia7" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/koprubiny.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 2500 monet, 350 srebra, 50 złota<br/>Nagrody:<br/>8 - 16 szmaragdów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia rubinów</h3>Najwspanialsze rubiny wydobywane są ze skał wapiennych, piasków i żwirów,by móc odszukać legendarnego rubina o kolorze gołębiej krwi, kup tą kopalnię.<br /><br /><h4> Obecnie posiadasz<?php Stan('kopalnia8'); ?> kopalnie </h4>		
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia8" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopszafiry.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 2500 monet, 350 srebra, 50 złota<br/>Nagrody:<br/>4 - 8 szafirów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia szafirów</h3>Słyszało się wiele o niebezpiecznych szybach, w których górnicy szukali szafirów, lecz ta kopalnia jest jak najbardziej bezpieczna - zakup ją by się przekonać.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia9'); ?> kopalnie </h4>			
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia9" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>		
	
	<div class="kopalnia">
		<div class="zdjecieopis"><div class="zdjeciekopalni"><img src="img/kopdiamenty.jpg"/></div>
			<div class="tytulkopalni">Koszt:<br /> 3000 monet, 400 srebra, 60 złota<br/>Nagrody:<br/>1 - 5 diamentów dziennie</div>
			</div>	
		<div class="opiskopalni">
			<h3>Kopalnia diamentów</h3>Uhhh... diamenty to kamienie, których poszukiwania mają szczególny wymiar, dlatego by maksymalnie zwiększyć wydobycie, wykup kopalnię i zacznij poszukiwania.<br /><br /><h4> Obecnie posiadasz <?php Stan('kopalnia10'); ?> kopalnie </h4>			
			<form action="zakupkopalni.php" method="post"><input type="submit" class = "buttonKopalnia" name="kopalnia10" value="Zakup kopalnie!"></form>
			</div><div style="clear: both;"></div>
	</div><br/>			
	
	<div id="footer">
		
			<div class="social"><div class="fb"><a href="https://www.facebook.com/" target="_blank" class="fblink"><i class="icon-facebook"></i></a></div></div>
			<div id="stopka"> <h1> Pisz do nas w mediach społecznościowych!<br />Pozostaw swoje opinie na temat gry!</div>
			<div class="social"><div class="tw"><a href="https://twitter.com/" target="_blank" class="twlink"><i class="icon-twitter"></i></a></div></div>
			
	</div>
		&#169 copyright &#169 Andrzej Olearka 2017
</div>
	
</body>
</html>