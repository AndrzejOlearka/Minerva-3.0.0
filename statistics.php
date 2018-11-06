<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="style/style-stats.css">
	
</head>

<body>

	<header>
	
		<h1>MinervA</h1>
	
	</header>

	<main>	
		
		<div class="container-fluid">
		
<?php require 'partials/nav-main_unlogged.php'; ?>

			<?php if(isset($_SESSION['logged'])): ?>
<?php require 'partials/nav-ingame_logged.php'; ?>
			<?php endif; ?>			
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Statystyki</p></div>
				
			</div>
				
			<header>
				
				<br /><h1> Zobacz statystyki Minervy!</h1>
				
			</header>	

			<h2>A może chcesz poszukać jakiegoś gracza?</h2>
			
		<div class="row">
			<div class="search col-4 offset-4"><form action ="statistics.php" method="post"><input type="text" id="searchInput" class="col-4" name="nick"><input type="submit"  class="col-4"  value="szukaj!"></form></div>	
		</div>
		

<?php 
require_once "statistics-server.php";

if(isset($_SESSION['no_nick_error'])){
echo $_SESSION['no_nick_error'];
unset($_SESSION['no_nick_error']);}

?>
		<br /><br /><h1> Statystyki graczy: </h1>


		<h2> Najbardziej doświadczeni gracze:</h2>
<?php
$statExp = new Stats;
$statExp->statsExp();
?>

		<br /><h2> Najbardziej bogaci gracze:</h2><br />
		
<?php
$statCoins = new Stats;
$statCoins->statsCoins();	
?>		

		<br /><h2> Najlepsze gildie:</h2><br />
		
<?php
$statCoins = new Stats;
$statCoins->statsGuilds();	
?>		
			
<?php require 'partials/footer.php'; ?>

		<br /><br />
		</div>
	
	</main>	

</body>