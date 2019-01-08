<?php	

// obiekt umożliwiający wyświetlanie statystyk, w tym wyszukiwanie graczy
// object that allows to showing statistics, including players searching
			
require_once "../classes/StatisticsOperations.php";		
			
class Stats extends StatisticsOperations{

	public function showExpStats(){
		$stats = $this->query->selectAll("SELECT user, exp FROM user_data ORDER BY `user_data`.`exp` DESC limit 10");
		$i = 1;
		$statsExpResult = '';
		foreach($stats as $statsTable){		
			$statsExpResult .= "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>".$i."</td>
					<td class='col-6'>".$statsTable['user']."</td>
					<td class='col-3'>".$statsTable['exp']."</td>
				</tr></table>";				
			$i++;		
		}
		return $statsExpResult;
	}
	
	public function showCoinsStats(){
		$stats = $this->query->selectAll("SELECT user, coins FROM user_data ORDER BY `user_data`.`coins` DESC limit 10");
		$i = 1;
		$statsCoinsResult = '';
		foreach($stats as $statsTable){			
			$statsCoinsResult .= "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['user']}</td>
					<td class='col-3'>{$statsTable['coins']}</td>
				</tr></table>";				
			$i++;		
		}
		return $statsCoinsResult;
	}		
	
		public function showGuildsStats(){
		$stats = $this->query->selectAll("SELECT guild_name, guild_exp FROM guilds_data ORDER BY `guilds_data`.`guild_exp` DESC limit 10");
		$i = 1;
		$statsGuildsResult = '';
		foreach($stats as $statsTable){			
			$statsGuildsResult .= "<table class='table col-11 col-sm-10 col-md-6 offset-1 offset-md-3'>
				<tr>
					<td class='col-3'>{$i}</td>
					<td class='col-6'>{$statsTable['guild_name']}</td>
					<td class='col-3'>{$statsTable['guild_exp']}</td>
				</tr></table>";				
			$i++;		
		}
		return $statsGuildsResult;
	}		
}

	