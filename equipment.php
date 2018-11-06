<?php

// zakładka ekwipunek - widok ogólny
// subpage equipment - main view

session_start();

require_once 'equipment-amount.php';
$updateLevel = require_once "level-update-server.php";

if(!isset($_SESSION['logged'])){
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<?php require 'partials/head-html.php'; ?>

	<link rel="stylesheet" href="style/style-equipment.css">
	<script src="../Minerva/javascript/popup.js"></script>

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

				<h1> Zobacz jakie minerały i kosztowności udało ci się zdobyć!</h1>

			</header>

			<div class="row sign md-4">

				<div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="equipment.php"><p>Ekwipunek</p></a></div>

			</div>

			<br /><br />

			<h1>Witaj <?php echo $_SESSION['user'];?> !</h1>

			<br />

			<h2>Prześledź stan swojej kolekcji, a jeśli chcesz to sprzedaj swoje zasoby!</h2>

			<br />


<?php

	require_once 'sessions/equipment-sessions.php';
	$equipmentSession = new EquipmentSessions();
	$equipmentSession->eqSellSuccess();
	$equipmentSession->eqSellErrorInt();
	$equipmentSession->eqSellErrorAmount();
	$equipmentSession->eqSellErrorZero();

?>

<?php
/*
$equipment = array(
	array('bursztyny.png', 'bursztyny', 'Bursztyny', 'ambers', 1, 0),
	array('agaty.jpg', 'agaty', 'Agaty', 'agates', 2, 1),
);


foreach ($equipment as $equips => $equip){
	echo "<div class='row equipment mt-1'><div class='photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3'><img src='img/{$equip[0]}'></div><div class='name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4' data-popup-open='popup-{$equip[1]}'><p>{$equip[2]}</p></div><div class='name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4'><p>";
	echo amount($equip[3]);
	echo "</p></div><div class='value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4'><p>{$equip[4]} moneta</p></div><div class='sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4'><form method='post action='equipment-server.php'><input type='text' class='col-5 col-lg-4' name='insert{$equip[5]}' placeholder=";
	echo amount($equip[3]);
	echo"><input type='submit' class='col-lg-6 offset-1' value='sprzedaj!'></form></div></div>";
}

*/
?>
			
			
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/bursztyny.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-bursztyny"><p>Bursztyny</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('ambers');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>1 moneta</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert0" placeholder="<?= amount('ambers');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/agaty.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-agaty"><p>Agaty</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('agates');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>2 monety</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert1" class="col-5 col-lg-4" placeholder="<?= amount('agates');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/malachity.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-malachity"><p>Malachity</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('malachites');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>3 monety</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert2" class="col-5 col-lg-4" placeholder="<?= amount('malachites');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/turkusy.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-turquoises"><p>Turkusy</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('turquoises');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>5 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert3" class="col-5 col-lg-4" placeholder="<?= amount('turquoises');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/ametysty.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-ametysty"><p>Ametysty</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('amethysts');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>10 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert4" class="col-5 col-lg-4" placeholder="<?= amount('amethysts');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/topazy.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-topazy"><p>Topazy</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('topazes');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>20 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert5" class="col-5 col-lg-4" placeholder="<?= amount('topazes');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/szmaragdy.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-szmaragdy"><p>Szmaragdy</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('emeralds');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>50 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert6" class="col-5 col-lg-4" placeholder="<?= amount('emeralds');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/rubiny.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-rubiny"><p>Rubiny</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('rubies');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>100 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert7" class="col-5 col-lg-4" placeholder="<?= amount('rubies');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/szafiry.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-szafiry"><p>Szafiry</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('sapphires');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>200 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert8" class="col-5 col-lg-4" placeholder="<?= amount('sapphires');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/diamenty.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-diamenty"><p>Diamenty</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('diamonds');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>500 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert9" class="col-5 col-lg-4" placeholder="<?= amount('diamonds');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/srebro.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-srebro"><p>Srebro</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('silver');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>20 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert10" class="col-5 col-lg-4" placeholder="<?= amount('silver');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/złoto.png"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4" data-popup-open="popup-złoto"><p>Złoto</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('gold');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>100 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" name="insert11" class="col-5 col-lg-4" placeholder="<?= amount('gold');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>

			<br /><br />

		<?php if (!((amount('morganites')) === null) && (amount('morganites')) >= 0):?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/morganit.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Morganity</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("morganites");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>400 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert12" placeholder="<?= amount("morganites");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('fluorites')) === null) && (amount('fluorites')) >= 0):?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/fluoryt.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Fluoryty</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount('fluorites');?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>250 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert13" placeholder="<?= amount('fluorites');?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('opals')) === null) && (amount('opals')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/opal.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Opale</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("opals");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>30 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert14" placeholder="<?= amount("opals");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('jadeites')) === null) && (amount('jadeites')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/jadeit.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Jadeity</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("jadeites");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>1000 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert15" placeholder="<?= amount("jadeites");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('painites')) === null) && (amount('painites')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/painit.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Painity</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("painites");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>650 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert16" placeholder="<?= amount("painites");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('crystals')) === null) && (amount('crystals')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/krysztal.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Kryształy</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("crystals");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>15 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert17" placeholder="<?= amount("crystals");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('aquamarines')) === null) && (amount('aquamarines')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/akwamaryn.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Akwamaryny</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("aquamarines");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>120 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert18" placeholder="<?= amount("aquamarines");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('pearls')) === null) && (amount('pearls')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/perla.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Pearls</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("pearls");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>60 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert19" placeholder="<?= amount("pearls");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

			<?php if (!((amount('cymophanes')) === null) && (amount('cymophanes')) >= 0): ?>
			<div class="row equipment mt-1"><div class="photo col-1 offset-sm-1 offset-md-2 offset-lg-0 mr-lg-3"><img src="img/Cymofan.jpg"></div><div class="name col-7 col-sm-6 col-md-5 col-lg-2 offset-3 offset-md-2 offset-lg-0 mt-4"><p>Cymofany</p></div><div class="name col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p><?= amount("cymophanes");?></p></div><div class="value col-6 col-md-3 col-lg-2 mt-2 mt-lg-4"><p>150 monet</p></div><div class="sell mt-2 mb-3 col-8 col-md-6  offset-2 offset-md-0 col-lg-4 mt-lg-4 "><form method="post" action="equipment-server.php"><input type="text" class="col-5 col-lg-4" name="insert20" placeholder="<?= amount("cymophanes");?>" onfocus="this.placeholder=' ' "><input type="submit"class="col-lg-6 offset-1" value="sprzedaj!"></form></div></div>
			<?php endif; ?>

<!-- popups with minerals description
// okienka wyskakujące z opisem minerałów -->

				<div class="popupEquipment" data-popup="popup-bursztyny"><div class="popupDescription"><h1>~~ Bursztyny ~~</h1><div class="row"><img src="img/bursztyny.png" alt="bursztyny" title="bursztyny" class="col-4"><div class="col-8"><p>Bursztyny jakie znamy to kamienie powstałe w wyniki zastygnięcia żywicy drzew iglastych z czasów prehistorycznych (najstarsze z dewonu). Jak wiadomo ceniony jest on nie tylko w jubilerstwie ale też w medycynie ludowej. Dawniej był często używany jako środek płatniczy. Istnieją bursztyny, które ceną przewyższają kilkukaratowe diamenty!</p></div></div><br /><a data-popup-close="popup-bursztyny" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-agaty"><div class="popupDescription"><h1>~~ Agaty ~~</h1><div class = "row"><img src="img/agat.jpg" alt="agaty" title="agaty" class="col-4"><div class="col-8"><p>Agaty są zawsze pasiaste, a to dlatego, że w minerałach gdzie się tworzyły wydzielała się krzemionka z pigmentem, dlatego też ilość kolorów jest tak zróżnicowana. Mają ogrom zastosowań w zdobieniach, jubilerstwie, ale ostatnio także w przemyśle m.in. w mechanice precyzyjnej.</p></div></div><br /><a data-popup-close="popup-agaty" ><h1>&gt;&gt; powrót &lt;&lt;</h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-malachity"><div class="popupDescription"><h1>~~ Malachity ~~</h1><div class = "row"><img src="img/malachity.png" alt="malachity" title="malachity" class="col-4"><div class="col-8"><p>Najdroższymi malachitami są tzw. kryształy o pokroju słupkowym i do niego podobnym. Malachit często występuje w towarzystwie innych minerałów np. z turkusem. Najczęściej występuje w strefach utleniania złoż miedzi. Minerał ten oprócz jubilerstwa nadaje się także do malarstwa, ponieważ tworzony jest z niego pigment malachitowej zieleni. </p></div></div><br /><a data-popup-close="popup-malachity" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-turquoises"><div class="popupDescription"><h1>~~ turquoises ~~</h1><div class = "row"><img src="img/turquoises.png" alt="turquoises" title="turquoises" class="col-4"><div class="col-8"><p>Nazwa turkusu pochodzi o pańśtwa Turcji, przez to pańśtwo dawniej wiódł szlak handlowy tego minerału z Persji (dzisiejszy Iran) gdzie występują jedne z największych złoż. Pierwiastkiem który działał na niego, a co spowodowało że ma odcień niebieski to żelazo.Trzeba pamiętać na podróbki turkusa, bo można go pozyskiwać syntetycznie.</p></div></div><br /><a data-popup-close="popup-turquoises" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-amethists"><div class="popupDescription"><h1>~~ amethists ~~</h1><div class = "row"><img src="img/amethists.png" alt="amethists" title="amethists" class="col-4"><div class="col-8"><p>Ametyst swój kolor zawdzięcza żelazu oraz promieniowaniu radioaktywnemu. Bardzo znany jest ametyst, który widniał w koronie Katarzyny Wielkiejm, znanej rosyjskiej cesarzowej, a jego największe oszlifowane okazy mają nawet po 300 karatów. Jego historia jest tak dawna, że można o nim przeczytać w mitologiach czy w Biblii.  </p></div></div><br /><a data-popup-close="popup-amethists" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-topazy"><div class="popupDescription"><h1>~~ Topazy ~~</h1><div class = "row"><img src="img/topazy.png" alt="topazy" title="topazy" class="col-4"><div class="col-8"><p>W języku greckim topaz oznaczał ogień i to właśnie od tego minerał ten wziął nazwę, ponieważ najczęściej przybiera pomarańczowo-złotą barwę. Trudno sobie wyobrazić, ale największy topaz wydobyty ważył ponad 5 ton. Oprócz jubilerstwa wykorzystuje się go do produkcji materiałów ogniotrwałych i ściernych.</p></div></div><br /><a data-popup-close="popup-topazy" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-szmaragdy"><div class="popupDescription"><h1>~~ Szmaragdy ~~</h1><div class = "row"><img src="img/szmaragdy.png" alt="szmaragdy" title="szmaragdy" class="col-4"><div class="col-8"><p>Smaragdus w łacinie i grece to kolor zielony, stąd te minerały  mają taką nazwę. W starożytnych kulturach miały jeszcze większe znaczenie niż inne znane dziś droższe kamienie. Szmaragdy potrafią mieć kilka tysięcy karatów. Syntetyczne szmaragdy są jednymi z najbardziej popularnych kamieni jubilerskich.</p></div></div><br /><a data-popup-close="popup-szmaragdy" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-rubiny"><div class="popupDescription"><h1>~~ Rubiny ~~</h1><div class = "row"><img src="img/rubiny.png" alt="rubiny" title="rubiny" class="col-4"><div class="col-8"><p>Rubiny ze względu na swoje właściwości od zawsze były wykorzystywane w mechanice precyzyjnej, elektronice, auytomatyce i przy konstrukcji maszyn  pomiarowych, aczkolwiek w jubilerstwie i tak cenione są najbardziej. Ich czerwony kolor zawdzięczają tlenkowi chromu, wanadowi oraz żelazu. </p></div></div><br /><a data-popup-close="popup-rubiny" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-szafiry"><div class="popupDescription"><h1>~~ Szafiry ~~</h1><div class = "row"><img src="img/szafiry.png" alt="szafiry" title="szafiry" class="col-4"><div class="col-8"><p>Szafiry są bardzo złożonymi związkami chemicznymi, stworzone sa dzięki działalniom żelaza, tytanu, magnezu, wanadu i chromu. Szafir jest także wymieniany w wielu księgach starożytnych, wówczas już był niezwykle ceniony i uważany za magiczny niebiański kamień. Używany jest także w nowoczesnym przemyśle różnego technologii.</p></div></div><br /><a data-popup-close="popup-szafiry" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-diamenty"><div class="popupDescription"><h1>~~ Diamenty ~~</h1><div class = "row"><img src="img/diamenty.png" alt="diamenty" title="diamenty" class="col-4"><div class="col-8"><p>Najbardizej pożądane minerały świata dzisiaj mają wiele zamienników, również syntetycznych. Dlatego też można usłyszeć, że w tarczy do szlifowania znajdować się będzie diament. Największym diamentem oszlifowanym był Cullinan o wielkości 3106 karatów, aczkolwiek został podzielony na częsci. Ahh... jaki on piękny! </p></div></div><br /><a data-popup-close="popup-diamenty" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>

				<div class="popupEquipment" data-popup="popup-srebro"><div class="popupDescription"><h1>~~ Złoto ~~</h1><div class = "row"><img src="img/srebro.png" alt="srebro" title="srebro" class="col-4"><div class="col-8"><p>Srebro w układzie okresowym ma oznakowanie Ag od łacińskiego argentum. Srebro wydobywane jest najczęściej jako domieszka rud innych  metali, głównie miedzi, ołowiu i cynku. Ma bardzo dobre właściwości bakteriobójcze, a jego zastosowanie oprócz jubilerstwa i przemysłu to także fotografia, produkcja paneli słonecznych czy luster. </p></div></div><br /><a data-popup-close="popup-srebro" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a><</div></div>

				<div class="popupEquipment" data-popup="popup-złoto"><div class="popupDescription"><h1>~~ Srebro ~~</h1><div class = "row"><img src="img/złoto.png" alt="złoto" title="złoto" class="col-4"><div class="col-8"><p>Złoto ma symbol Au od łacińskiego aurum.  Nie ulega w ogóle korozji, dlatego jest tak cenny w jubilerstwie, a jego poświata dodaje dodatkowego uroku. Złoto od tysięcy lat ma duża wartość, dlatego używane było do zabezpieczania pieniądza w gospodarce, warto inwestować w złoto, ono nigdy nie straci na wartości.</p></div></div><br /><a data-popup-close="popup-złoto" ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div></div>


<?php require 'partials/footer.php'; ?>

		</div>

	</main>

</body>
