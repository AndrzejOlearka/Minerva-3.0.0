<!--account subpage - main view-->
<!--zakładka Konto - widok ogólny-->

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
					<a href="../controllers/account.php"><p>Konto</p></a>
				</div>

			</div>

			<br /><br />

			<h1>Witaj <?php echo $_SESSION['user']; ?> !</h1>

		<?php

		$accountSession->accNickChangedSuccess();
		$accountSession->accNickErrorLength();
		$accountSession->accNickErrorSigns();
		$accountSession->accNickErrorIdentical();

		for($i = 1; $i < 11; $i++){
			$advance->advance($i);
		}		
		
		?>

			<br /><h2>Prześledź swój poziom, doświadczenie oraz stan monet!</h2><br />


			<div class="row prem">
				<div class="data col-4 col-lg-2 offset-lg-2"><h2>Level</h2></div>
				<div class="data col-4 col-lg-3"><h2>Exp</h2></div>
				<div class="data col-4 col-lg-3"><h2>Monety</h2></div>
				<div class="w-100"></div>
				<div class="data col-4 col-lg-2 offset-lg-2"><p><?=DataUser::check('level');?></p></div>
				<div class="data col-4 col-lg-3"><p><?=DataUser::check('exp');?></p></div>
				<div class="data col-4 col-lg-3"><p><?=DataUser::check('coins');?></p></div>
			</div>

			<br /><h2>Zobacz ile zostało ci premium oraz przedłuż je!</h2>

			<div class="row prem">
				<div class="data col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2"><h2 id="premiumEdit"><?=$premiumTime;?></h2></div>
			</div>
			<br />

				<div id="premium">
					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3"><p>3 dni</p></div>
						<div class="data col-6 col-sm-4 col-lg-2"><p>9,99 zł</p></div>
						<div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
							<p><input type="button" class ="buttonPremium col-3" name="premium"  data-premium="1" value="Zakup!"></p>
						</div>
					</div>

					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3"><p>7 dni</p></div>
						<div class="data col-6 col-sm-4 col-lg-2"><p>18,99 zł</p></div>
						<div class="data col-8 col-sm-4 col-lg-2 offset-2 offset-sm-0">
							<p><input type="button" class ="buttonPremium col-3" name="premium"  data-premium="2" value="Zakup!"></p>
						</div>
					</div>

					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3"><p>14 dni</p></div>
						<div class="data col-6 col-sm-4 col-lg-2"><p>29,99 zł</p></div>
						<div class="data col-8 col-sm-4 col-lg-2 offset-2 offset-sm-0">
							<p><input type="button" class ="buttonPremium col-3" name="premium"  data-premium="3" value="Zakup!"></p>
						</div>
					</div>
				</div>
				<br />

				<h2>Zobacz ile masz monet, jak zbyt mało to dokup!</h2>

				<div class="row prem">
					<div class="data col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
						<h2 id="coinsEdit">Posiadasz w tej chwili <?=DataUser::check('coins');?> monet, <span style='color: gold'>Wykup ich więcej!</span></h2>
					</div>
				</div>

				<br />

				<div id="coins">
					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3">
							<p>100 monet</p></div><div class="data col-6 col-sm-4 col-lg-2"><p>9,99 zł</p></div>
							<div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
								<p><input type="button" class ="buttonPremium col-3" name="coins"  data-coins = "1" value="Zakup!"></p>
							</div>
					</div>

					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3">
							<p>250 monet</p></div><div class="data col-6 col-sm-4 col-lg-2"><p>18,99 zł</p></div>
							<div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
								<p><input type="button" class ="buttonPremium col-3" name="coins"  data-coins = "2" value="Zakup!"></p>
							</div>
					</div>

					<div class="row prem">
						<div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3">
							<p>500 monet</p></div><div class="data col-6 col-sm-4 col-lg-2"><p>29,99 zł</p></div>
							<div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
								<p><input type="button" class ="buttonPremium col-3" name="coins"  data-coins = "3" value="Zakup!"></p>
							</div>
					</div>
				</div>

				<br />

				<h2>Chyba, że chcesz zmienić nick...</h2>

				<div class="row prem">
					<div class="edit row col-12 col-sm-8 col-lg-6 offset-sm-2 offset-lg-3">
						<div class="col-12"><form action="../controllers/account-edit.php" method="post" class="row">
							<input type="submit" name="editName" value="Zmień nick!"  class="col-10 col-sm-6 offset-1 offset-sm-3"></form>
						</div>
					</div>
				</div>

				<br />

				<h2>... lub usunąć konto</h2>

				<div class="row prem">
					<div class="edit row col-12 col-sm-8 col-lg-6 offset-sm-2 offset-lg-3">
						<div class="col-12">
							<form action="../controllers/account-edit.php" method="post" class="row">
								<input type="submit" name="deleteAccount" value="Usuń konto!" class="col-10 col-sm-6 offset-1 offset-sm-3">
							</form>
						</div>
					</div>
				</div>

<?php require 'partials/footer.php'; ?>

		</div>

	</main>

		<script src="../public/javascript/show-premium.js"></script>

</body>
