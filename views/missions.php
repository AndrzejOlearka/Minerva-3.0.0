<?php

// zakładka misje - widok główny
// subpage missions - main view

?>

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

<?php require 'partials/nav-ingame_logged.php'; ?>

			<header>

				<h1>Wykonaj dostępne misje i zdobądź trochę doświadczenia!</h1>

			</header>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="missions.php"><p>Misje</p></a>
				</div>

			</div>

			<br /><br />

			<h1>Witaj <?php echo $_SESSION['user'];?> !</h1>

			<br />

			<h2>Prześledz dostępne misje i zorientuj się, którą możesz wykonać!</h2>

			<br />

			<?php
			$missionSession->misSessionLowAmountFirst();
			$missionSession->misSessionLowAmountSecond();
			$missionSession->misSessionCompleted();
			?>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja1.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Złodziejaszka Max</h3><p>Wymóg: <br />50 kryształów<br />1 diament</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Max jest znanym w okolicy złodziejem, lecz jego on sam siebie tak nie nazywa, karze na siebie mówić "kanciarz"... dziwne bo brzmi prawie tak samo. Musisz dostarczyć mu ponad 50 kryształów i 1 diament, by mógł okantować swoją kolejną ofiarę.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission0" value="Wykonaj misje!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja2.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Królewski kowal</h3><p>Wymóg: <br />3 morganity<br />6 rubinów</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Znany kowal chce stworzyć wierną replikę korony króla Avatrisu. Żeby móc odwzorować ten przedmiot potrzebuje wiele różnych kamieni, lecz najtrudniej zdobyć mu rubiny i morganity, których potrzebuje do udekorowania korony, widać, że król lubił czerwień i królewską purpurę.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission1" value="Wykonaj misje!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja3.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Robótki Doris</h3><p>Wymóg: <br />20 agatów<br />20 pereł</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Doris to kobieta zamieszkująca stary pałacyk obok lasów Gorundy, lubi tworzyć własnoręczne naszyjniki, bransoletki i inne fanty. Odkąd nie może chodzić szuka osób, które dostarczyłyby jej klejnoty do domu, a płaci ponoć bardzo dobrze, tym razem chce zrobić perłowy naszyjnik z agatami.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission2" value="Wykonaj misje!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja4.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Legendarny jubiler</h3><p>Wymóg: <br />4 fluoryty<br />2 szafiry</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Olimp jest poważanym jubilerem, jego cała rodzina zajmowałą się poszukiwaniami kryształów w górach i bagnach Avatrisu, lecz on zajmował się jubilerstwem. Niestety został sam. Specjalizuje się w szafirowych pierścionkach zaręczynowych, a kolejny ma być  wyjątkowy.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission3" value="Wykonaj misje!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja5.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Mistyk Stefan</h3><p>Wymóg: <br />5 akwamarynów<br />4 szmaragdy</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Ponoć szmaragdy z akwamarynami jak zostaną złączane, wydobywa się z nich jakaś nieziemska energia... przynajmniej tak twierdzi mistyk Stefan i potrzebuje on trochę tych minerałów. Wygląda na to, że jednak jego próby są na marne, bo wciąż wykazuje zapotrzebowanie.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission4" value="Wykonaj misje!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja6.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Fizyk Damian</h3><p>Wymóg: <br />8 cymofanów<br />20 topazów</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Fizycy lubią bawić się z optyką jaką można się zabawić na cymofanach, dodatkowo podobne są beżowe topazy, coś w nich widza, dlatego co chwile ogłaszają się o chęć ich zakupu. Nie płacą może zbyt dużo, ale może odkryją coś sensownego, dlatego warto im pomóc.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission5" value="Wykonaj misje!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja7.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Ceramiczne Ściany</h3><p>Wymóg: <br />40 opali<br />40 turkusów</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Na Gorundzie ostatnio bardzo popularne są ściany z płytkami ceramicznymi, ale nie byle jakimi bo z kawałkami mozaikowych turkusów i opali. Niby można je zastąpić sztucznymi, ale bogaczy stać na naturalne, które zresztą na pierwszy rzut oka zawsze da się rozpoznać.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission6" value="Wykonaj misje!"></form><br /></div></div></div>

				<div class="col-12 col-lg-6 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja8.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Czarownicy pies</h3><p>Wymóg: <br />2 painity<br />6 ametystów</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Lokalna emerytowana lekarka, która niegdyś straciła dziecko w pożarze, zgłasza zapotrzebowanie na rzadkie painity i kryształy ametystów, sąsiedzi twierdzą, że dokonuje na nich jakiś zaklęć, aby rozmawiać ze zmarłym dzieckiem... ciężko stwierdzić, ale warto sprzedać.</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission7" value="Wykonaj misje!"></form><br /></div></div></div>

			</div>

			<div class="row">

				<div class="col-12 col-lg-6 offset-lg-3 mb-5"><div class="expeditions"><div class="row no-gutters"><div class="photo col-sm-6 "><img src="../public/img/misja9.jpg"></div><div class="values col-12 col-sm-5 offset-sm-1"><h3>Szamańskie Wierzenia</h3><p>Wymóg: <br />6 jadeitów<br />6 malachitów</p><p>Nagroda: 5000 pkt doświadczenia</p></div></div><div class="description col-12"><p>Chińscy lekarze i znachorzy zawsze powtarzali, że jadeity mają ogromną moc leczenia chorób i dają dobrą energię. Niestety trudno dostać te kamienie, dlatego lokalni szamanie zastępują je zaczarowanymi malachitami, lecz jadeit musi być...</p><form action="../controllers/missions.php" method="post"><input type="submit"class = "col-4" name="mission8" value="Wykonaj misje!"></form><br /></div></div></div>

			</div>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
