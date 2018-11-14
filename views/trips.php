<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>
	
	<link rel="stylesheet" href="../public/style/style-trips.css">
	
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
				
				<h1>Zdobądź legendarne minerały i wykorzystaj je do misji!</h1>
				
			</header>	
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="trips.php"><p>Wyprawy</p></a></div>
				
			</div>
				
			<br /><br />
			
			<h1>Witaj <?php echo $_SESSION['user'];?> !</h1>	
			
			<br />
			
			<div><h2>Wyrusz na jedną z wypraw i posiądź legendarne minerały!</h2></div><br />	
			
			
			<div><h3 id="time"></h3></div>	 				
			<div id="tekst"></div> 

<?php	

if(isset($postRefreshAjax)){
	echo $postRefreshAjax;
}

if(isset($tripInfo)){
	echo $tripInfo;
}

if(isset($tripPrizeInfo)){
	echo $tripPrizeInfo;
}

$tripSession->tripsErrorStoppedTrip();

?>			
		
			<article>
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription1"><h2>Niezamieszkałe bagna Avatrisu</h2><p>Bagna to miejsce niesprzyjające ludziom, niejeden stracił życie stąpając po nich, szczególnie Avatrańskie bagna stanowią śmiertelne zagrożenie dla podróżujących. Do tej pory wielu śmiałków ryzykowało życie i wydobywało pośród mokradel znany kamień jadeit, niezwykle rzadki kryształ o kolorze butelkowej zieleni.</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="1" value="Rozpocznij wyprawę!"></div>
			</article>
			
			<article>					
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription4"><h2>Mroczne lasy pogardy</h2><p>W lesie można znaleźć niemal wszystko, lecz w tym lesie jedyne co można spotkać to strach i przerażenie. Mimo, że jest on tak blisko cywilizacji, to wzbudza wśród podróżników ogrromne poczucie dyskomfortu, co widać wśród każdych, którzy powrócili. Jednak warto szukać w tamtejszych skałach pośród drzew pięknych minerałów fluorytów</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="4" value="Rozpocznij wyprawę!"></div>
			<article>
			
			</article>					
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription7"><h2>Stolica krainy nędzy</h2><p>W mieście, w którym wydawałoby się nie można znaleźć żadnego szlachetnego minerału, znajdują się  kopalnie węgla, w których to zaś z kolei czesto widywało się opale, bardzo ładne kamienie w różnych kolorach. Może to dlatego tutejszym górnikom żyje się lepiej niż niejednemu urzędnikowi</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="7" value="Rozpocznij wyprawę!"></div>
			</article>		
			
			<article>					
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription2"><h2>Zachodnia część gór centralnych</h2><p>Góry Avatrisu pełne są kryształów górskich, przeźroczystych kamieni półszlachetnych, które niekiedyt na pierwszy rzut oka wyglądają jak diamenty... nic bardziej mylnego, sa to swoiste skamieniałe duchy tego górzystego regionu, noszenie ich przez lwy(chodzi o horoskop) daje im siłe i chęć władzy.</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="2" value="Rozpocznij wyprawę!"></div>
			<article>	
			
			</article>						
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription5"><h2>Wschodnia część gór centralnych</h2><p>Na wschodnią częśc górzystego regionu chodzi się głównie w celach turystycznych, bo zobaczyć źródła Gorundy i wodospady w skałach, lecz coraz częściej widywać tutejszych z kilofami, a na rynku w stolicy można kupić piekne morganity, które mimo że są podobne do kryształów, są o wiele cenniejsze.</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="5" value="Rozpocznij wyprawę!"></div>
			<article>
			
			</article>						
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription8"><h2>Delta rzeki Gorundy</h2><p>Mimo, że mokradła delty Gorundy nie są tak straszne jak znane wszystkim bagna, to tutaj też można spotkać piękne minerały... a nie jednak nie są to minerały, hodowane przez rybaków i są to perły. Piękne perłowe naszyjniki zdobią szyje prawie każdej kobiety z Avatrisu. Perły mimo swojej ceny, warto posiadać w ekwipunku.</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="8" value="Rozpocznij wyprawę!"></div>
			<article>	
			
			</article>						
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription3"><h2>Zakazane miasto Cypis</h2><p>W mieście tym raczej nie można wydobyć żadnego pożądanego minerału, lecz nie o to chodzi w tych 	poszukiwaniach, niegdyś jak piraci zaatakowali i spalili miasto, zrabowali prawie każdy tamtejszy dom, lecz nie wiedzieli, że wśród kosztowności tamtejszych kobiet niepozorne kolorowe kamienie są warte naprawde duże pieniądze...</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="3" value="Rozpocznij wyprawę!"></div>
			<article>		
			
			</article>						
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription6"><h2>Zatoka cieni</h2><p>W zatoce cieni widnieje wiele  skał, wewnątrz których ukrywają się akwamaryny, piękne kamienie o niebieskawych odcieniach. Ich wartość jest dość duża, częśto używane są w biżuterii, więc mimo niebezpieczeństwa wielu śmiałków próbuje je zdobyć. Niestety trzeba bardzo długo szukać, by dostać się do gniazda z większymi okazami.</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="6" value="Rozpocznij wyprawę!"></div>
			<article>		
			
			</article>						
				<div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription9"><h2>Półwysep Romandu</h2><p>Na tych terenach znajdują się pojedyncze bloki skalne, przypominające maczugi. Skały te są nadmierne skuwane, ponieważ można w nich znaleźć cymofan, kamień o właściwościach kosiego oka, z tego względu można dostac za niego dość dobrą cenę. Co ciekawe, więcej osób robi sobie krzywdę wykuwające te skały, niż ginie w bagnach</p><input type="button" name="wyprawy" class="button col-6 offset-3" data-wyprawa="9" value="Rozpocznij wyprawę!"></div>
			</article>	

			<br /><br />
			
			<div id="map" class="no-gutters">
					<div class="mapTrips" data="Bagna Avatrisu" id="div1"><img src="../public/img/div1.jpg" ></div>
					<div class="mapTrips" data="Mroczne lasy" id="div4"><img src="../public/img/div4.jpg"></div>
					<div class="mapTrips" data="Stolica nędzy" id="div7"><img src="../public/img/div7.jpg"></div>
					<div class="mapTrips" data="Zachodnie góry" id="div2"><img src="../public/img/div2.jpg"></div>
					<div class="mapTrips" data="Wschodnie góry" id="div5"><img src="../public/img/div5.jpg"></div>
					<div class="mapTrips" data="Delta Gorundy" id="div8"><img src="../public/img/div8.jpg"></div>
					<div class="mapTrips" data="Zakazane miasto" id="div3"><img src="../public/img/div3.jpg"></div>
					<div class="mapTrips" data="Zatoka cieni" id="div6"><img src="../public/img/div6.jpg"></div>
					<div class="mapTrips" data="Półwysep Romandu" id="div9"><img src="../public/img/div9.jpg"></div>
					<div style="clear: both;"></div>
				</div>		
				
			<br />
			
<?php require 'partials/footer.php'; ?>
				
		</div>
	
	</main>	
	


	<!-- skrypt JS do otwierania poszczegolnych divow na mapce -->

	<script src="../public/javascript/trips-map.js"></script>	
		
	<!-- AJAX rozpoczęcie wyprawy -->	
			<!-- AJAX wyświetlający czas po odświeżeniu -->
		
	<script src="../public/javascript/trips-ajax2.js"></script>
	<script src="../public/javascript/trips-ajax.js"></script>
		

		
		
</body>