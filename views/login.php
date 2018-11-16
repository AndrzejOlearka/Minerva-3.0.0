<!--login subpage - main view-->
<!--zakładka logowanie- widok ogólny-->

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

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="login.php"><p>Logowanie</p></a>
				</div>

			</div>

			<header>

				<br /><h1> Zaloguj się i rozpocznij przygodę z Minervą!</h1>

			</header>

			<form action="../controllers/login.php" method="post" class="row form_registration col-10 col-sm-10 col-lg-6 offset-1 offset-sm-1 offset-lg-3 mb-5">

				<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Login:</div>
				<div class="form_registration_input col-sm-6 col-lg-6"><input type="text" name="login"/></div>

				<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
				<div class="form_registration_input col-sm-6 col-lg-6"><input type="password" name="password"/></div>
				<?php $loginFormSessions->logWrongLoginData();?>

				<div class="form_registration_title col-12 col-sm-6 col-lg-4 offset-sm-3 offset-lg-4"><input type="submit" value="Zaloguj!"/></div>
				<?php $loginFormSessions->logEmptyInputs();?>

			</form>


				<h1>Nie jesteś zarejestrowany? Zrób to natychmiast!</h1>

				<div class="row sign md-4">

					<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="registration.php"><p>Rejestracja</p></a></div>

			</div>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>
	
</body>
