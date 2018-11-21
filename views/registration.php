<!--registration subpage - main view-->
<!--zakładka rejestracja - widok ogólny-->

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

			<?php require 'partials/nav-ingame_logged.php'; ?>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="registration.php"><p>Rejestracja</p></a></div>

			</div><br />

			<header>

				<h1> Zarejestruj się by móc brać udział w poszukiwaniach!</h1>

			</header>

			<?php if(!isset($_SESSION['registration_succesful'])): ?>
			
			</div>
				<form action="../controllers/registration.php" method="post" class="row form_registration col-10 col-sm-10 col-lg-6 offset-1 offset-sm-1 offset-lg-3 mb-5">

					<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Nickname:</div>
					<div class="form_registration_input col-sm-6 col-lg-6"><input type="text" name="nick"/></div>
					<?php $registrationFormSession->regNickLength();?> 
					<?php $registrationFormSession->regNickSigns();?>

					<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">E-mail:</div>
					<div class="form_registration_input col-sm-6 col-lg-6"><input type="email" name="email"/></div>
					<?php $registrationFormSession->regEmailValid();?>
					<?php $registrationFormSession->regEmailExist();?>

					<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
					<div class="form_registration_input col-sm-6 col-lg-6"><input type="password" name="password"/></div>
					<?php $registrationFormSession->regPasswordLength();?>

					<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
					<div class="form_registration_input col-sm-6 col-lg-6"><input type="password" name="password2"/></div>
					<?php $registrationFormSession->regPasswordEqual();?>

					<div class="form_registration_title col-12 col-sm-6 col-lg-4 offset-sm-3 offset-lg-4">
					<input type="submit" name="register" value="Rejestruj!"/></div>
					<?php $registrationFormSession->regEmptyInputs();?>

					</form>
				</div>

				<?php else: ?>

				<div class="registrationDone col-10 col-sm-10 col-lg-6 offset-1 offset-sm-1 offset-lg-3 mb-5">
					<div class='success col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>Rejestracja zakończyła się sukcesem, możesz się zalogować i grać!</div>
				</div>

				<?php
					endif;
					unset($_SESSION['registration_succesful']);
				?>

				<h1> A teraz zaloguj się i rozpocznij przygodę!</h1>

				<div class="row sign md-4">

					<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
						<a href="login.php"><p>Logowanie</p></a>
					</div>

				</div><br />

			<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
