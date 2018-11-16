<!--subpage of guilds subpage - main view-->
<!--podstrona zakładki Gildie - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-guilds.css">

</head>

<body>

<?php require 'partials/main-header.php'; ?>

	<main>

		<div class="container-fluid">

<?php require 'partials/nav-main_logged.php'; ?>

<?php require 'partials/nav-ingame_logged.php'; ?>

			<header>

				<h1>Dołącz do gildii i poszerzaj swoje horyzonty!</h1>

			</header>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="guilds.php"><p>Gildie</p></a>
				</div>

			</div>

			<br /><br />

			<h1>Witaj <?php echo $_SESSION['user'];?> !</h1>

			<br />

			<h2>Załóż własną gildię i stwórz potęgę!</h2>

			<br />

			<?php

			$guildsSession->guildsErrorGuildnameLength();
			$guildsSession->guildsErrorGuildnameIdentical();
			$guildsSession->guildsErrorGuilddescribe();
			$guildsSession->guildsErrorFormInputs();
			$guildsSession->guildsSuccessGuildAdded();

			?>

			<div class="row">
				<form method="post" class="createGuild col-lg-6 offset-3" action="guilds-creating.php" enctype="multipart/form-data">
					<div class="row">
						<label for "guildName" class="col-lg-6">Nazwa Gildii: </label>
						<input type="text" name="guildName"class="col-lg-5"/>
					</div><br />
					<div class="row"><label for "guildDescription" class="col-lg-6">Opis gildii: </label>
						<input type="text" name="guildDescription"class="col-lg-5"/>
					</div><br />
					<div class="row"><label for "avatar" class="col-lg-6">Wybierz avatar gildii: </label>
						<input type="file" name="guildAvatar"class="col-lg-5"/>
					</div><br /> 
					<input type="submit" name ="submit" class="col-4" value="Stwórz gildię!" />
				</form><br />
			</div>

			<br />

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
