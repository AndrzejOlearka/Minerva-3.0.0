<!--expeditions subpage - main view-->
<!--zakładka ekspedycje - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-admin.css">
	<link rel="stylesheet" href="../public/style/style-stats.css">

</head>

<body>

	<header>

		<h1>MinervA</h1>

	</header>

	<main>

		<div class="container-fluid">

			<header>

				<h1>Panel Administratora</h1>

			</header>

			<nav class="row">
				<div class="col-6 col-sm-4 col-lg-2 offset-3 offset-sm-4 offset-lg-5 "><a href="../controllers/logout.php"><p>Wylogowanie</p></a></div>
			</nav>

			<nav class="row">
				<div id="admin1" class="col-6 col-sm-4 col-lg-2 offset-3 offset-sm-4 offset-lg-3"><p>Gracze</p></div>

				<div id="admin2"  class="col-6 col-sm-4 col-lg-2 offset-3 offset-sm-4 offset-lg-0"><p>Wyszukiwarka</p></div>

				<div id="admin3"  class="col-6 col-sm-4 col-lg-2 offset-3 offset-sm-4 offset-lg-0"><p>Moderatorzy</p></div>
			</nav>

			<div id="adminPlayers">

				<div id="banning"></div>

				<?php

					$admin->getAllPlayers();

				?>
				<br /><br />

			</div>

			<div id="adminSearch">

				<h2>Wyszukaj gracza:</h2>

				<div class="row">
					<div class="search col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
							<input type="text" id="searchInput" class="col-10 offset-1" name="nick">
							<input type="submit"  class="col-4"  value="szukaj!">
						</form>
					</div>
				</div><br />

			<?php

				if(isset($_POST['nick'])){
					$searchUser->searchUser();
				}

			?>

			</div>

				<div id="adminModerators">
				
				<?php if(isset($_SESSION['admin'])) : ?>
					<h2>Dodaj moderatora:</h2>				
					<div class="row">
						<div class="search col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
							<form action ="../controllers/admin.php" method="post">
								<input type="text" id="searchInput" class="col-10 offset-1" name="moderator">
								<input type="submit"  class="col-4"  value="dodaj!">
							</form>
						</div>
					</div><br />
				<?php endif;?>
				
				<?php

					if(isset($_POST['moderator'])){
						$admin->addModerator();
					}
					
					$admin->showModerators();
				?>

			</div>

		</div>

	</main>


	<script src="../public/javascript/show-admin.js"></script>
	<script src="../public/javascript/admin-ajax.js"></script>
</body>
