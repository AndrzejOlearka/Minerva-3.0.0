<?php
	session_start();
	
	require_once "connect.php";	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$userName = $_SESSION['user'];
	$zadanie = $_POST['zadanie'];

	function StanMonet ($WymaganyLevel, $KosztMonet)
	{
		require "connect.php";
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		$userName = $_SESSION['user'];
		$query = "SELECT monety, level FROM minerva WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 	
		$ekwipunek = $rezultat->fetch_assoc();
		$NewMonety1 = $ekwipunek['monety'] - $KosztMonet;
		$query = "UPDATE minerva SET monety = $NewMonety1 WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		if($ekwipunek['level']<$WymaganyLevel)
		{
			$_SESSION['BrakMonet']='<span style="color:red"><br />Nie osiągnąłeś odpowiedniego levela by móc wykonać tą ekspedycję!</span>';
			exit();	
		}
		if($ekwipunek['monety']<$KosztMonet)
		{
			$_SESSION['BrakMonet']='<span style="color:red"><br />Nie masz wystarczająco monet by rozpocząć zadanie!</span>';
			exit();	
		}
		$polaczenie->close();
	}

if(!isset($_SESSION['BrakMonet']))
{
	if($zadanie == 1) {StanMonet(1, 2);}
	else if($zadanie == 2) {StanMonet(2, 5);}
	else if($zadanie == 3) {StanMonet(3, 10);}
	else if($zadanie == 4) {StanMonet(4, 15);}
	else if($zadanie == 5) {StanMonet(5, 20);}
	else if($zadanie == 6) {StanMonet(6, 50);}
	else if($zadanie == 7) {StanMonet(8, 100);}
	else if($zadanie == 8) {StanMonet(8, 100);}
	else if($zadanie == 9) {StanMonet(8, 100);}
	else if($zadanie == 10) {StanMonet(10, 200);}
	
	$query = "UPDATE minerva SET nrzadania = $zadanie WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
	
	if($zadanie > 0)
	{
	$query = "UPDATE minerva SET czasrozpoczecia = now() WHERE user = '$userName'";
	$rezultat = $polaczenie->query($query); 
		if($zadanie == 1){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 10 SECOND WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 2){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 5 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 		
		}
		else if ($zadanie == 3){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 10 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 4){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 20 MINUTE WHERE user = '$userName'";
		$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 5){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 30 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 6){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 60 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 7){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 240 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 8){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 240 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 9){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 240 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 	
		}
		else if ($zadanie == 10){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 480 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query);			
		}
		else if ($zadanie == 11){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL  MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
		else if ($zadanie == 12){
			$query = "UPDATE minerva SET czaszakonczenia = now() + INTERVAL 1440 MINUTE WHERE user = '$userName'";
			$rezultat = $polaczenie->query($query); 
		}
	}
}

$query = "SELECT czaszakonczenia FROM minerva WHERE user = '$userName'";
$rezultat = $polaczenie->query($query); 
$czasZakonczenia = $rezultat->fetch_assoc();

$dataczas = new DateTime();
$dataczas->format('Y-m-d H:i:s');
$koniecCzasu = DateTime::createFromFormat('Y-m-d H:i:s', $czasZakonczenia['czaszakonczenia']);
$roznica = $dataczas->diff($koniecCzasu);
$koniecCzasu->format('Y/m/d H:i:s');
$czas = "Pozostało ".$roznica->format('%h godz, %i min, %s sek')." do zakończenia zadania"."<br />";
			
$stamp = strtotime($koniecCzasu->format('Y/m/d H:i:s'));
$a = $stamp*1000;			
echo json_encode($a);			
$polaczenie->close();

?>