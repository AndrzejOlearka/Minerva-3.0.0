<?php

	class GuildExpGenerator{
		
		public static function addGuildExp($exp){		
			$query = require '../core/bootstrap.php';
			$guildMemberData = $query->selectBindValue(
				"SELECT user, id_guild 
				FROM user_data 
				WHERE user = ?",
				$bindedVariables = [$userName]);
			$idGuild = $guildMemberData['id_guild'];
			$query->updateBindValue(
				"UPDATE guilds_data 
				SET guild_exp = guild_exp + ? 
				WHERE id_guild = ?",
				$bindedVariables = [$exp, $idGuild]);	
		}		
	}	

?>
