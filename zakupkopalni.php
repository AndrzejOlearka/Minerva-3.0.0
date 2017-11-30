
<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once "connect.php";
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$userName = $_SESSION['user'];
	$query = "SELECT * FROM minerva WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	$ekwipunek = $rezultat->fetch_assoc();

	function WymaganiaZakupuKopalni($numerKolumny, $monetyZakupu, $zlotoZakupu, $srebroZakupu, $rodzajKopalni)
	{
		require "connect.php";
		$userName = $_SESSION['user'];
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		$query = "SELECT * FROM minerva WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		$ekwipunek = $rezultat->fetch_assoc();
		$liczbaKopalni = $ekwipunek[$numerKolumny];
		$newLiczbaKopalni = $liczbaKopalni +1;
		$newMonetyZakupu = $ekwipunek['monety'] - $monetyZakupu;
		$newZlotoZakupu = $ekwipunek['zloto'] - $zlotoZakupu;
		$newSrebroZakupu = $ekwipunek['srebro'] - $srebroZakupu;
		if($ekwipunek['level']<10)
		{
			$_SESSION['bladLevela']='<span style="color:red"><br />Nie osiągnąłeś wystarczającego poziomu, by móc kupić kopalnię!</span>';	
			header('Location: kopalnie.php');			
			exit();
		}
		else 
		{			
			if($ekwipunek['monety']<$monetyZakupu)
			{
				$_SESSION['bladMonet']='<span style="color:red"><br />Nie masz wystarczająco monet by zakupić kopalnię!</span>'.'<br>';
				header('Location: kopalnie.php');	
				exit();
			}
			else
			{
				if($ekwipunek['zloto']<$zlotoZakupu)
				{
					$_SESSION['bladZlota']='<span style="color:red"><br />Nie masz wystarczająco zlota by zakupić kopalnię!</span>'.'<br>';
					header('Location: kopalnie.php');	
					exit();
				}
				else
				{
					if($ekwipunek['srebro']<$srebroZakupu)
					{
						$_SESSION['bladSrebra']='<span style="color:red"><br />Nie masz wystarczająco srebra by zakupić kopalnię!</span>'.'<br>';
						header('Location: kopalnie.php');	
						exit();
					}
					else
					{
						$query = "UPDATE minerva SET $numerKolumny  = $newLiczbaKopalni WHERE user = '$userName'";
						$rezultat = $polaczenie->query($query); 
						$query = "UPDATE minerva SET monety = $newMonetyZakupu WHERE user = '$userName'";
						$rezultat = $polaczenie->query($query); 
						$query = "UPDATE minerva SET zloto = $newZlotoZakupu WHERE user = '$userName'";
						$rezultat = $polaczenie->query($query); 
						$query = "UPDATE minerva SET srebro = $newSrebroZakupu WHERE user = '$userName'";
						$rezultat = $polaczenie->query($query); 						
						$_SESSION['UdanyZakupKopalni']="Udało ci się zakupić $newLiczbaKopalni kopalnię $rodzajKopalni!"."<br>";
						header('Location: kopalnie.php');	
						exit();
					}
				}
			}
		}
	}
	
if(isset($_POST['kopalnia1'])) {WymaganiaZakupuKopalni('kopalnia1', 1000, 20, 200, 'bursztynów');}
else if(isset($_POST['kopalnia2'])) {WymaganiaZakupuKopalni('kopalnia2', 1200, 25, 220, 'agatów');}
else if(isset($_POST['kopalnia3'])) {WymaganiaZakupuKopalni('kopalnia3', 1400, 30, 240, 'malachitów');}
else if(isset($_POST['kopalnia4'])) {WymaganiaZakupuKopalni('kopalnia4', 1600, 35, 260, 'turkusów');}
else if(isset($_POST['kopalnia5'])) {WymaganiaZakupuKopalni('kopalnia5', 1800, 40, 280, 'ametystów');}
else if(isset($_POST['kopalnia6'])) {WymaganiaZakupuKopalni('kopalnia6', 2000, 45, 300, 'topazów');}
else if(isset($_POST['kopalnia7'])) {WymaganiaZakupuKopalni('kopalnia7', 2500, 50, 350, 'szmaragdów');}
else if(isset($_POST['kopalnia8'])) {WymaganiaZakupuKopalni('kopalnia8', 2500, 50, 350, 'rubinów');}
else if(isset($_POST['kopalnia9'])) {WymaganiaZakupuKopalni('kopalnia9', 2500, 50, 350, 'szafirów');}
else if(isset($_POST['kopalnia10'])) {WymaganiaZakupuKopalni('kopalnia10', 3000, 60, 400, 'diamentów');}
else if(isset($_POST['kopalnia11'])) {WymaganiaZakupuKopalni('kopalnia11', 4000, 0, 0, 'srebra');}
else if(isset($_POST['kopalnia12'])) {WymaganiaZakupuKopalni('kopalnia12', 6000, 0, 0, 'złota');}
	
?>

