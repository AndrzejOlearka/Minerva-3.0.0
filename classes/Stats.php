<?php	

// obiekt umożliwiający wyświetlanie statystyk, w tym wyszukiwanie graczy
// object that allows to showing statistics, including players searching
		
class Stats{

	public function statsExp(){
		$query = require '../core/bootstrap.php';
		$stats = $query->selectAll("SELECT user, exp FROM user_data ORDER BY `user_data`.`exp` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){		
			echo "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['user']}</td>
					<td class='col-3'>{$statsTable['exp']}</td>
				</tr></table>";				
			$i++;		
		}
	}
	
	public function statsCoins(){
		$query = require '../core/bootstrap.php';
		$stats = $query->selectAll("SELECT user, coins FROM user_data ORDER BY `user_data`.`coins` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){			
			echo "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['user']}</td>
					<td class='col-3'>{$statsTable['coins']}</td>
				</tr></table>";				
			$i++;		
		}
	}		
	
		public function statsGuilds(){
		$query = require '../core/bootstrap.php';
		$stats = $query->selectAll("SELECT guild_name, guild_exp FROM guilds_data ORDER BY `guilds_data`.`guild_exp` DESC limit 10");
		$i = 1;
		foreach($stats as $statsTable){			
			echo "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['guild_name']}</td>
					<td class='col-3'>{$statsTable['guild_exp']}</td>
				</tr></table>";				
			$i++;		
		}
	}		

	public function searchUser(){
		
		$query = require '../core/bootstrap.php';
			$nick = $_POST['nick'];
			$indenticalNicks  = $query->rows("SELECT user FROM user_data WHERE user ='$nick'");
			if ($indenticalNicks==0)
			{
				$_SESSION['no_nick_error']="<br /><div class='error col-6 offset-3'>Nie znaleziono gracza o podanym nicku!</div>";
			}
			else{
			$data = $query->select("SELECT user, exp, coins FROM user_data WHERE user = '$nick'");				
			$listQuery = $query->selectAll("SELECT user, exp, coins FROM user_data ORDER BY `user_data`.`exp` DESC");
			$i = 1;
			foreach($listQuery as $data)	
			{					
					if($data['user']==$nick){
						break; 
					}	
					$i++; 
				}				
					echo "<br />
					<table class='table col-6 offset-3' id='searchNick'  onmouseenter='play();'>
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

	