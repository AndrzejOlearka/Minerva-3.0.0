<?php

require_once "../classes/GuildsOperations.php";

class GuildMemberEditor extends GuildsOperations{
	
	public function validateGuildLeaving(){
		$i = 1;
		$memberGuildId = $this->getGuildData('id_guild');
		foreach($guildsData = $this->getAllGuildData() as $guildData){
			if(isset($_POST["leave"])){
				return true; 
			}
			$i++;
		}
	}
	
	public function validateGuildJoining(){
		$i = 1;
		$memberGuildId = $this->getGuildData('id_guild');
		foreach($guildsData = $this->getAllGuildData() as $guildData){
			if(isset($_POST["join$memberGuildId"])){
				return true; 
			}
			$i++;
		}
	}
	
	public function leaveGuild(){		
		$i = 1;
		foreach($guildDataData as $guildData){
			$idMemberGuild = $guildData['id_guild'];
			$query->update("UPDATE user_data SET id_guild = $idMemberGuild WHERE user='$userName'");
			$_SESSION['guild_join_success'] =
				"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
					Dołączyłeś do gildii  ".$guildData['guild_name'].".
				</div><br />";
			header ('Location: ../controllers/guilds.php');
			exit();
		}
		$i++;
	}
	
	
	public function joinGuild(){
		$i = 1;
		foreach($guildDataData as $guildData){
			$idMemberGuild = $guildData['id_guild'];
				$query->update("UPDATE user_data SET id_guild = 0 WHERE user='$userName'");
				$_SESSION['guild_leave_success'] =
					"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>Odszedłeś z gildii ".$guildData['guild_name'].".</div><br />";
				header ('Location: ../controllers/guilds.php');
				exit();
			}
			$i++;
		}
	}

	

