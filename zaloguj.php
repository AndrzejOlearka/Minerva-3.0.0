<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}

require_once "connect.php";

$polaczenie=new mysqli($host, $db_user, $db_password, $db_name);

		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		} 	
		else
		{
			$login=$_POST['login'];
			$haslo=$_POST['haslo'];
			
			$login=htmlentities($login, ENT_QUOTES, "UTF-8");
			
			if ($rezultat=$polaczenie->query
			(sprintf("SELECT * FROM minerva WHERE user='%s'",	
			mysqli_real_escape_string($polaczenie,$login))))
			{
				$ilu_userow=$rezultat->num_rows;
				if ($ilu_userow==1)
				{	
					$wiersz=$rezultat->fetch_assoc();
					
					if (password_verify($haslo, $wiersz['password']))
					{				
						$_SESSION['zalogowany']=true;		
						unset($_SESSION['blad']);	
						$_SESSION['user'] = $wiersz['user'];
						$rezultat->close();
						header('Location: gra.php');
					}								
					else 
					{
						$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: index.php');
					}				
				} 
				else 
				{	
					$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');	
				}
			}		
			$polaczenie->close();
		}
?>