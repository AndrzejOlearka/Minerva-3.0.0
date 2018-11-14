<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-expeditions.css">
	
</head>

<body>

	<header>
	
		<h1>MinervA</h1>
	
	</header>

	<main>	
		
		<div class="container-fluid">
		
<?php require 'partials/nav-main_logged.php'; ?>

<?php require 'partials/nav-ingame_logged.php'; ?>			
		
			<header>
				
				<h1> Zobacz jakie minerały i kosztowności udało ci się zdobyć!</h1>
				
			</header>	
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="expeditions.php"><p>Ekspedycje</p></a></div>
				
			</div>
				
			<br /><br />
			
			<h1>Witaj <?php echo $_SESSION['user']; ?> !</h1>	
			
			<br />
			
			<h2>Wyrusz na ekspedycje, by zdobyć cenne nagrody i doświadczenie!</h2>	
			
			<br />
			
			<div><h3 id="time"></h3></div> 
			<div id="tekst"></div> 
					
<?php

if(isset($postRefreshAjax)){
	echo $postRefreshAjax;
}

if(isset($expeditionInfo)){
	echo $expeditionInfo;
}

if(isset($expeditionPrizeInfo)){
	echo $expeditionPrizeInfo;
}

$expeditionSession->expErrorLowLevel();
$expeditionSession->expErrorLowCoins();
$expeditionSession->expErrorStoppedExpedition();
			
?>			
			
			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja1.jpeg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Morska wyprawa</h3><p>Wymóg: 2 monety</p><p>Nagroda: 5 - 10 bursztynów</p><p>Doświadczenie: 200 pkt</p><p>Czas: 2 minuty</p></div></div><div class="description col-12"><p>Morze to miejsce gdzie możesz obłowić się w tą skamieniałą żywicę, która pamięta prehistoryczne czasy, gdy dinozaury władały tą planetą. Te piękne kamienie są świetnym minerałem, od którego można rozpocząć swoją przygodę z najpiękniejszymi kamieniami świata.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="1" value="Rozpocznij zadanie!"> </p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja2.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Tysiąc kolorów</h3><p>Wymóg: 5 monet</p><p>Nagroda: 4 - 12 agatów</p><p>Doświadczenie: 400 pkt</p><p>Czas: 4 minut</p></div></div><div class="description col-12"><p>Agaty to niesamowite kamienie, nie mają jednego wzoru kolorystycznego, mogą przybierać od paru do kilkuset kolorów naraz. Występują w wielu zakątkach świata, jako kamienie półszlachetne nie są wybitnie cenne, lecz ich wygląd przyciąga wielu miłośników minerałów. </p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="2" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			

			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja3.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Zielone zebry</h3><p>Wymóg: 10 monet</p><p>Nagroda: 8 - 15 malachitów</p><p>Doświadczenie: 750 pkt</p><p>Czas: 10 minut</p></div></div><div class="description col-12"><p>Malachity przybierają niezwykłą postać zebry, lecz nie w standardowych kolorach białym i czarnym, tylko w zielonym i czarnym. jest to minerał szeroko rozpowszechniony na kuli ziemskiej, lecz ze względu na jego wygląd dość lubiany przez turystów i kolekcjonerów </p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="3" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja4.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Lazurowy głaz</h3><p>Wymóg: 15 monet</p><p>Nagroda: 8 - 18 turkusów</p><p>Doświadczenie: 1400 pkt</p><p>Czas: 20 minuty</p></div></div><div class="description col-12"><p>Turkusy to kamienie przypominające niektórym morze, lecz są skażone szarością, bielością i innymi odcienami rujnującymi ten piękny kolor. Ceniony kamień w jubilerstwie jest często wykorzystywany do tworzenia pięknych naszyjników zdobiących kobiece dekolty </p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="4" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			
			
			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja5.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Jaskiniowa grota</h3><p>Wymóg: 20 monet</p><p>Nagroda: 6 - 12 ametystów</p><p>Doświadczenie: 1900 pkt</p><p>Czas: 30 minut</p></div></div><div class="description col-12"><p>Ametysty często  wystepują w postaci setek kryształków na kawałku głazu, dlatego im większy kawał kryształu się znajdzie, tym cenniejszy on się okaże. Ametysty to fioletowe kamienie, które po oszlifowaniu znajdowały się w koronach królewskich, dlatego warto ich szukać.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="5" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja6.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Brązowy cukier</h3><p>Wymóg: 50 monet</p><p>Nagroda: 8 - 12 topazów</p><p>Doświadczenie: 3700 pkt</p><p>Czas: 1 godzina</p></div></div><div class="description col-12"><p>Topazy to minerały występujące najczęściej w postaci kryształu o kolorze przypominajacym brązowy cukier, lecz jest to mylące, ponieważ do tej pory rozpoznano 150 odmian tego minerała, a najrzadsze kolory są uznawane za niezwykle cenne szlachetne kamienie.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="6" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			
			
			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja7.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Zielone piękno</h3><p>Wymóg: 100 monet</p><p>Nagroda: 6 - 12 szmaragdów</p><p>Doświadczenie: 14000 pkt</p><p>Czas: 4 godziny</p></div></div><div class="description col-12"><p>Szmaragdy to kamienie cenione od starożytności. Jedne z najdroższych i najpiękniejszych minerałów, które spotkać można w różnych zakątkach świata. Kolor zielony jaki mają te kamienie zawdzięczają tlenkom chromu. Jest to najdroższy beryl jaki występuje w naturze.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="7" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja8.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Minerał serce</h3><p>Wymóg: 100 monet</p><p>Nagroda: 3 - 6 rubinów</p><p>Doświadczenie: 14000 pkt</p><p>Czas: 4 godziny</p></div></div><div class="description col-12"><p>Rubiny to kamienie szlachetne o czerwonym zabarwieniu. Są niezwykle piękne, a niektóre z nich wykazują asteryzm czy efekt kociego oka, czyli piekne zjawiska optyczne w kształcie odpowiednio gwiazdy i kociego oka. Nie występują tak licznie jak szmaragdy, dlatego ich cena jest wyższa.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="8" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			
			
			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja9.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Oczy proroka</h3><p>Wymóg: 100 monet</p><p>Nagroda: 2 - 3 szafiry</p><p>Doświadczenie: 14000 pkt</p><p>Czas: 4 godziny</p></div></div><div class="description col-12"><p>Szafiry to jedne z najbardziej trwałych kamieni, zaraz po diamencie. Jest to jeden z najdroższych kamieni, często wykorzystywany w jubilerstwie i nie mniej rzadki jak najdroższy z nich - diament. Jest to kamień o mocno niebieskim kolorze. </p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="9" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja10.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Najpiękniejszy...</h3><p>Wymóg: 200 monet</p><p>Nagroda: 1-2 diamenty</p><p>Doświadczenie: 26000 pkt</p><p>Czas: 8 godzin</p></div></div><div class="description col-12"><p>Diament... dużo o nim mówić nie trzeba. Jest to najtwarlsza i najpiękniejsza forma czystego węgla, oszlifowany diament czyli brylant to najbardziej pożądany materiał jubilerski świata, to on w popkulturze stał się wyznacznikiem bogactwa i luksusu. </p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="10" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			
			
			<div class="row">
			
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja11.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Prawie złoto</h3><p>Wymóg: 500 monet</p><p>Nagroda: 40 - 60 uncji srebra</p><p>Doświadczenie: 50000 pkt</p><p>Czas: 24 godziny</p></div></div><div class="description col-12"><p>Srebro to pierwiastek, w czystej postaci występujący jako metal o najsilniejszych zdolnościach przewodzenia ciepła i energii. Jest ceniony w różnych dziedzinach przemysłu, w jubilerstwie bardzo popularny ze względu na ładny wygląd i niżsża cenę od złota.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="11" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="img/ekspedycja12.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Szlachetny pył</h3><p>Wymóg: 500 monet</p><p>Nagroda: 5 - 15 uncji złota</p><p>Doświadczenie: 50000 pkt</p><p>Czas: 24 godziny</p></div></div><div class="description col-12"><p>O złocie, podobnie jak o diamencie nie trzeba wiele mówić. Jest to najbardziej ceniony metal w przyrodzie, najbardziej ciągliwy i kowalny, miękki ale bardzo błyszczący. Złoto było zawsze kojarzone z majątkiem, odkąd człowiek interesował się błyskotkami.</p><input type="button"  class = "col-4 buttonStart" name="zadanie" data-zadanie="12" value="Rozpocznij zadanie!"></p><br /></div></div></div>
				
			</div>			

<?php require 'partials/footer.php'; ?>
				
		</div>
	
	</main>	

	
	<!-- AJAX rozpoczęcie ekspedycji -->			
	<script src="../public/javascript/expeditions-ajax.js"></script>			
	
	<!-- AJAX wyświetlający czas po odświeżeniu -->
	<script src="../public/javascript/expeditions-ajax2.js"></script>	
	

</body>