<?php

//skrypt pozwalający na logowanie się do gry
//script that allows to login into a game

class Login{
	
	public static function logIntoGame(){
		
		require '../core/database/connect.php';

		if(isset($_POST['login']) && isset($_POST['password'])){
				
			$login = filter_input(INPUT_POST, 'login');
			$password = filter_input(INPUT_POST, 'password');				

			$loginQuery = $dataBase->prepare("SELECT user, password FROM user_data WHERE user=:login");
			$loginQuery->bindValue(':login', $login, PDO::PARAM_STR);
			$loginQuery->execute();
			$usersExist = $loginQuery->rowCount();
			$loginData = $loginQuery->fetch();
			
			if ($usersExist==1 && $login !== "admin"){	
				
				if (password_verify($password, $loginData['password'])){				
					$_SESSION['user'] = $loginData['user'];					
					unset($_SESSION['e_form_login']);	
					
					$query = require '../core/bootstrap.php';	
					$usersExistOnBanList = $query->rows("SELECT * FROM banned_users WHERE user = '$login'");				
						if($usersExistOnBanList==1){
							$bannedData = $query->select("SELECT * FROM banned_users WHERE user = '$login'");
							if($bannedData['nick_change_required'] == true){
								$_SESSION['change_nick_form'] = 
								'<div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Wymagane jest podanie nowego nicku, za poprzedni zostałeś zbanowany na czas nieokreślony.
									<form method="post" action="../controllers/login.php">
										<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-4">Nowy nick:</div>
										<div class="form_registration_input col-6 offset-3"><input type="text" name="newNick"/></div>
										<div class="form_registration_input col-6 offset-3"><input type="submit" name="newNickConfirmed" value="potwierdź!"/></div>
										<div class="form_registration_input col-6 offset-3"><input type="submit" name="newNickAborted" value="anuluj!"/></div>
									</form>
								</div>';
								header('Location: ../controllers/login.php');
								exit();
							}
							else{
								$banEndTime = DateTime::createFromFormat('Y-m-d H:i:s', $bannedData['banning_date']);
								$banEndTime = $banEndTime->format('Y/m/d H:i:s');
								unset($_SESSION['user']);
								$_SESSION['e_banned_account'] = '<div class="error col-12">UWAGA!!! Konto '.$login.' jest zbanowane do '.$banEndTime.'!</div>';
								header('Location: ../controllers/login.php');
								exit();
							}
						}
					}
					
					$usersExistAsModerator = $query->rows("SELECT user FROM moderators WHERE user = '$login'");				
						if($usersExistAsModerator==1){
							$_SESSION['moderator_mode']=true;
							$_SESSION['logged']=true;	
							unset($_SESSION['change_nick_form']);
							header('Location: ../controllers/admin.php');
							exit();
						}							
					
					$_SESSION['logged']=true;	
					unset($_SESSION['change_nick_form']);
					header('Location: ../controllers/equipment.php');
					exit();
				}			
				else if($usersExist==1 && $login == "admin"){
						if (password_verify($password, $loginData['password'])){				
						$_SESSION['logged']=true;
						$_SESSION['admin']=true;		
						$_SESSION['user'] = $loginData['user'];
						header('Location: ../controllers/admin.php');
						exit();	
					}			
					else{
						$_SESSION['e_form_login']='<div class="error col-12">Nieprawidłowy hasło administratora!</div>';
						header('Location: ../controllers/login.php');
						exit();
					} 
				}		
				else if($usersExist !==1 && $login !== "admin"){	
					$_SESSION['e_form_login']='<div class="error col-12">Nieprawidłowy login lub hasło!</div>';	
					header('Location: ../controllers/login.php');
					exit();
				}
			}		
			else{
					$_SESSION['e_form_log_inputs'] = '<div class="error col-12">Nie wypełniłeś wszystkich pól formularza logowania!></div><br /><br />';
					header('Location: ../controllers/login.php');
					exit();
			}					
		}
	
	public static function changeBannedNick(){
		
		require '../core/database/connect.php';

		if(isset($_POST['newNick'])){
			
			if (empty($_POST['newNick'])){
				$_SESSION['e_changing_nick_exist'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nie podałeś nowego nicka!</div><br />';	
			}
			
			if(isset($_POST['newNickAborted'])){
				session_unset();
				header('Location: ../controllers/login.php');
				exit();						
			}
				
			$newNick = filter_input(INPUT_POST, 'newNick');		

			$loginQuery = $dataBase->prepare("SELECT user FROM user_data WHERE user=:newNick");
			$loginQuery->bindValue(':newNick', $newNick, PDO::PARAM_STR);
			$loginQuery->execute();
			$usersExist = $loginQuery->rowCount();
			
			if ((strlen($newNick)<5) || (strlen($newNick)>20)){
					$_SESSION['e_changing_nick_length'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nick musi posiadać od 5 do 20 znaków!</div><br />';
					header('Location: ../controllers/login.php');
					exit();				
				}
				
			if (ctype_alnum($newNick) == false){	
					$_SESSION['e_changing_nick_type'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</div><br />';
					header('Location: ../controllers/login.php');
					exit();
				}
				
			if ($usersExist==0){	
			$userName = $_SESSION['user']; 
				$query = require '../core/bootstrap.php';	
				$query->update("UPDATE user_data SET user = '$newNick' WHERE user = '$userName'");		
				$query->update("UPDATE expeditions_data SET user = '$newNick' WHERE user = '$userName'");			
				$query->update("UPDATE trips_data SET user = '$newNick' WHERE user = '$userName'");			
				$query->update("UPDATE basic_equipment SET user = '$newNick' WHERE user = '$userName'");			
				$query->update("UPDATE rare_equipment SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE mines_data SET user = '$newNick' WHERE user = '$userName'");	
				$query->update("DELETE FROM banned_users WHERE user = '$userName'");					
									
				unset($_SESSION['change_nick_form']);
				unset($_SESSION['user']); 
				$_SESSION['log_banned_nick_changed'] = '<br /><div class="success col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Zmieniłeś swój niepoprawny nick i zlikwidowano twoją banicję!</div><br />';
			}
			else{
				if(isset($_SESSION['user'])){
					$_SESSION['e_changing_nick_exist'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Istnieje już gracz z tym nickiem!</div><br />';	
				}
			}
		}
	}
}


?>