<?php

require_once "../classes/GuildsOperations.php";

class GuildLeaderEditor extends GuildsOperations{
	
	public function validateNewDescription(){
		if(strlen($_POST["guildDescription"]) < 10 || strlen($_POST["guildDescription"]) > 255){
			$_SESSION['e_guild_describe'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Opis gildii musi mieć przynajmniej 10 znaków, zaś maksymalnie 255.
				</div><br />";
			header ('Location: ../controllers/guilds-edit.php');
			exit();
		}
		else{
			return true;
		}
	}
	
	public function validateNewLeader(){		
		$idGuild = $this->getLeaderData("id_guild");
		$newLeaderData = $this->query->selectBindValue("SELECT level FROM user_data WHERE user = ?", $bindedValues = [$_POST["guildLeader"]]);
		$newGuildLeaderName = $_POST["guildLeader"];
		$newLeaderMatches = $this->query->rows("SELECT * FROM user_data WHERE user = '$newGuildLeaderName'");
		if($newLeaderMatches < 1){
			$_SESSION['e_guild_wrong_name'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Gracz o podanym nicku nie jest w gildii lub nie ma takiego gracza w ogóle!
				</div><br />";
			header ('Location: ../controllers/guilds-edit.php');
			exit();
		}
		else{
			if($newLeaderData['level'] < 10){
			$_SESSION['e_guild_wrong_level'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Gracz o podanym nicku nie ma 10 lvla, który uprawnia do bycia liderem gildii!
				</div><br />";
			header ('Location: ../controllers/guilds-edit.php');
			exit();
			}
			else{
				return true;
			}
		}
	}
	
	public function validateGuildDeleting(){
		$i = 1;
		$memberGuildId = $this->getGuildData('id_guild');
		foreach($guildsData = $this->getAllGuildData() as $guildData){
			if(isset($_POST["delete$memberGuildId"])){
				return true; 
			}
			$i++;
		}
	}
	
	public function changeGuildDescription(){
		$leaderGuildId = $this->getLeaderData("id_guild");
			
		$this->query->updateBindValue("UPDATE guilds_data SET guild_description = ? WHERE id_guild = ?", $bindedValues = [$_POST["guildDescription"], $leaderGuildId]);		
		$_SESSION['new_description_added'] = 
			"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
				Edytowano opis gildii!
			</div><br />";
		header ('Location: ../controllers/guilds.php');
		exit();
	}
	
	public function changeGuildLeader(){							
		$leaderGuildId = $this->getLeaderData("id_guild");
					
		$newLeaderId = $newLeaderData['id'];
		$this->query->updateBindValue("UPDATE guilds_user_data SET guild_leader = ? WHERE id_guild= ?", $bindedValues = [$_POST['guildLeader'], $leaderGuildId]);
		$_SESSION['new_leader_added'] =
			"<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
				Oddałeś gildię w ręce użytkownika ".$newGuildLeaderName.".
			</div><br />";
		header ('Location: ../controllers/guilds.php');
		exit();
	}
	
	public function deleteGuild(){
		$i = 1;
		$memberId = $this->getLeaderData('id');
		$memberGuildId = $this->getGuildData('id_guild');
		foreach($guildsData = $this->getAllGuildData() as $guildData){
			$this->query->updateBindValue("DELETE FROM guilds_data WHERE guild_leader=?", $bindedValues = [$memberId]);
			$this->query->updateBindValue("UPDATE user_data SET id_guild = 0 WHERE user=?", $bindedValues = [$this->userName]);
			$_SESSION['guild_deleted'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Usunąłeś gildię ".$guildData['guild_name'].".
				</div><br />";
			header ('Location: ../controllers/guilds.php');
			exit();
			$i++;
		}
	}
}
