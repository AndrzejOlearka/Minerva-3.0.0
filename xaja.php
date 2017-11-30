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

	function Monety($mineral, $nr, $cena)
	{
		require "connect.php";
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		$userName = $_SESSION['user'];
		$query = "SELECT * FROM minerva WHERE user = '$userName'";	
		$rezultat = $polaczenie->query($query); 
		$ekwipunek = $rezultat->fetch_assoc();		
		if (is_numeric($_POST["insert$nr"]) == false)
		{
			$_SESSION['bladint'] ='<span style="color:red"><h1>Nie możesz sprzedać litery... co nie? Wpisz liczby!</h1></span>';
			header('Location: gra.php');
			exit();
		}
		else
		{
			$s[$mineral] = $_POST["insert$nr"];
				if ($_POST["insert$nr"] > $ekwipunek[$mineral])
			{
				$_SESSION['bladSprzedazy']='<span style="color:red"><h1>Nie posiadasz tyle kamieni!</h1></span>';
				header('Location: gra.php');
				exit();
			}
			else
			{
				if(($_POST["insert1"]) == 0)
				{
				$_SESSION['bladzero'] ='<span style="color:red"><h1>Nie możesz sprzedać zera!</h1></span>';
				header('Location: gra.php');
				exit();
				}
				else
				{
					$monety[$mineral] = $s[$mineral]*$cena;
					$newMonety = $monety[$mineral]+$ekwipunek['monety'];
					$query = "UPDATE minerva SET monety = $newMonety WHERE user = '$userName'";
					$rezultat = $polaczenie->query($query); 
					$new[$mineral] = $ekwipunek[$mineral] - $s[$mineral];
					$query = "UPDATE minerva SET $mineral = $new[$mineral] WHERE user = '$userName'";
					$rezultat = $polaczenie->query($query); 
					$_SESSION["monety$mineral"] = $monety[$mineral];
					header('Location: gra.php');
					exit();
					$polaczenie->close();
				}
			}
		}
	}
	
	if((isset($_POST['submit1'] )))
	{Monety('bursztyny', '1', 1);}
	else if((isset($_POST['submit2'])))
	{Monety('agaty', '2', 2);}	
	else if((isset($_POST['submit3'])))
	{Monety('malachity', '3', 3);}		
	else if((isset($_POST['submit4'])))
	{Monety('turkusy', '4', 5);}		
	else if((isset($_POST['submit5'])))
	{Monety('ametysty', '5', 10);}		
	else if((isset($_POST['submit6'])))
	{Monety('topazy', '6', 20);}	
	else if((isset($_POST['submit7'])))
	{Monety('szmaragdy', '7', 50);}	
	else if((isset($_POST['submit8'])))
	{Monety('rubiny', '8', 100);}	
	else if((isset($_POST['submit9'])))
	{Monety('szafiry', '9', 200);}	
	else if((isset($_POST['submit10'])))
	{Monety('diamenty', '10', 500);}	
	else if((isset($_POST['submit11'])))
	{Monety('srebro', '11', 20);}	
	else if((isset($_POST['submit12'])))
	{Monety('zloto', '12', 100);}		

$polaczenie->close();
?>

