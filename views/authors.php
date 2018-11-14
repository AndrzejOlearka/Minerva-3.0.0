<?php

// zakładka autorzy - widok ogólny
// subpage authors - main view

session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>

<?php require 'partials/head-html.php'; ?>

</head>

<body>
<?php require 'partials/main-header.php'; ?>

	<main>

		<div class="container-fluid">

			<?php require 'partials/nav-main_unlogged.php'; ?>

		<h1>... ale najpierw poznaj autora Minervy!</h1>

			<div class="row sign md-4">

					<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
						<a href="authors.php"><p>Autorzy</p></a>
					</div><br />

			</div><br />

			<div class="row">

				<div class="authors col-12 col-sm-8 offset-sm-2">
					<h2>Andrzej Olearka</h2>
					<p>
						Ukończyłem studia, jestem magistrem inżynierem logistyki, lecz postanowiłem zacząć programować,
						gdyż nie wiąże przyszłości całkowicie z moim zawodem. Rozpocząłem programować Jeszcze w 2017r.,
						przez 3 miesiące poznałem tajniki HTML, CSS, MySQL, PHP, JAVASCRIPT, JQUERY, BOOTSTRAP
						oraz innych potrzebnych narzędzi by stworzyć Minervę - grę przeglądarkową, która jest moim pierwszym projektem.
						Na początku mój kod był prosty, wszystko oparte o proceduralne programowanie, zero obiektówki,
						jednak zaliczam progres, w październiku 2018r. postanowiłem zmienić design mojej gry, wykorzystując siatkę BOOTSTRAP,
						zmieniłem także mój projekt na bardziej obiektowy i zastosowałem wiele nowych rozwiązań.
					</p>
				</div>

			</div>


<?php require 'partials/nav-ingame_logged.php'; ?>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>


</body>
