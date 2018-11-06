<?php	
		
class Stats{

	public function statsExp(){
		$query = require 'database/bootstrap.php';
		$stats = $query->selectAll("SELECT user, exp FROM user_data ORDER BY `user_data`.`exp` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){		
			echo "<table class='table col-8 offset-2'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['user']}</td>
					<td class='col-3'>{$statsTable['exp']}</td>
				</tr></table>";				
			$i++;		
		}
	}
	
	public function statsCoins(){
		$query = require 'database/bootstrap.php';
		$stats = $query->selectAll("SELECT user, coins FROM user_data ORDER BY `user_data`.`coins` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){			
			echo "<table class='table col-8 offset-2''>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['user']}</td>
					<td class='col-3'>{$statsTable['coins']}</td>
				</tr></table>";				
			$i++;		
		}
	}		
	
		public function statsGuilds(){
		$query = require 'database/bootstrap.php';
		$stats = $query->selectAll("SELECT guild_name, guild_exp FROM guilds_data ORDER BY `guilds_data`.`guild_exp` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){			
			echo "<table class='table col-8 offset-2''>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['guild_name']}</td>
					<td class='col-3'>{$statsTable['guild_exp']}</td>
				</tr></table>";				
			$i++;		
		}
	}		

	public function searchUser(){
		
		$query = require 'database/bootstrap.php';
			$nick = $_POST['nick'];
			$indenticalNicks  = $query->rows("SELECT user FROM user_data WHERE user ='$nick'");
			if ($indenticalNicks==0)
			{
				$_SESSION['no_nick_error']="<br /><div class='error col-6 offset-3'><p>Nie znaleziono gracza o podanym nicku!</p></div>";
				header('Location: statistics.php');			
				exit();
			}
			else{
			$data = $query->select("SELECT user, exp, coins FROM user_data WHERE user = '$nick'");				
			$listQuery = $query->selectAll("SELECT user, exp FROM user_data ORDER BY `data`.`exp` DESC");
			$i = 1;
			foreach($listQuery as $data)	
			{					
					if($data['user']==$nick){
						break; 
					}	
					$i++; 
				}				
					echo "<table class='table col-6 offset-3' id='searchNick'  onmouseenter='play();'>
						<tr>
							<th>Miejsce:</th>
							<th>Nick:</th>
							<th>Exp:</th>
							<th>coins:</th>
						</tr>
						<tr>
							<td>{$i}</td>
							<td>{$data['user']}</td>
							<td>{$data['exp']}</td>
							<td>{$data['coins']}</td>
						</tr>
					</table>";								
			}
		}		
	}

if(isset($_POST['nick'])){
$searchUser = new Stats;
$searchUser->searchUser();
}
	