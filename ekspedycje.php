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
	<script type="text/javascript" src="../gra1/javascript/timer.js"></script>	

</head>

<body onload="odliczanie();">>

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
		<div id="zegar"></div> 
		<div id="time"></div>
		<script type="text/javascript">

			setTimeout(function(){$(document).ready(function(){
				$('input[type="button", name="zadanie"]').click(function(){
					alert("Zadanie zostało rozpoczęte!");
					var zadanie = $(this).data("zadanie");
					$.ajax({
						url:"ajax.php",
						method:"post",
						dataType:"json",
						data:{zadanie:zadanie},
						success: function(data){
							console.log(data),
							$('.buttonStart').hide();
							var date1 = new Date().getTime();
							var date2 = data;
							var diff = date2 - date1;
							console.log(diff);
							document.getElementById('time').innerHTML = "Pozostało "+diff/1000+" sekund do zakonczenia zadania";		
						}
					});
				});
			});
			}, 1000);
		</script>

		<h1>

<?php

if(isset($_SESSION['BrakMonet']))
{echo $_SESSION['BrakMonet'];}
unset($_SESSION['BrakMonet']);

?>
	
<?php	

require_once "connect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
$userName = $_SESSION['user'];
$query = "SELECT nrzadania FROM minerva WHERE user = '$userName'";
$rezultat = $polaczenie->query($query); 
$nrZadania = $rezultat->fetch_assoc();
	
$query = "SELECT czaszakonczenia FROM minerva WHERE user = '$userName'";
$rezultat = $polaczenie->query($query); 
$czasZakonczenia = $rezultat->fetch_assoc();

$dataCzas = new DateTime();
$dataCzas->format('Y-m-d H:i:s');
$koniecCzasu = DateTime::createFromFormat('Y-m-d H:i:s', $czasZakonczenia['czaszakonczenia']);
$roznica = $dataCzas->diff($koniecCzasu);

	$query = "SELECT * FROM minerva WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$ekwipunek = $rezultat->fetch_assoc();

	if($dataCzas<$koniecCzasu){
	echo "<br />";
	echo "W tej chwili wykonujesz zadanie ".$nrZadania['nrzadania']."<br>";

	$polaczenie->close();		
		?>
	</h1>
		<div id="czas">
		<?php 
			echo "Pozostało ".$roznica->format('%h godz, %i min, %s sek')." do zakończenia zadania"."<br />";
		?>
		</div>
		<script type="text/javascript">
		$(function(){$('.buttonStart').hide();});
		</script>
		<?php
		}
		else
		{
		echo "W tej chwili nie wykonujesz żadnych zadań."."<br>";	
		$query = "UPDATE minerva SET nrzadania = 0 WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 

		function Zadanie($min, $max, $min2, $max2, $mineral, $exp)
		{
			require "connect.php";
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			$userName = $_SESSION['user'];
			$query = "SELECT * FROM minerva WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
			$ekwipunek = $rezultat->fetch_assoc();
			
				$rand1 = rand($min,$max);
				if($ekwipunek['dnipremium'] > 0)
				{$rand1 = rand($min2, $max2);}
				$new[$mineral] = $rand1+$ekwipunek["$mineral"];
				$query = "UPDATE minerva SET $mineral = $new[$mineral] WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
				$newExp = $exp+$ekwipunek['exp'];
				$query = "UPDATE minerva SET exp = $newExp WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 			
				echo "<br />"."Zadanie z poszukiwaniem bursztynów zostało zakończone!"."<br />";
				echo "otrzymałeś: ".$rand1." bursztynów oraz ".$exp." punktów doświadczenia"."<br />";		
		}
		
		if($nrZadania['nrzadania'] == 1) 
			{Zadanie(5, 10, 10, 15, 'bursztyny', 200);}
		else if ($nrZadania['nrzadania'] == 2) 
			{Zadanie(4, 12, 6, 18, 'agaty', 400);}
		else if ($nrZadania['nrzadania'] == 3) 
			{Zadanie(8, 16, 12, 24, 'malachity', 750);}
		else if ($nrZadania['nrzadania'] == 4) 
			{Zadanie(8, 18, 12, 27, 'turkusy', 1400);}
		else if ($nrZadania['nrzadania'] == 5) 
			{Zadanie(6, 12, 9, 18, 'ametysty', 1900);}
		else if ($nrZadania['nrzadania'] == 6) 
			{Zadanie(8, 12, 12, 18, 'topazy', 3700);}
		else if ($nrZadania['nrzadania'] == 7) 
			{Zadanie(6, 12, 9, 18, 'szmaragdy', 14000);}
		else if ($nrZadania['nrzadania'] == 8) 
			{Zadanie(3, 6, 5, 9, 'rubiny', 14000);}
		else if ($nrZadania['nrzadania'] == 9) 
			{Zadanie(2, 3, 3, 6, 'szafiry', 14000);}
		else if ($nrZadania['nrzadania'] == 10) 
			{Zadanie(1, 2, 2, 3, 'diamenty', 26000);}
		else if ($nrZadania['nrzadania'] == 11) 
			{Zadanie(40, 60, 80, 180, 'srebro', 50000);}
		else if ($nrZadania['nrzadania'] == 12) 
			{Zadanie(5, 15, 10, 30, 'zloto', 50000);}	
		}
		
		$query = "SELECT exp, level FROM minerva WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		$dane = $rezultat->fetch_assoc();
			
			if($dane['exp']  > 1000 && $dane['exp']  < 4999){
				$query = "UPDATE minerva SET level = 2 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 5000 && $dane['exp']  < 9999){
				$query = "UPDATE minerva SET level = 3 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 10000 && $dane['exp']  < 24999){
				$query = "UPDATE minerva SET level = 4 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 25000 && $dane['exp']  < 49999){
				$query = "UPDATE minerva SET level = 5 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 50000 && $dane['exp']  < 99999){
				$query = "UPDATE minerva SET level = 6 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 100000 && $dane['exp']  < 249999){
				$query = "UPDATE minerva SET level = 7 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 250000 && $dane['exp']  < 499999){
				$query = "UPDATE minerva SET level = 8 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 500000 && $dane['exp']  < 999999){
				$query = "UPDATE minerva SET level = 9 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}
			else if($dane['exp']  > 1000000) {
				$query = "UPDATE minerva SET level = 10 WHERE user = '$userName'";
				$rezultat = $polaczenie->query($query); 
			}	
		
	$polaczenie->close();		

	?>
	</h1>	
	<br />
		<div id="navgra">
			<ol>
				<li><a href="gra.php">Ekwipunek</a></li>
				<li><a href="ekspedycje.php">Ekspedycje</a></li>
				<li><a href="kopalnie.php">Kopalnie</a></li>
			</ol>
		</div>
		<br />

<h3 id="result"></h3>
		
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
}
?>

	<a href="logout.php"><input type="button"  class="button" value="Wyloguj się!"/></a><br />
	
	<br />	
	
<h1> Poziom 1 </h1>

	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja1.jpeg"/></div><div class="tytul">Koszt: 2 monety<br />Czas: 2 minuty<br />Nagroda: 5 - 10 bursztynów<br />Exp: 200 pkt</div></div><div class="opis">
			
			<h3>Morska wyprawa po bursztyny</h3> 
			
			<p>Morze to miejsce gdzie możesz obłowić się w tą skamieniałą żywicę, która pamięta prehistoryczne czasy, gdy dinozaury władały tą planetą. Te piękne kamienie są świetnym minerałem, od którego można rozpocząć swoją przygodę z najpiękniejszymi kamieniami świata. <h4>Posiadasz <?php Stan('bursztyny'); ?> bursztynów</h4><input type="button" class = "buttonStart" name="zadanie" data-zadanie="1" value="Rozpocznij zadanie!"> </p>	

	</div><div style="clear: both;"></div></div>

	<br />

	
	<h1> Poziom 2 </h1>

	<input type="submit" id="show" value="Zobacz Zadanie!">
	<div class="zadania" id="z2">
			<script type="text/javascript" src="../gra1/javascript/js.js"></script>	
			
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja2.jpg"/></div><div class="tytul">Koszt: 5 monet<br />Czas: 5 minut<br />Nagroda: 4 - 12 agatów<br />Exp: 400 pkt</div></div><div class="opis">
			
			<h3>Kamienie tysiąca kolorów</h3> 
			
			<p>Agaty to niesamowite kamienie, nie mają jednego wzoru kolorystycznego, mogą przybierać od paru do kilkuset kolorów naraz. Występują w wielu zakątkach świata, jako kamienie półszlachetne nie są wybitnie cenne, lecz ich wygląd przyciąga wielu miłośników minerałów. <h4>Posiadasz <?php Stan('agaty'); ?> agatów</h4><input type="button" class = "buttonStart" name="zadanie" data-zadanie="2" value="Rozpocznij zadanie!"></p>	
	

	</div><div style="clear: both;"></div></div>
	
	
		<h1> Poziom 3 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja3.jpg"/></div><div class="tytul">Koszt: 10 monet<br />Czas: 10 minut<br />Nagroda: 8 - 15 malachitów<br />Exp: 750 pkt</div></div><div class="opis">
			
			<h3>Zebra o kolorze trawy </h3> 
			
			<p>Malachity przybierają niezwykłą postać zebry, lecz nie w standardowych kolorach białym i czarnym, tylko w zielonym i czarnym. jest to minerał szeroko rozpowszechniony na kuli ziemskiej, lecz ze względu na jego wygląd dość lubiany przez turystów i kolekcjonerów <h4>Posiadasz <?php Stan('malachity'); ?> malachitów</h4><input type="button" name="zadanie"  class = "buttonStart"  data-zadanie="3" value="Rozpocznij zadanie!"></p>	
			
	</div><div style="clear: both;"></div></div>
	<br />
		<h1> Poziom 4 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja4.jpg"/></div><div class="tytul">Koszt: 15 monet<br />Czas: 20 minut<br />Nagroda: 8 - 18 malachitów<br />Exp: 1400 pkt</div></div><div class="opis">
			
			<h3>Kamień lazurowego wybrzeża </h3> 
			
			<p>Turkusy to kamienie przypominające niektórym morze, lecz są skażone szarością, bielością i innymi odcienami rujnującymi ten piękny kolor. Ceniony kamień w jubilerstwie jest często wykorzystywany do tworzenia pięknych naszyjników zdobiących kobiece dekolty <h4>Posiadasz <?php Stan('turkusy'); ?> turkusów</h4><input type="button" name="zadanie" class = "buttonStart"  data-zadanie="4" value="Rozpocznij zadanie!"></p>	
			
	</div><div style="clear: both;"></div></div>
	
	<br />
		<h1> Poziom 5 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja5.jpg"/></div><div class="tytul">Koszt: 20 monet<br />Czas: 30 minut<br />Nagroda: 6 - 12 ametystów<br />Exp: 1900 pkt</div></div><div class="opis">
			
			<h3>Minerał w postaci jaskinii </h3> 
			
			<p>Ametysty często  wystepują w postaci setek kryształków na kawałku głazu, dlatego im większy kawał kryształu się znajdzie, tym cenniejszy on się okaże. Ametysty to fioletowe kamienie, które po oszlifowaniu znajdowały się w koronach królewskich, dlatego warto ich szukać.<h4>Posiadasz <?php Stan('ametysty'); ?> ametystów</h4><input type="button" name="zadanie" class = "buttonStart"  data-zadanie="5" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />
			<h1> Poziom 6 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja6.jpg"/></div><div class="tytul">Koszt: 50 monet<br />Czas: 1 godzina<br />Nagroda: 8-12 topazów<br />Exp: 3700 pkt</div></div><div class="opis">
			
			<h3>Przeźroczysty minerał w tysiącach postaci </h3> 
			
			<p>Topazy to minerały występujące najczęściej w postaci kryształu o kolorze przypominajacym brązowy cukier, lecz jest to mylące, ponieważ do tej pory rozpoznano 150 odmian tego minerała, a najrzadsze kolory są uznawane za niezwykle cenne szlachetne kamienie.<h4>Posiadasz <?php Stan('topazy'); ?> topazów</h4><input type="button" name="zadanie" class = "buttonStart"  data-zadanie="6" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />
	
			<h1> Poziom 8 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja7.jpg"/></div><div class="tytul">Koszt: 100 monet<br />Czas: 4 godziny<br />Nagroda: 6-12 szmaragdów<br />Exp: 14000 pkt</div></div><div class="opis">
			
			<h3>Zielone piękno wśród najdroższych</h3> 
			
			<p>Szmaragdy to kamienie cenione od starożytności. Jedne z najdroższych i najpiękniejszych minerałów, które spotkać można w różnych zakątkach świata. Kolor zielony jaki mają te kamienie zawdzięczają tlenkom chromu. Jest to najdroższy beryl jaki występuje w naturze.<h4>Posiadasz <?php Stan('szmaragdy'); ?> szmaragdów</h4><input type="button" name="zadanie" class = "buttonStart"  data-zadanie="7" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja8.jpg"/></div><div class="tytul">Koszt: 100 monet<br />Czas: 4 godziny<br />Nagroda: 3-6 rubinów<br />Exp: 14000 pkt</div></div><div class="opis">
			
			<h3>Piękno w kolorze serca</h3> 
			
			<p>Rubiny to kamienie szlachetne o czerwonym zabarwieniu. Są niezwykle piękne, a niektóre z nich wykazują asteryzm czy efekt kociego oka, czyli piekne zjawiska optyczne w kształcie odpowiednio gwiazdy i kociego oka. Nie występują tak licznie jak szmaragdy, dlatego ich cena jest wyższa.<h4>Posiadasz <?php Stan('rubiny'); ?> rubinów</h4><input type="button" name="zadanie" class = "buttonStart" data-zadanie="8" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />	
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja9.jpg"/></div><div class="tytul">Koszt: 100 monet<br />Czas: 4 godziny<br />Nagroda: 2-3 szafiry<br />Exp: 14000 pkt</div></div><div class="opis">
			
			<h3>Twardy jak skała, piękny jak on sam</h3> 
			
			<p>Szafiry to jedne z najbardziej trwałych kamieni, zaraz po diamencie. Jest to jeden z najdroższych kamieni, często wykorzystywany w jubilerstwie i nie mniej rzadki jak najdroższy z nich - diament. Jest to kamień o mocno niebieskim kolorze. <h4>Posiadasz <?php Stan('szafiry'); ?> szafirów</h4>	<input type="button" name="zadanie" class = "buttonStart"  data-zadanie="9" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>

	<br />	

	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja10.jpg"/></div><div class="tytul">Koszt: 200 monet <br />Czas: 8 godzin<br />Nagroda: 1-2 diamenty<br />Exp: 26000 pkt</div></div><div class="opis">
			
			<h3>Najpiękniejszy wśród najpiękniejszych</h3> 
			
			<p>Diament... dużo o nim mówić nie trzeba. Jest to najtwarlsza i najpiękniejsza forma czystego węgla, oszlifowany diament czyli brylant to najbardziej pożądany materiał jubilerski świata, to on w popkulturze stał się wyznacznikiem bogactwa i luksusu. <h4>Posiadasz <?php Stan('diamenty'); ?> diamentów</h4><input type="button" name="zadanie"  class = "buttonStart" data-zadanie="10" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />	

				<h1> Poziom 10 </h1>
	
	<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja11.jpg"/></div><div class="tytul">Czas: 24 godziny<br />Nagroda: 40-60 uncji srebra<br />Exp: 50000 pkt</div></div><div class="opis">
			
			<h3>Prawie najbardziej szlachetny metal  </h3> 
			
			<p>Srebro to pierwiastek, w czystej postaci występujący jako metal o najsilniejszych zdolnościach przewodzenia ciepła i energii. Jest ceniony w różnych dziedzinach przemysłu, w jubilerstwie bardzo popularny ze względu na ładny wygląd i niżsża cenę od złota.<h4>Posiadasz <?php Stan('srebro'); ?> uncji srebra</h4><input type="button" name="zadanie"  class = "buttonStart" data-zadanie="11" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
	<br />
	
		<div class="zadania">
			<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja12.jpg"/></div><div class="tytul">Czas: 24 godziny<br />Nagroda: 5-15 uncji złota<br />Exp: 50000 pkt</div></div><div class="opis">
			
			<h3>Zdecydowanie najbardziej szlachetny metal</h3> 
			
			<p>O złocie, podobnie jak o diamencie nie trzeba wiele mówić. Jest to najbardziej ceniony metal w przyrodzie, najbardziej ciągliwy i kowalny, miękki ale bardzo błyszczący. Złoto było zawsze kojarzone z majątkiem, odkąd człowiek interesował się błyskotkami.<h4>Posiadasz <?php Stan('zloto'); ?> uncji złota</h4><input type="button" name="zadanie"  class = "buttonStart" data-zadanie="12" value="Rozpocznij zadanie!"></p>	
	</div><div style="clear: both;"></div></div>
<br />

	<br />
		<br />
		<div id="navgra">
			<ol>
				<li><a href="gra.php">Ekwipunek</a></li>
				<li><a href="ekspedycje.php">Ekspedycje</a></li>
				<li><a href="kopalnie.php">Kopalnie</a></li>
			</ol>
		</div>
		<br />
		</div>
<a href="logout.php"><input type="button"  class="button" value="Wyloguj się!"/></a><br />
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