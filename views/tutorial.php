<!--tutorial subpage - main view-->
<!--zakładka samouczek - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

<?php require 'partials/head-html.php'; ?>

	<script src= "../public/javascript/tutorial.js"></script>
	<link rel="stylesheet" href= "../public/style/style-tutorial.css">

</head>

<body>

<?php require 'partials/main-header.php'; ?>

	<main>

		<div class="container-fluid">

<?php require 'partials/nav-main_unlogged.php'; ?>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="tutorial.php"><p>Samouczek</p></a>
				</div>

			</div>

			<header>

				<br /><h1> Prześledź samouczek i dowiedz się informacji na temat gry!</h1><br />

			</header>

			<h2>Po pierwsze.... poznaj dostępne zakładki:</h2>

			<nav class="row">
				<div class="col-6  col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="equipment">Ekwipunek</p></div>
				<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="expeditions">Ekspedycje</p></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-sm-1 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="mains">Kopalnie</p></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-sm-2 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="trips">Wyprawy</p></div>
				<div class="lg-w-100"></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-lg-3 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="missions">Misje</p></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="guilds">Gildie</p></div>
				<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="account">Konto</p></div>
			</nav>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<p id="tutorialContent">Ekwipunek</p>
				</div>

			</div>

			<br /><br />
			<div id="tutorial">
				<div class="row description" id="equipment1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row">
							<h2 class="col-12 mb-4">Ekwipunek</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/ekspedycja1.jpeg"></div>
							<div class="titleTutorial col-12 col-md-8">
								<p>
									W tej zakładce możesz prześledzić stan swoich minerałów, zarówno tych powszechnie wystepujących i legendarnych. 
									Dodatkowo możesz sprawdzić ile kosztują i sprzedać je, by uzyskać monety! W grze występuje 12 powszechnych minerałów, 
									do których masz dostęp od początku, a ich ilość możesz powiększyć dzięki ekspedycjom oraz 9 legendarnych - 
									by je zdobyć musisz korzystać z wypraw
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row description" id="expeditions1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row">
							<h2 class="col-12 mb-4">Ekspedycje</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/ekspedycja8.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
								<p>
									Dzięki ekspedycjom możesz zdobywać powszechne minerały, każa z nich trwa określoną ilość czasu. Im droższy minerał - 
									tym więcej trzeba czasu przeczekać na nagrodę. Dla przykładu na bursztyny należy czekać jedynie 1 minutę, zaś na 
									złoto i srebro 12 godzin. Żeby rozpocząć ekspedycje, musisz posiadać także określoną ilość monet, 
									w zależności od tego jak dobra jest nagroda, musisz wydać więcej swoich monet.
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row description" id="mains1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row" >
							<h2 class="col-12 mb-4">Kopalnie</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/kopbursztyny.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
								<p>
									W grze dostępnych jest 12 kopalni - dają one losową ilość minerałów za każdą jedną kopalnię. 
									Wydostać z nich można jedynie minerały powszechne. Żeby kupić daną kopalnię, należy mieć 10 - maksymalny level, 
									dodatkowo wymagana jest określona liczba monet, minerałów, srebra i złota. Jeśli chodzi o kopalnie sreba i złota - 
									tutaj wymagane są tylko monety oraz srebro lub złoto. Gracz otrzymuje minerały w postaci dziennej nagrody, 
									co 24 godziny, im więcej kopalni tym większe dzienne nagrody.
								</p>
							</div>
						</div>
					</div>
				</div>

			<div class="row description" id="missions1">
				<div class="tutorial col-lg-8 offset-lg-2">
					<div class="row" >
							<h2 class="col-12 mb-4">Misje</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/misja4.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
							<p>
								Misji dostępnych w grze jest 9, tyle samo co legendarnych minerałów. Żeby wykonać je trzeba posiadać 
								określoną liczbę powszechnych minerałów oraz jeden z legendarnych minerałów. Misje dodają jedynie expa, 
								ale jest ono niezwykle potrzebne na początku gry, aby szybko osiągnąć 10 poziom i móc kupić kopalnie
								i powiększyć swój ekwipunek. Misje wykonywane są automatycznie, nie trzeba na nie czekać ani sekundy.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row description" id="trips1">
				<div class="tutorial col-lg-8 offset-lg-2">
					<div class="row" >
							<h2 class="col-12 mb-4">Wyprawy</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/misja8.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
							<p>
								Wypraw w grze jest 9, czyli tyle samo ile legendarnych minerałów. Kazda wyprawa może skończyć się na 3 sposoby - 
								albo otrzymasz wyłącznie exp, albo exp i monety, albo exp i legendarne minerały. Szansa na zdobycie legendarnego minerału 
								to około 12%. Wyprawy organizowane są na wyspie Gorundzie, której historia mrozi krew w żyłach. 
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row description" id="guilds1">
				<div class="tutorial col-lg-8 offset-lg-2">
					<div class="row" >
							<h2 class="col-12 mb-4">Gildie</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/misja2.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
							<p>
								Gildie może założyć każdy kto posiada 10 level i może wydać 1000 monet. W każdej z gildii możesz liderować 20 członkom. 
								Każda gildia posiada swój avatar. W gildii zbiera się doświadczenie, obliczane za każdą zdobytą monetę i kopalnię. 
								Im więcej expa ma twoja gildia, tym więcej możesz zdobyć minerałów w ekspedycjach czy wyprawach, 
								dlatego warto dołączyć do gildii lub stworzyć swoją własną.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row description" id="account1">
				<div class="tutorial col-lg-8 offset-lg-2">
					<div class="row">
							<h2 class="col-12 mb-4">Konto</h2>
							<div class="photoTutorial col-12 col-md-4 mb-4"><img src="../public/img/misja3.jpg"></div>
							<div class="titleTutorial col-12 col-md-8">
							<p>
								W tej zakładce możesz zobaczyć swój level, monety, exp oraz status swojego premium. 
								Dodatkowo możesz zwiększyć ilość dni premium o 3, 7 lub 14 dni, a także powiększyć ilość monet o 100,250 lub 500. 
								W tej zakładce także możesz zmienić nick oraz usunąć konto. 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
			<br /><br />

			<h2>Po drugie.... dowiedz się nieco więcej o grze:</h2>

			<nav class="row">
				<div class="col-6  col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="level">Level</p></div>
				<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="minerals">Minerały</p></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-sm-1 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="premium">Kopalnie</p></div>
				<div class="col-6 col-sm-4 col-lg-2 offset-sm-2 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="statistics">Statystyki</p></div>
			</nav>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><p id="tutorialContent2">Level</p></div>

			</div>

			<br /><br />

			<div id="tutorial2">
				<div class="row description2" id="level1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row">
							<div class="titleTutorial col-12"><h2>Level</h2>
								<p>
									W grze można uzyskać maksymalnie 10 level. Aby go uzyskać należy zdobyć 100k expa, czyli dla przykładu około 500 razy 
									wyruszyć na ekspedycję w poszukiwaniu bursztynów. Exp zdobywasz też na wyprawach i misjach. 
								</p>
								<table class='table col-12' id='searchNick'>
									<tr><th>1 level</th><td>0 - 999 exp<td/><th>6 level</th><td>50000 - 99999 exp<td/></tr>
									<tr><th>2 level</th><td>1000 - 4999 exp<td/><th>7 level</th><td>100000 - 24999 exp<td/></tr>
									<tr><th>3 level</th><td>5000 - 9999 exp<td/><th>8 level</th><td>25000 - 49999 exp<td/></tr>
									<tr><th>4 level</th><td>10000 - 24999 exp<td/><th>9 level</th><td>50000 - 99999 exp<td/></tr>
									<tr><th>5 level</th><td>25000 - 49999 exp<td/><th>10 level</th><td>100000 + exp<td/></tr>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row description2" id="minerals1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row" >
							<div class="titleTutorial col-12"><h2>Minerały</h2>
								<p>
									Minerałów w grze jest 21, w tym 12 zwykłych i 9 legendarnych. Oczywiście wśród nich są perły, które de facto minerałami nie są, 
									ale to nieważne! W grze możesz je zdobywać w ekspedycjach (minerały zwykłe) oraz w wyprawach (minerały legendarne). 
									Każde z nich możesz sprzedać, jedne kosztują więcej, ale zdobywasz ich mniej (np. diamenty, jadeity), 
									innych zaś będziesz mieć więcej i są dużo tańsze (np. bursztyny i kryształy). Po zdobyciu 10 levela będziesz mógł kupowac kopalnie,
									które będą codziennie dawały ci nową porcję określonych zwykłych minerałów. Jeśli kupisz premium, zarówno w ekspedycjach
									jak i wyprawach, będziesz mógł zdobyć większą ilość minerałów, maksymalnie o 50% więcej niż możesz bez premium.
								</p>
							</div>
							<table class='table col-12' id='searchNick'>
								<tr><th>MINERAŁ</th><th>BEZ PREMIUM<th/><th>Z PREMIUM</th><th>ILE ZYSKASZ?<th/></tr>
								<tr><td>bursztyny</td><td>5 - 10 sztuk<td/><td>10 - 15 sztuk</td><td>nawet 50% więcej!<td/></tr>
								<tr><td>morganity</td><td>3 - 5 sztuk<td/><td>5 - 7 sztuk</td><td>nawet 66% więcej!<td/></tr>
							</table>
						</div>
					</div>
				</div>

				<div class="row description2" id="premium1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row" >
							<div class="titleTutorial col-12"><h2>Premium</h2>
								<p>
									Premium w grze Minerva daje więcej, niż by się wydawało. A to dlaczego? Można zyskać więcej minerałów z ekspedycji oraz wypraw, 
									co daje większą przewagę w późniejszym czasie gry. Kupując zwykłe premium za 9,99zł masz tylko 3 dni i nie oszczędzasz zbyt wiele,
									lecz kupując tygodniowy pakiet oszczędzasz nawet 18%, zaś dwutygodniowy nawet do 35%!
								</p>
							</div>
							<table class='table col-12' id='searchNick'>
								<tr><th>ILOŚĆ DNI</th><th>CENA<th/><th>OSZCZĘDNOŚĆ</th><th></tr>
								<tr><td>3 dni</td><td>9,99 zł<td/><td>0%</td></tr>
								<tr><td>7 dni</td><td>18,99 zł<td/><td>18%</td></tr>
								<tr><td>14 dni</td><td>29,99 zł<td/><td>35%</td></tr>
							</table>
						</div>
					</div>
				</div>

				<div class="row description2" id="statistics1">
					<div class="tutorial col-lg-8 offset-lg-2">
						<div class="row">
							<div class="titleTutorial col-12"><h2>Statystyki</h2>
								<p>
									W Minervie statystyki są prowadzone w dwóch kategoriach - w pierwszej kluczowe jest posiadanie największego doświadczenia - expa, 
									im więcje go posiadasz tym możesz byc wyżej. Doświadczenie zdobywa się za udział w ekspedycjach, wyprawach oraz za wykonywanie misji. 
									Inaczej wygląda sprawa jeśli chodzi o drugą kategorię - bogactwo, które jest obliczane za pomocą sumy posiadanych monet 
									oraz wartości posiadanych kopalni. Dodatkowo prowadzona jest 3 statystyka, najlepsza gildia, która jest obliczana wedle expa gildii - rośnie 
									on za każdym razem jak gracz należący do gildii wykona ekspedycję, misję, bądź wyprawę.
								</p>
							</div>
							<table class='table col-12' id='searchNick'>
								<tr><th>RODZAJE STATYSTYK</th><th>OBLICZANIE</th></tr>
								<tr><td>Najbardziej doświadczeni gracze</td><td>exp (doświadczenie)</td></tr>
								<tr><td>Najbogatszy gracz </td><td>monety + wartość kopalni</td></tr>
								<tr><td>Najbardziej doświadczone gildie</td><td>exp gildii (doświadczenie)</td></tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<br /><br />

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
