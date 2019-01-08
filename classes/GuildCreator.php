<?php

require_once "../classes/GuildsOperations.php";

class GuildCreator extends GuildsOperations{
	
	private function checkCreatingGuildFormInputs(){
		if(empty($_POST['guildName']) && empty($_POST['guildDescription'])){
			$_SESSION['e_guild_form_error'] =
				"<div class='error col-6 offset-3'>
					Nie wypełniłeś wszystkich pól formularza!
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}
		else{
			return true;
		}
	}
	
	private function validateLeader(){
		
		$leaderLevel = $this->getLeaderData('level');
		if($leaderLevel < 10){
			$_SESSION['e_guild_level'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Żeby założyć gildię, musisz osiągnąć maksymalny poziom!
				</div><br />";
			header ('Location: ../controllers/guilds.php');
			exit();		
		}
		else{
			$leaderId = $this->getLeaderData('id');
			$guildsData = $this->getAllGuildData();		
			$i = 1;
			foreach($guildsData as $guild){
				if($guild['guild_leader'] == $leaderId){
					$_SESSION['e_leader'] =
						"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
							Ta sama osoba nie może kierować dwoma gildiami!
						</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}			
				$i++;			
			}
			return true;
		}
	}
	
	private function validateIdenticalGuildName(){
		$guildName = $_POST['guildName'];
		$identicalGuild = $this->query->rows("SELECT id_guild FROM guilds_data WHERE guild_name='$guildName'");		
		if ($identicalGuild>0){
			$_SESSION['e_guildname_identical'] =
				"<div class='error col-6 offset-3'>
					Istnieje już gildia o takiej nazwie, wybierz inną!
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}
		else{
			return true;
		}
	}
	
	private function validateGuildName(){

		if(strlen($_POST['guildName']) < 5 || strlen($_POST['guildName']) > 20){
			$_SESSION['e_guildname_length'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Nazwa gildii musi mieć od 5 do 20 znaków
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}
		else{
			if(strlen($_POST['guildDescription']) < 10 || strlen($_POST['guildDescription']) > 255){
			$_SESSION['e_guild_describe'] =
				"<div class='error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3'>
					Opis gildii musi mieć przynajmniej 10 znaków, zaś maksymalnie 255
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
			}
			else{
				return true;
			}
		}		

	}
	
	public function initiateGuildCreating(){
			$FormValidation = $this->checkCreatingGuildFormInputs();
			$LeaderValidation = $this->validateLeader();
			$GuildsValidation = $this->validateIdenticalGuildName();
			$GuildNameValidation = $this->validateGuildName();
			if($FormValidation == true && $LeaderValidation == true && $GuildsValidation == true && $GuildNameValidation == true){
				return true; 
			}
	}
	
	public function finalizeGuildCreating(){

			$leaderId = $this->getLeaderData('id');
			$newGuildId = $this->query->selectBindValue(
				"SELECT id_guild 
				FROM guilds_data 
				WHERE guild_leader= ?", 
				$bindedValues = [$leaderId]);
			
			$guildAvatar = $_FILES['guildAvatar']['name'];
			if(!$guildAvatar){
				$guildAvatar = "guild-avatar.JPG";
			}
			$target = "../public/img/guild-avatars/".basename($guildAvatar);

			if (move_uploaded_file($_FILES['guildAvatar']['tmp_name'], $target)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}

			$this->query->updateBindValue(
				"INSERT INTO guilds_data 
				VALUES (NULL, ?, ?, ?, 0, 0, ?)", 
				$bindedValues = [$_POST['guildName'], $leaderId, $_POST['guildDescription'], $guildAvatar]);
				
			$newGuildId = $this->getGuildData('guild_leader');
				
			$this->query->updateBindValue(
				"UPDATE user_data 
				SET id_guild = ? 
				WHERE user= ?", 
				$bindedValues = [$newGuildId, $this->userName]);

			$_SESSION['new_guild_created'] =
				"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
					Nowa gildia ".$_POST['guildName']." powstała i zostałeś jej liderem!
				</div><br />";
				
			header ('Location: ../controllers/guilds.php');
			exit();
		}

	}

