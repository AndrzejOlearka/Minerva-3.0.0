<?php

	abstract class GuildsOperations{

		protected $query;
		protected $userName;
	
		public function __construct(){
			$this->query = require '../core/bootstrap.php';
			$this->userName = $_SESSION['user'];  
		}
		protected function getLeaderData($row){			
			$leaderData = $this->query->selectBindValue("SELECT * FROM user_data WHERE user = ?", $bindedValues = [$this->userName]);
			return $leaderData[$row];
		}
		protected function getGuildData($row){			
			$leaderId = $this->getLeaderData('id');
			$guildData = $this->query->selectBindValue("SELECT * FROM guilds_data WHERE guild_leader = ?", $bindedValues = [$leaderId]);
			return $guildData[$row];
		}
		protected function getAllGuildData(){			
			$guildsData = $this->query->selectAll("SELECT * FROM guilds_data ORDER BY guilds_data.guild_name ASC");
			return $guildsData;
		}
		
		
		
		
	}

?>
