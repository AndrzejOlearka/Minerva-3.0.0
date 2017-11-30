<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
if(isset($_POST['NagrodaKopalnia']))
{
	
$dataCzas = date('d.m.Y H:i:s');
echo $dataCzas;
$file = fopen('logi.txt', 'a');
fwrite($file, $dataCzas."\r\n");
fclose($file);	

	function CronKopalnie($min, $max, $NazwaMineralow, $NazwaKopalni, $NazwaKolumny)	
	{
		require "connect.php";
		$userName = $_SESSION['user'];
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		$query = "SELECT * FROM minerva WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		$ekwipunek = $rezultat->fetch_assoc();
		$NagrodaDzienna = rand($min, $max);
		$StanMineralow = $ekwipunek[$NazwaMineralow];
		$IloczynKopalni = $ekwipunek[$NazwaKopalni];
		$CalkowitaNagrodaDzienna = $NagrodaDzienna*$IloczynKopalni; 
		$StanMineralowPo = $StanMineralow + $CalkowitaNagrodaDzienna;
		$query = "UPDATE minerva SET $NazwaKolumny = $StanMineralowPo WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 	
		$_SESSION['nagroda'] = "$NagrodaDzienna $NazwaKolumny"." ";
		$polaczenie->close();	
	}	
	
	require_once "connect.php";
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$userName = $_SESSION['user'];
	$query = "SELECT * FROM minerva WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$ekwipunek = $rezultat->fetch_assoc();
	if($ekwipunek['kopalnia1'] > 0){CronKopalnie(200, 400, 'bursztyny', 'kopalnia1', 'bursztyny');}
	$_SESSION['nagroda1'] = $_SESSION['nagroda'];
	if($ekwipunek['kopalnia2'] > 0){CronKopalnie(150, 250, 'agaty', 'kopalnia2', 'agaty');}
	$_SESSION['nagroda2'] = $_SESSION['nagroda'];
	if($ekwipunek['kopalnia3'] > 0){CronKopalnie(120, 200, 'malachity', 'kopalnia3', 'malachity');}
	$_SESSION['nagroda3'] = $_SESSION['nagroda'];
	if($ekwipunek['kopalnia4'] > 0){CronKopalnie(80, 120, 'turkusy', 'kopalnia4', 'turkusy');}
	$_SESSION['nagroda4'] = $_SESSION['nagroda'];
	if($ekwipunek['kopalnia5'] > 0){CronKopalnie(50, 80, 'ametysty', 'kopalnia5', 'ametysty');}
	$_SESSION['nagroda5'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia6'] > 0){CronKopalnie(30, 50, 'topazy', 'kopalnia6', 'topazy');}
	$_SESSION['nagroda6'] = $_SESSION['nagroda'];
	if($ekwipunek['kopalnia7'] > 0){CronKopalnie(16, 24, 'szmaragdy', 'kopalnia7', 'szmaragdy');}
	$_SESSION['nagroda7'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia8'] > 0){CronKopalnie(8, 16, 'rubiny', 'kopalnia8', 'rubiny');}
	$_SESSION['nagroda8'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia9'] > 0){CronKopalnie(4, 8, 'szafiry', 'kopalnia9', 'szafiry');}
	$_SESSION['nagroda9'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia10'] > 0){CronKopalnie(1, 5, 'diamenty', 'kopalnia11', 'diamenty');}
	$_SESSION['nagroda10'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia11'] > 0){CronKopalnie(20, 100, 'srebro', 'kopalnia11', 'srebro');}
	$_SESSION['nagroda11'] = $_SESSION['nagroda'];	
	if($ekwipunek['kopalnia12'] > 0){CronKopalnie(5, 30, 'zloto', 'kopalnia12', 'zloto');}	
	$_SESSION['nagroda12'] = $_SESSION['nagroda'];
	$query = "UPDATE minerva SET nagrodastart = now() + INTERVAL 1 DAY WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$polaczenie->close();	
	header('Location: kopalnie.php');	
	exit();
}
else
{
	header('Location: kopalnie.php');	
	exit();
}
?>

