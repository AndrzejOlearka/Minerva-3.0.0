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
			
			<h2>Wybierz jedną z dostępnych gildii lub załóż własną!</h2>	
			
			<br />
			
			<div class="createGuilds col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4"><a href="guilds-creating.php"><input type="button" name="guild" value="stwórz nową gildię!"/></a></div><br /><br />
			
			<br />
			
			<h2>Oto lista istniejących obecnie gildii!</h2>	
			
			
			<?php

			require 'sessions/guilds-sessions.php';
			$guildsSession = new GuildSessions();
			$guildsSession->guildsErrorDoubleLeader();
			$guildsSession->guildsGetNewLeader();
			$guildsSession->guildsGetNewDescription();
			$guildsSession->guildsErrorWrongLevel();
			$guildsSession->guildsErrorWrongName();
			$guildsSession->createNewGuildSuccess();
			$guildsSession->deleteGuildSuccess();
			$guildsSession->joinGuildSuccess();
			$guildsSession->leaveGuildSuccess();
			$guildsSession->guildsLowLeaderLevel();
			
			require "guilds-server.php";
			$guilds = new Guild;
			$guilds2 = $guilds->toggleGuild();
			$guilds1 = $guilds->showGuild();		
			
			?>

			<?php require 'partials/footer.php'; ?>		
				
		</div>
	
	</main>	

</body>