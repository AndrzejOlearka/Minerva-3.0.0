<!--subpage of account subpage - main view-->
<!--podstrona zakładki Konto - widok ogólny-->

<!DOCTYPE html>
<html lang="pl">
<head>

<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="../public/style/style-account.css">

</head>

<body>
<?php require 'partials/main-header.php'; ?>

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
							<form action="../controllers/account-edit.php" method="post" class="row">
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
							<div class="error col-12">Czy na pewno chcesz usunąć konto <?= $_SESSION['user']; ?> ?</div>
							<form action="../controllers/account-edit.php" method="post" class="row">
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
