<!--statistics subpage - main view-->
<!--zakładka statystyki - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-stats.css">
	
</head>

<body>

	<?php require 'partials/main-header.php'; ?>

	<main>	
		
		<div class="container-fluid">
		
<?php require 'partials/nav-main_unlogged.php'; ?>

			<?php if(isset($_SESSION['logged'])): ?>
<?php require 'partials/nav-ingame_logged.php'; ?>
			<?php endif; ?>			
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<p>Statystyki</p>
				</div>
				
			</div>
				
			<header>
				
				<br /><h1> Zobacz statystyki Minervy!</h1>
				
			</header>	

			<h2>A może chcesz poszukać jakiegoś gracza?</h2>
			
		<div class="row">
			<div class="search col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
				<form action ="../controllers/statistics.php" method="post">
					<input type="text" id="searchInput" class="col-10 offset-1" name="nick">
					<input type="submit"  class="col-4"  value="szukaj!">
				</form>
			</div>	
		</div>
		

<?php 

if(isset($_POST['nick'])){
	$statistics->searchUser();
}

$statisticsSession->searchUserError();

?>
		<br /><br /><h1> Statystyki graczy: </h1>


		<h2> Najbardziej doświadczeni gracze:</h2>
<?php
$statistics->statsExp();
?>

		<br /><h2> Najbogatsi gracze:</h2><br />
		
<?php
$statistics->statsCoins();	
?>		

		<br /><h2> Najlepsze gildie:</h2><br />
		
<?php
$statistics->statsGuilds();	
?>		
			
<?php require 'partials/footer.php'; ?>

		<br /><br />
		</div>
	
	</main>	

</body>