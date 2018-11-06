<?php
session_start();

if(isset($_SESSION['logged'])){
	header('Location: equipment.php');
}
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
		
			<header>
				
				<br /><h1>Gra przeglądarkowa z kryształami w tle...</h1>
				
			</header>	
			
					<?php	
		
		if(isset($_SESSION['deleted_account'])){
			echo $_SESSION['deleted_account'];
			unset ($_SESSION['deleted_account']);
			session_unset();
		} 

		?>
			
			
			<header>
				
				<br /><h1> Zaloguj się lub zarejestruj i rozpocznij przygodę z Minervą!</h1>
				
			</header>		
			
			<div class="sign md-4">
			
				<div class="col-10 col-sm-5 col-lg-3 offset-1 offset-lg-3 pl-2 pr-0 pr-sm-2 pr-lg-3" style="float:left;"><a href="login.php"><p>Logowanie</p></a></div>
				<div class="col-10 col-sm-5 col-lg-3 offset-1 offset-sm-0 pl-2 pr-0 pr-sm-2 pr-lg-3" style="float:left;"><a href="registration.php"><p>Rejestracja</p></a></div>
					</div>

				
				
				<br /><br /><br /><div><h1>Prześledż również samouczek, by poznać grę od podszewki!</h1></div>
				
								
			<div class="row sign md-4">
				
					<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="tutorial.php"><p>Samouczek</p></a></div><br />
		
			</div><br />
			
<?php require 'partials/footer.php'; ?>			
				
		</div>
	
	</main>	


</body>