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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../gra1/javascript/samouczek.js"></script>
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
		
		<br /><h1> Dowiedz się, o co chodzi w Minervie! </h1>
		<br /><h1>Krok pierwszy: Poznaj nasze zakładki ! </h1><br />
		
			<div id="navgra">
			<ol>
				<li id="ekwipunek">Ekwipunek</li>
				<li id="ekspedycje">Ekspedycje</li>
				<li id="kopalnie">Kopalnie</li>
			</ol>
			</div>
			</br>
			<div id="samouczek">
				<div id="ekwipunek1">

					<div class="zdjecietytul"><div class="zdjecie"><img src="img/bursztyny.png"></div><div class="tytul"><span style="color:#003366">Ilość:</span><br />Posiadane minerały<br /><span style="color:#003366">Wartość:</span><br />Liczba monet<br /><input type="text" class="insert"/>  <input type="submit" value = "sprzedaj" class="samouczekButton"/></div></div>	
					<div class="samouczekOpis"><h1>Ekwipunek</h1><p>W zakładce ekwipunku znajdziesz dwie tabelki - w pierwszej możesz zobaczyć posiadany level, exp oraz stan monet, zaś w drugiej tabelce schowany jest stan twoich minerałów, których w grze możesz zdobyć 12, dodatkowo możesz sprzedać je takżę dzięki wykorzysaniu formularza sprzedaży, gdzie możesz opchnąć dowolną ilość swoich kamieni za podaną obok cenę. </p></div><div style="clear: both;"></div>
					
				</div>
				<div id="ekspedycje1">
				<div class="zdjecietytul"><div class="zdjecie"><img src="img/ekspedycja1.jpeg"></div><div class="tytul"><span style="color:#003366">Czas:</span><br />2 minuty - 24 godziny<br /><span style="color:#003366">Nagroda: </span><br />losowa liczba minerałów<br /><span style="color:#003366">Exp: </span>200 - 50000 pkt</div></div>	
					<div class="samouczekOpis"><h1>Ekspedycje</h1><p>W zakładce ekspedycje możesz wybrać 1 z 12 dostępnych zadań do wykonania, które różnią się od siebie - minerałem, czasem oczekiwania oraz doswiadczeniem zdobytym po jego zakończeniu. Musisz mieć także wymagany level, by rozpocząć dane zadanie, na 1 levelu możesz wykonać jedynie zadanie z poszukiwaniem bursztynów, zaś na 10 levelu, odblokowane zostaną wszystkie. </p></div><div style="clear: both;"></div>
					
				</div>
				<div id="kopalnie1">
					<div class="zdjecietytul"><div class="zdjecie"><img src="img/kopagaty.jpg"></div><div class="tytul"><span style="color:#003366">Koszt:</span><br />monety oraz złoto i srebro<br /><span style="color:#003366">Nagroda: </span><br />losowa liczba minerałów<br /></div></div>	
					<div class="samouczekOpis"><h1>Kopalnie</h1><p>Tutaj możesz działać dopiero od 10 levela, który na tę chwilę jest maksymalny. Kopalnie pozwalają ci codziennie zdobywać darmową dzienną nagrodę w postaci minerału, w zależności od tego jakie kopalnie posiadasz. Każda kopalnia ma określony mnożnik nagrody, a więc jeśli posiadasz 3 kopalnie - twoja nagroda będzie 3 razy większa. Im droższy minerał, tym droższa jest kopalnia, ale większa dzienna nagroda.</p></div><div style="clear: both;"></div>
				</div>
			</div>
			
			<br /><h1>Krok drugi: 			<br />Dowiedz się jak zdobywać level, co daje premium i jak być najlepszym!</h1><br />
			
			<div id="navgra">
			<ol>
				<li id="level">Level</li>
				<li id="statystyki">Statystyki</li>
				<li id="premium">Premium</li>
			</ol>
			</div>
			</br>
			<div id="samouczek2">
				<div id="level1">

					<div class="zdjecietytul">
						<table>
						<tr><td><span style="color:#003366">level</span></td><td><span style="color:#003366">exp</span></td></tr>
							<tr><td>2</td><td>1001 - 5000 </td></tr>
							<tr><td>3</td><td>5001 - 10000 </td></tr>
							<tr><td>4</td><td>10001 - 25000 </td></tr>
							<tr><td>5</td><td>25001 - 50000 </td></tr>
							<tr><td>6</td><td>50001 - 100000 </td></tr>
							<tr><td>7</td><td>100001 - 250000 </td></tr>
							<tr><td>8</td><td>250001 - 500000 </td></tr>
							<tr><td>9</td><td>500001 - 100000 </td></tr>
							<tr><td>10</td><td>1000001 < </td></tr>
						</tr>
						</table>						
					</div>	
					<div class="samouczekOpis"><h1>Level</h1><p>Level maksymalny jaki możesz osiągnąć w Minervie to 10. Wówczas możesz wyruszyć na całodniowe ekspedycje z poszukiwaniem złota czy srebra, a także zacząć kupować kopalnie, w których będziesz wydobywał codziennie określone minerały. Na każdy level trzeba zebrać odpowiednią ilość doświadczenia, oczywiście wzrasta ono wraz z levelem.</p></div><div style="clear: both;"></div>
					
				</div>
				<div id="statystyki1">
				<div class="zdjecietytul">
					<table>
						<tr><td colspan="3" rowspan="1"><span style="color:#003366">exp ogółem</span></td></tr>
							<tr><td>miejsce</td><td>nick</td><td>wynik</td></tr>
							<tr><td>1</td><td>Orianna</td><td>65400</td></tr>
							<tr><td>2</td><td>Master Yi</td><td>57000</td></tr>
							<tr><td>3</td><td>Kleopatra</td><td>54000</td></tr>

					</table>				
					<table>
						<tr><td colspan="3" rowspan="1"><span style="color:#003366">bogactwo</span></td></tr>
							<tr><td>miejsce</td><td>nick</td><td>wynik</td></tr>
							<tr><td>1</td><td>Wajster</td><td>72000</td></tr>
							<tr><td>2</td><td>Diamondi</td><td>65000</td></tr>
							<tr><td>3</td><td>Perkusja</td><td>54000</td></tr>

					</table>						
				</div>	
					<div class="samouczekOpis"><h1>Statystyki</h1><p>Statystyki w Minervie dzielą się na tych, którzy przewodzą w doświadczeniu - expie, a więc ci co wykonali najwięcej zadań oraz na tych najbogatszych, którzy posiadają jak najwięcej kopalni. Jeśli chodzi o bogactwo, wynik ten osiąga się dzięki pomnożeniu ilości danych kopalni przez współczynnik dla danego wydobywanego minerału - np. srebro ma 100, bursztyn 300 a diament 1200. </p></div><div style="clear: both;"></div>
					
				</div>
				<div id="premium1">
					<div class="zdjecietytul">
						<table>
						<tr><td colspan="3" rowspan="1"><span style="color:#003366">Nagrody z ekspedycji</span></td></tr>
							<tr><td>rodzaj</td><td>normal</td><td>premium</td></tr>
							<tr><td>bursztyn</td><td>5-10</td><td>10-15</td></tr>
							<tr><td>agat</td><td>4-12</td><td>6-18</td></tr>
							<tr><td>turkus</td><td>8-16</td><td>12-24</td></tr>
							<tr><td>malachit</td><td>8-18</td><td>12-27</td></tr>
							<tr><td>ametyst</td><td>6-12</td><td>9-18</td></tr>
							<tr><td>topaz</td><td>8-12</td><td>12-18</td></tr>
							<tr><td>srebro</td><td>40-60</td><td>80-120</td></tr>
							<tr><td>złoto</td><td>5-15</td><td>10-30</td></tr>
					</table>				
					</div>	
					<div class="samouczekOpis"><h1>Premium</h1><p>Dzięki posiadaniu premium, wszystkie twoje ekspedycje mogą zakończyć się dodatkową nagrodą, z reguły wynosi ona 150% minimalnej i maksymalnej nagrody. W przypadkach złota i srebra szansa na uzyskanie większej nagrody to 200%. A więc czy warto kupić premium? Jak najbardziej! Dziennie możesz zyskać nawet 2 razy więcej monet!</p></div><div style="clear: both;"></div>
				</div>
			</div>	
						
						<br /><h1>Krok trzeci: <br />Zarejestruj się, zaloguj się i odpal jedyną grę z minerałami w tle!</h1><br />
						
						<a href="rejestracja.php"><button type="submit" class="btn btn-primary btn-lg">Rejestracja!</button></a><br /><br />
						<a href="index.php"><button type="submit" class="btn btn-primary btn-lg">Logowanie!</button></a><br />
						<br />
						
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