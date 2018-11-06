<?php
session_start();

if(!isset($_SESSION['logged'])){
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="style/style-guilds.css">
	
</head>

<body>

	<header>
	
		<h1>MinervA</h1>
	
	</header>

	<main>	
		
		<div class="container-fluid">
		
<?php require 'partials/nav-main_logged.php'; ?>

<?php require 'partials/nav-ingame_logged.php'; ?>			
		
			<header>
				
				<h1>Dołącz do gildii i poszerzaj swoje horyzonty!</h1>
				
			</header>	
			
			<div class="row sign md-4">
			
				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="guilds.php"><p>Gildie</p></a></div>
				
			</div>
				
			<br /><br />
			
			<h1>Witaj <?php echo $_SESSION['user'];?> !</h1>	
			
			<br />
			
			<h2>Załóż własną gildię i stwórz potęgę!</h2>	
			
			<br />
			
			<?php	
			require 'sessions/guilds-sessions.php';
			$guildsSession = new GuildSessions();
			$guildsSession->createGuildErrorDescribe();
			$guildsSession->createGuildsErrorWrongLevel();
			$guildsSession->createGuildsErrorWrongName();

			require_once "guilds-server.php";				
			if(isset($_POST['guildDescription']) || isset($_POST['guildLeader'])){
				$guilds = new Guild;
				$guilds3 = $guilds->editGuild();
			}

			?>
			
			<div class="row">	
				<form method="post" class="createGuild col-lg-6 offset-3" action="guilds-edit.php">
					<div class="row">	<label for "guilddescribe" class="col-lg-6">Opis gildii: </label><input type="text" name="guildDescription"class="col-lg-5"/></div><br />
					<input type="submit" name ="submit" class="col-4" value="Potwierdź zmiany!" />
				</form><br />
			</div>
			<br />	
			<div class="row">	
				<form method="post" class="createGuild col-lg-6 offset-3" action="guilds-edit.php">
					<div class="row">	<label for "guildleader" class="col-lg-6">Nowy lider: </label><input type="text" name="guildLeader"class="col-lg-5"/></div><br />
					<input type="submit" name ="submit" class="col-4" value="Potwierdź zmiany!" />
				</form><br />
			</div>
			
<?php require 'partials/footer.php'; ?>	
				
		</div>
	
	</main>	

</body>