<?php

// podstrona zakładki konto - pozwalająca na edytowanie dane konta
// tab od subpage account that allows to edit account data


session_start();
require_once "account-server.php";

if(!isset($_SESSION['logged'])){
	header('Location: login.php');
}

$updateLevel = require_once "level-update-server.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="style/style-account.css">

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

				<h1> Prześledź swoje osiagnięcia i przedłuż premium!</h1>

			</header>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
					<a href="account.php"><p>Konto</p></a>
				</div>

			</div>

			<br /><br />

			<?php if(isset($_POST['editName'])): ?>

				<div class="row prem">
					<div class="edit row col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
						<div class="col-12">
							<form action="account-edit-server.php" method="post" class="row">
								<input type="text" name="nick" class="col-10 col-sm-6 offset-1 offset-sm-3">
								<input type="submit" name="editNick" value="Zmień Nick!"  class="col-10 col-sm-6 offset-1 offset-sm-3">
							</form>
						</div>
					</div>
				</div>

			<?php endif; ?>

			<?php if(isset($_POST['deleteAccount'])): ?>

				<div class="row prem">
					<div class="edit row col-12 col-sm-8 col-lg-6 offset-sm-2 offset-lg-3">
						<div class="col-12">
							<form action="account-edit-server.php" method="post" class="row">
								<div class="error col-12"><p>Czy na pewno chcesz usunąć konto <?= $_SESSION['user']; ?> ?</p></div>
								<input type="submit" name="deleteNick" value="Usuń konto!"  class="col-10 col-sm-6 offset-1 offset-sm-3">
							</form>
						</div>
					</div>
				</div>

			<?php endif; ?>

				</div>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

		<script src="../Minerva/javascript/show-premium.js"></script>

</body>
