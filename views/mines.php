<!--mines subpage - main view-->
<!--zakładka kopalnie - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

<?php require_once 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-expeditions.css">

</head>

<body>
<?php require 'partials/main-header.php'; ?>

	<main>

		<div class="container-fluid">

<?php require 'partials/nav-main_logged.php'; ?>

<?php require_once 'partials/nav-ingame_logged.php'; ?>

			<header>

				<h1> Zobacz jakie minerały i kosztowności udało ci się zdobyć!</h1>

			</header>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="mains.php"><p>Kopalnie</p></a>
				</div>

			</div>

			<br /><br /><h1>Witaj <?php echo $_SESSION['user'];?> !</h1>

<?php

if(isset($formMinesDailyPrize)){
	echo $formMinesDailyPrize;
}


$minesSession->minesSessionLowLevel();
$minesSession->minesSessionLowCoins();
$minesSession->minesSessionLowSilver();
$minesSession->minesSessionLowGold();
$minesSession->minesSessionNewMain();

?>
			<br /><br />

			<h2>Zakup kopalnie, by codziennie otrzymywać nowe dostawy minerałów!</h2>

			<br />

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopbursztyny.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />bursztynów</h3><p>Wymóg: 1000 monet, 200 srebra, 20 złota</p><p>Nagroda: 200 - 400 bursztynów dziennie</p></div></div><div class="description col-12"><p>Bursztyny to kamienie, które najlepiej wydobywa się z okolic nadmorskich, dlatego możesz zakupić położoną nad pięknym brzegiem kopalnię tej zastygniętej żywicy z prehistorycznych czasów.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine0" value="0"><input type="submit"class = "col-4" name="mine0" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopagaty.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />agatów</h3><p>Wymóg: 1200 monet, 220 srebra, 25 złota</p><p>Nagroda: 150 - 250 agatów dziennie</p></div></div><div class="description col-12"><p>Agaty występują w bardzo starych pasmach górskich, praktycznie w każdym miejscu wystepowania, ich kolory są inne, dlatego zakup jedną z kopalni tego minerału i przekonaj się sam.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine1" value="1"><input type="submit"class = "col-4" name="mine1" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopmalachity.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />malachitów</h3><p>Wymóg: 1000 monet, 200 srebra, 20 złota</p><p>Nagroda: 120 - 200 malachitów dziennie</p></div></div><div class="description col-12"><p>Bloki malachitów potrafią ważyć nawet kilka ton, dlatego niezbędny ci będzie profesjonalny sprzęt do jego wydobywania, lecz możesz być o to spokojny, gdy kupisz tą kopalnię.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine2" value="2"><input type="submit"class = "col-4" name="mine2" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopturkusy.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />turkusów</h3><p>Wymóg: 1400 monet, 240 srebra, 30 złota</p><p>Nagroda: 80 - 120 turkusów dziennie</p></div></div><div class="description col-12"><p>Turkusy to kamienie, które wydobywa się na masową skalę coraz rzadziej, łatwo go podrobić barwiąc inne minerały na modłe turkusu, lecz w tej kopalni na pewno znajdziesz oryginalne kamienie.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine3" value="3"><input type="submit"class = "col-4" name="mine3" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopametysty.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />ametystów</h3><p>Wymóg: 1800 monet, 280 srebra, 40 złota</p><p>Nagroda: 50 - 80 ametystów dziennie</p></div></div><div class="description col-12"><p>Ametysty często występują w postaci szczotek, dlatego ważne jest by wydobywać je w sposób delikatny, by nie przez przypadek nie uszkodzić pięknych kamieni, kup kopalnie i poinformuj o tym swoją załogę.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine4" value="4"><input type="submit"class = "col-4" name="mine4" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/koptopazy.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />topazów</h3><p>Wymóg: 2000 monet, 300 srebra, 45 złota</p><p>Nagroda: 30 - 50 topazów dziennie</p></div></div><div class="description col-12"><p>Topazy to kamienie szlachetne, od których warto zaczać poszukiwanie, znalezienie dużych okazów daje naprawde dużo radości, zakup ich kopalnię i przekonaj się o tym sam.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine5" value="5"><input type="submit"class = "col-4" name="mine5" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopszmaragdy.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />szmaragdów</h3><p>Wymóg: 2500 monet, 350 srebra, 50 złota</p><p>Nagroda: 16 - 24 szmaragdów dziennie</p></div></div><div class="description col-12"><p>Kopalnia odkrywkowa jest bardzo dobra, gdy chcesz znaleźć troche pięknych minerałów jakimi są szmaragdy, warto więc kupić tego typu kopalnię i zacząć je poszukiwać.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine6" value="6"><input type="submit"class = "col-5" name="mine6" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/koprubiny.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />rubinów</h3><p>Wymóg: 2500 monet, 350 srebra, 50 złota</p><p>Nagroda: 8 - 16 rubinów dziennie</p></div></div><div class="description col-12"><p>Najwspanialsze rubiny wydobywane są ze skał wapiennych, piasków i żwirów,by móc odszukać legendarnego rubina o kolorze gołębiej krwi, kup tą kopalnię i pochłoń się w poszukiwaniach!</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine7" value="7"><input type="submit"class = "col-4" name="mine7" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopszafiry.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />szafirów</h3><p>Wymóg: 2500 monet, 350 srebra, 50 złota</p><p>Nagroda: 4 - 8 szafirów dziennie</p></div></div><div class="description col-12"><p>Słyszało się wiele o niebezpiecznych szybach, w których górnicy szukali szafirów, lecz ta kopalnia jest jak najbardziej bezpieczna - zakup ją by się przekonać.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine8" value="8"><input type="submit"class = "col-5" name="mine8" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopdiamenty.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />diamentów</h3><p>Wymóg: 3000 monet, 400 srebra, 60 złota</p><p>Nagroda: 1-5 diamentów dziennie</p></div></div><div class="description col-12"><p>Uhhh... diamenty to kamienie, których poszukiwania mają szczególny wymiar, dlatego by maksymalnie zwiększyć wydobycie, wykup kopalnię i zacznij poszukiwania.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine9" value="9"><input type="submit"class = "col-4" name="mine9" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopsrebro.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />srebra</h3><p>Wymóg: 4000 monet</p><p>Nagroda: 20 - 100 uncji srebra dziennie</p></div></div><div class="description col-12"><p>Kupujesz starą kopalnię miedzi, lecz można znaleźć tu wiele srebra, lub tez nie, ale to jest właśnie ryzyko, które musisz podjąć pozyskując tą kopalnię, ale pamiętaj, że srebro będzie ci bardzo potrzebne.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine10" value="10"><input type="submit"class = "col-4" name="mine10" value="Zakup kopalnie!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/kopzloto.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Kopalnia<br />złota</h3><p>Wymóg: 6000 monet</p><p>Nagroda: 5 - 30  uncji złota dziennie</p></div></div><div class="description col-12"><p>Każdy słyszał o gorączce złota, lecz teraz będzie ci to dane przeżyć, kupując kopalnię tego najszlachetniejszego metalu, lecz pamiętaj szczęśce ci może nie dopisać i możesz nieźle się wzbogacić.</p><form action="../controllers/mines.php" method="post"><input type="hidden" name="mine11" value="11"><input type="submit"class = "col-4" name="mine11" value="Zakup kopalnie!"></form><br /></div></div></div>

			</div>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
