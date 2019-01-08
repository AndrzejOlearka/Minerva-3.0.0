<?php

/* Obiekt klasy Guild ma 4 metody do wywoływania:
 1. pokazuje wszystkie gildie w gildie.php // showing all guilds in view
 2. pokazuje przyciski dołączania do gildii oraz do wychodzenia z gildiii // showing inputs in guilds
 3. pozwala liderowi zmieniać opis gildii lub oddać komuś przywództwo. // editing desription and changing leadership
 4. pozwala stworzyć nową gildię // creating new guild
*/

require_once "../classes/GuildsOperations.php";

class GuildList extends GuildsOperations{

	private function updateAmountGuildMembers($guildId){
		$countMembers = $this->query->rows("SELECT user FROM user_data WHERE id_guild = '$guildId'");
		$this->query->updateBindValue("UPDATE guilds_data SET guild_members = ? WHERE id_guild = ?", $bindedValues = [$countMembers, $guildId]);
	}
	
	public function showGuilds(){
		
		$guildsData = $this->getAllGuildData();
		$i = 1;
		
		foreach($guildsData as $guild){
			$leaderId = $guild['guild_leader'];
			$guildId = $guild['id_guild'];
			$memberId = $this->getLeaderData('id');
			$memberGuildId = $this->getLeaderData('id_guild');
			$leader = $this->query->select("SELECT id, user FROM user_data WHERE id = '$leaderId'");
			//aktualizacja liczby członków gildii //guild members amount updated
			$this->updateAmountGuildMembers($guildId);

			if($memberId==$leaderId){
				$edit =
				"<form action ='../controllers/guilds-edit.php'  method='post'>
					<input type='submit' class='col-4' value='edytuj dane!' name='edit'>
				</form>
				<form action ='../controllers/guilds.php' method='post'>
					<input type='submit' class='col-4' value='zlikwiduj gildię!' name='delete$guildId'>
				</form>";
			}
			else if($memberGuildId==0){
				$edit =
				"<form action ='../controllers/guilds.php' method='post'>
					<input type='submit' class='col-4' value='dołącz!' name='join$guildId'>
				</form>";
				if ($guild['guild_members'] >= 20){
					$edit = "";
				}
			}
			else if ($memberGuildId!==0 && $memberId!==$leaderId && $memberGuildId==$guildId){
				$edit =
				"<form action ='../controllers/guilds.php' method='post'>
					<input type='submit' class='col-4' value='wyjdź!' name='leave'>
				</form>";
			}
			else if ($memberGuildId!==0 && $memberId!==$leaderId && $memberGuildId!==$guildId){
				$edit = null;
			}

			$numGuilds = $this->query->rows("SELECT * FROM guilds_data ORDER BY guilds_data.guild_name ASC");				
			
			$template = "
				<h2 data-popup-open='popup-{$guild['guild_name']}'>{$i}. {$guild['guild_name']}</h2>
				<div class='row mb-4'>
					<div class='guildAvatar col-6 offset-3 col-sm-4 offset-sm-0 mb-2'><img src='../public/img/guild-avatars/{$guild['guild_avatar']}' data-popup-open='popup-{$guild['guild_name']}'/></div>
					<div class='guildData col-10 col-sm-7 offset-1 offset-sm-0'>Leader: {$leader['user']}<br />Exp: {$guild['guild_exp']}<br />Ilość członków: {$guild['guild_members']}</div>
				</div>
				<div class='guildDescription'>{$guild['guild_description']}</div>
				<br />".$edit."</div></div>";
					
			if ($i%2 == 1 && $i / $numGuilds !== 1){
				echo "<div class='row'><div class='col-lg-6 mb-4'><div class='guild'>".$template."<br />";
			}
			if($i / $numGuilds == 1 && $i%2 == 1){
				echo "<div class='row'><div class='col-lg-6 offset-lg-3 guild'>".$template."<br />";
			}
			if ($i%2 == 0){
				echo "<div class='col-lg-6'><div class='guild'>".$template."</div><br />";
			}
			echo "<div class='popupEquipment' data-popup='popup-{$guild['guild_name']}'><br /><a data-popup-close='popup-{$guild['guild_name']}' ><h1>&gt;&gt; powrót &lt;&lt; </h1></a></div>";
			$i++;
		}
	}	
}

