<?php
session_start();
require_once 'sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>
	
</head>

<body>

	<header>
	
		<h1>MinervA</h1>
	
	</header>

	<main>	
		
		<div class="container-fluid">
		
<?php require 'partials/nav-main_unlogged.php'; ?>
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="login.php"><p>Logowanie</p></a></div>
				
			</div>
				
			<header>
				
				<br /><h1> Zaloguj się i rozpocznij przygodę z Minervą!</h1>
				
			</header>	
				
			<form action="login-server.php" method="post" class="row form_registration col-10 col-sm-10 col-lg-6 offset-1 offset-sm-1 offset-lg-3 mb-5">
				
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
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>