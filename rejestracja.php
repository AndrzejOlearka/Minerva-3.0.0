<?php

	session_start();

	if (isset($_POST['email']))
	{
		$wszystko_ok=true;	
		$nick = $_POST['nick'];
		
		if ((strlen($nick)<5) || (strlen($nick)>20))
		{
			$wszystko_ok=false;
			$_SESSION['e_nick']="Nick musi posiadać od 5 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_ok=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!";
		}
		
		$email = $_POST['email'];	
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_ok=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail";
		}
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne";
		}
				
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);	
				
		if (!isset($_POST['regulamin']))
		{
			$wszystko_ok=false;
			$_SESSION['e_regulamin']="Potwierdz akceptację regulaminu";
		}

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);	
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno()); 
			}
			else
			{
				$rezultat = $polaczenie->query("SELECT id FROM minerva WHERE email='$email'");
							
				if (!$rezultat) throw new Exception($polaczenie->error);
						
				$ile_takich_maili = $rezultat->num_rows;
								
				if ($ile_takich_maili>0)
					{
					$wszystko_ok=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu email!";									
					}
						
				$rezultat = $polaczenie->query("SELECT id FROM minerva WHERE user='$nick'");
							
				if (!$rezultat) throw new Exception($polaczenie->error);
						
				$ile_takich_nickow=$rezultat->num_rows;
				if ($ile_takich_nickow>0)
					{
					$wszystko_ok=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku, wybierz inny!";
					}
					
					if ($wszystko_ok==true)
					{
						if ($polaczenie->query("INSERT INTO minerva VALUES (NULL, '$nick', '$haslo_hash', '$email', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NOW())"))
						{
							$_SESSION['udanarejestracja']=true;
							header('Location: udanarejestracja.php');
						}
						else
						{
							throw new Exception($polaczenie->error);
						}
					}
						$polaczenie->close();
				}						
			}
			catch(Exception $e)
			{
				echo '<span style="color:red">Błąd serwera!</span>';
				echo '<br />Informacja developerska: '.$e;
			}		
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Minerva - gra przeglądarkowa!</title>
	<meta name="description" content="Gra przeglądarkowa, w której możesz zostać właścicielem ogromnej fortuny, dzięki poszukiwaniu najszlachetniejszych minerałów!" />
	<meta name="keywords" content="gra przeglądarkowa, gra, minerały, monety, metale, złoto, srebro, diamenty" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
	<link rel="stylesheet" href="style/style.css" type+"text/css" />
	<link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet"> 
	<link rel="stylesheet" href="social_icons_fontello/fontello.css" type+"text/css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>

<body>

	<div id="container">
	
	&#169 Andus Games Presents &#169
	
		<div id ="top">
		<h1>Minerva</h1>
		</div>
	
		<div id="header">
		<h1>Gra przeglądarkowa z kryształami w tle...</h1>
		</div>
	
		<div id="nav">
			<ol>
				<li><a href="index.php">Logowanie</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
				<li><a href="statystyki.php">Statystyki</a></li>
				<li><a href="samouczek.php">Samouczek</a></li>
				<li><a href="autorzy.php">Autorzy</a></li>
			</ol>
		</div>
	
		<div id="content">
			<h1>Zarejestruj się...</h1>
			<br />
			
			<form method="post">
			
			<div class="divLogin">
			<label for "nick" class="title">Nickname:  </label><input type="text" name="nick" class="input" /></div><br />
			
			<?php 
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
			?>
			<div class="divLogin">
			<label for "email" class="title">E-mail:  </label><input type="text" name="email" class="input" /></div><br />
			
			<?php 
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
			?>
			<div class="divLogin">
			<label for "password" class="title">Twoje hasło: </label><input type="password" name="haslo1" class="input" /></div><br />
			<div class="divLogin">
			<label for "password" class="title">Powtórz hasło: </label><input type="password" name="haslo2" class="input" /></div><br />
			<?php 
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
			?>

			<div class="divLogin"><input type="checkbox" name="regulamin" /> Akceptuję regulamin</div><br />
			
			<?php 
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
			?>
			
			<input type="submit" class="btn-lg rejestracja" value="Zarejestruj się!" />
			<br /><br />
			 
			 </form>
	 			
						<h1>... i zacznij kolekcjonować minerały!</h1>
						
								<br />
						<h2> Masz już konto? To na co czekasz! Zaloguj się! </h2>
				
						<a href="index.php"><button type="submit" class="btn btn-primary btn-lg">Logowanie!</button></a>
		
		</div>
		
		<div id="footer">
		
			<div class="social"><div class="fb"><a href="https://www.facebook.com/" target="_blank" class="fblink"><i class="icon-facebook"></i></a></div></div>
			<div id="stopka"> <h1> Pisz do nas w mediach społecznościowych!<br />Pozostaw swoje opinie na temat gry!</div>
			<div class="social"><div class="tw"><a href="https://twitter.com/" target="_blank" class="twlink"><i class="icon-twitter"></i></a></div></div>
			
		</div>
		&#169 copyright &#169 Andrzej Olearka 2017
</div>
	
</body>
</html>