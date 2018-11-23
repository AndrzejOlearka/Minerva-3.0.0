<?php

/* Obiekt klasy Guild ma 4 metody do wywoływania:
 1. pokazuje wszystkie gildie w gildie.php // showing all guilds in view
 2. pokazuje przyciski dołączania do gildii oraz do wychodzenia z gildiii // showing inputs in guilds
 3. pozwala liderowi zmieniać opis gildii lub oddać komuś przywództwo. // editing desription and changing leadership
 4. pozwala stworzyć nową gildię // creating new guild
*/
	class Guild{

		public function showGuild(){

		$query = require '../core/bootstrap.php';

		$guilds = $query->selectAll("SELECT * FROM guilds_data ORDER BY guilds_data.guild_name ASC");
		$i = 1;
		foreach($guilds as $guild)
			{
				$idLeader = $guild['guild_leader'];
				$idGuild= $guild['id_guild'];

				//aktualizacja liczby członków gildii //guild members amount updated
				$countMembers = $query->rows("SELECT user FROM user_data WHERE id_guild = '$idGuild'");
				$query->update("UPDATE guilds_data SET guild_members = $countMembers WHERE id_guild = '$idGuild'");

				$leader = $query->select("SELECT id, user FROM user_data WHERE id = '$idLeader'");
				$member = $query->select("SELECT id, user, id_guild FROM user_data WHERE user='$userName'");

				if($member['id']==$guild['guild_leader']){
					$edit =
					"<form action ='../controllers/guilds-edit.php'  method='post'>
						<input type='submit' class='col-4' value='edytuj dane!' name='edit'>
					</form>
					<form action ='../controllers/guilds.php' method='post'>
						<input type='submit' class='col-4' value='zlikwiduj gildię!' name='delete$idGuild'>
					</form>";
				}
				else if($member['id_guild']==0){
					$edit =
					"<form action ='../controllers/guilds.php' method='post'>
						<input type='submit' class='col-4' value='dołącz!' name='join$idGuild'>
					</form>";
					if ($guild['guild_members'] >= 20){
						$edit = "";
					}
				}
				else if ($member['id_guild']!==0 && $member['id']!==$guild['guild_leader'] && $member['id_guild']==$guild['id_guild']){
					$edit =
					"<form action ='../controllers/guilds.php' method='post'>
						<input type='submit' class='col-4' value='wyjdź!' name='leave'>
					</form>";
				}
				else if ($member['id_guild']!==0 && $member['id']!==$guild['guild_leader'] && $member['id_guild']!==$guild['id_guild']){
					$edit = null;
				}

				$numGuilds = $query->rows("SELECT * FROM guilds_data ORDER BY guilds_data.guild_name ASC");

				if ($i%2 == 1 && $i / $numGuilds !== 1){
					echo "<div class='row'><div class='col-lg-6 mb-4'><div class='guild' onmouseenter='play();'><h2>{$i}. {$guild['guild_name']}</h2>
					<div class='row mb-4'><div class='guildAvatar col-6 offset-3 col-sm-4 offset-sm-0 mb-2'><img src='../public/img/guild-avatars/{$guild['guild_avatar']}'/></div>
					<div class='guildData col-10 col-sm-7 offset-1 offset-sm-0'>Leader: {$leader['user']}<br />Exp: {$guild['guild_exp']}<br />Ilość członków: {$guild['guild_members']}</div></div>
					<div class='guildDescription'>{$guild['guild_description']}</div><br />".$edit."</div></div><br />";
					}

				if($i / $numGuilds == 1 && $i%2 == 1){
					echo "<div class='row'><div class='col-lg-6 offset-lg-3 guild' onmouseenter='play();'><h2>{$i}. {$guild['guild_name']}</h2>
					<div class='row mb-4'><div class='guildAvatar col-6 offset-3 col-sm-4 offset-sm-0 mb-2'><img src='../public/img/guild-avatars/{$guild['guild_avatar']}'/></div>
					<div class='guildData col-10 col-sm-7 offset-1 offset-sm-0'>Leader: {$leader['user']}<br />Exp: {$guild['guild_exp']}<br />Ilość członków: {$guild['guild_members']}</div></div>
					<div class='guildDescription'>{$guild['guild_description']}</div><br />".$edit."</div></div><br />";
				}

				if ($i%2 == 0){
					echo "<div class='col-lg-6'><div class='guild' onmouseenter='play();'><h2>{$i}. {$guild['guild_name']}</h2>
					<div class='row mb-4'><div class='guildAvatar col-6 offset-3 col-sm-4 offset-sm-0 mb-2'><img src='../public/img/guild-avatars/{$guild['guild_avatar']}'/></div>
					<div class='guildData col-10 col-sm-7 offset-1 offset-sm-0'>Leader: {$leader['user']}<br />Exp: {$guild['guild_exp']}<br />Ilość członków: {$guild['guild_members']}</div></div>
					<div class='guildDescription'>{$guild['guild_description']}</div><br />".$edit."</div></div></div><br />";
				}
				$i++;
			}
		}

		public function toggleGuild(){

		$query = require '../core/bootstrap.php';
		$idMembers = $query->select("SELECT user, id FROM user_data WHERE user='$userName'");
		$idMember = $idMembers['id'];

		$guildss = $query->selectAll("SELECT * FROM guilds_data");
		$i = 1;
		foreach($guildss as $guilds){

// przyłączanie się do gildii // joining guild
				$idMemberGuild = $guilds['id_guild'];
				if(isset($_POST["join$idMemberGuild"])){
					$query->update("UPDATE user_data SET id_guild = $idMemberGuild WHERE user='$userName'");
					$_SESSION['guild_join_success'] =
						"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
							Dołączyłeś do gildii  ".$guilds['guild_name'].".
						</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}

// wychodzenie z gildii // leaving guild
				if(isset($_POST["leave"])){
					$query->update("UPDATE user_data SET id_guild = 0 WHERE user='$userName'");
					$_SESSION['guild_leave_success'] =
						"<div class='error col-6 offset-3''>Odszedłeś z gildii ".$guilds['guild_name'].".</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}

// usuwanie gildii // deleting guild
				if(isset($_POST["delete$idMemberGuild"])){
					$query->update("DELETE FROM guilds_data WHERE guild_leader='$idMember'");
					$query->update("UPDATE user_data SET id_guild = 0 WHERE user='$userName'");
					$_SESSION['guild_deleted'] =
						"<div class='error col-6 offset-3''>
							Usunąłeś gildię ".$guilds['guild_name'].".
						</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}
				$i++;
			}
		}

		public function editGuild(){

		$query = require '../core/bootstrap.php';

			$idLeader = $query->select("SELECT user, id, id_guild FROM user_data WHERE user='$userName'");
			$idGuildLeader = $idLeader['id_guild'];

// aktualizowanie opisu gildii // updating guild description

				if(isset($_POST['guildDescription'])){
					$newGuildDescription = $_POST["guildDescription"];
					if(strlen($newGuildDescription) < 10 || strlen($newGuildDescription) > 255){
						$_SESSION['e_guild_describe'] =
							"<div class='error col-6 offset-3''>
								Opis gildii musi mieć przynajmniej 10 znaków, zaś maksymalnie 255.
							</div><br />";
						header ('Location: ../controllers/guilds-edit.php');
						exit();
						}
					$query->update("UPDATE guilds_data SET guild_description = '$newGuildDescription' WHERE id_guild ='$idGuildLeader'");
					$_SESSION['new_description_added'] = 
					"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
						Edytowano opis gildii!
					</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}

// aktualizowanie lidera gildii // updating new guild leader

				if(isset($_POST['guildLeader'])){
					$newGuildLeaderName = $_POST["guildLeader"];
					$idGuild = $idLeader["id_guild"];

					$newLeaderuser_data = $query->select("SELECT * FROM user_data WHERE user = '$newGuildLeaderName'");
					$newLeaderMatches = $query->rows("SELECT * FROM user_data WHERE user = '$newGuildLeaderName'");
					if($newLeaderMatches < 1){
						$_SESSION['e_guild_wrong_name'] =
							"<div class='error col-6 offset-3''>
								Gracz o podanym nicku nie jest w gildii lub nie ma takiego gracza w ogóle!
							</div><br />";
						header ('Location: ../controllers/guilds-edit.php');
						exit();
					}
					if($newLeaderData['level'] < 10){
						$_SESSION['e_guild_wrong_level'] =
							"<div class='error col-6 offset-3''>
								Gracz o podanym nicku nie ma 10 lvla, który uprawnia do bycia liderem gildii!
							</div><br />";
						header ('Location: ../controllers/guilds-edit.php');
						exit();
					}
					$newLeaderId = $newLeaderData['id'];
					$query->update("UPDATE guilds_user_data SET guild_leader = $newLeaderId WHERE id_guild='$idGuild'");
					$_SESSION['new_leader_added'] =
						"<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
							Oddałeś gildię w ręce użytkownika ".$newGuildLeaderName.".
						</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}
		}

	public function createGuild(){

		if(isset($_POST['guildName']) && ($_POST['guildDescription']) && ($_POST['submit'])){
		$userName = $_SESSION['user'];
		$guildName = $_POST['guildName'];
		$query = require '../core/bootstrap.php';
		$leaderData = $query->select("SELECT id, level FROM user_data WHERE user='$userName'");
		$leaderLevel = $leaderData['level'];

		if($leaderLevel < 10){
			$_SESSION['e_guild_level'] =
				"<div class='error col-6 offset-3''>
					Żeby założyć gildię, musisz osiągnąć maksymalny poziom!
				</div><br />";
			header ('Location: ../controllers/guilds.php');
			exit();
		}

		if(strlen($guildName) < 5 || strlen($guildName) > 20){
			$_SESSION['e_guildname_length'] =
				"<div class='error col-6 offset-3''>
					Nazwa gildii musi mieć od 5 do 20 znaków
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}

		$identicalGuild = $query->rows("SELECT id_guild FROM guilds_data WHERE guild_name='$guildName'");

		if ($identicalGuild>0){
			$_SESSION['e_guildname_identical'] =
				"<div class='error col-6 offset-3'>
					Istnieje już gildia o takiej nazwie, wybierz inną!
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}

		$guildDescription = $_POST['guildDescription'];
		if(strlen($guildDescription) < 10 || strlen($guildDescription) > 255){
			$_SESSION['e_guild_describe'] =
				"<div class='error col-6 offset-3''>
					Opis gildii musi mieć przynajmniej 10 znaków, zaś maksymalnie 255
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}

		if(isset($_POST['submit'])){
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
		}

		$idLeader = $leaderData['id'];

		$guilds = $query->selectAll("SELECT id_guild, guild_leader FROM guilds_data");
		$i = 1;
		foreach($guilds as $guild){
				if($i['guild_leader'] == $idLeader){
					$_SESSION['e_leader'] =
						"<div class='error col-6 offset-3''>
							Ta sama osoba nie może kierować dwoma gildiami!
						</div><br />";
					header ('Location: ../controllers/guilds.php');
					exit();
				}
				$i++;
			}
			$query->update("INSERT INTO guilds_data VALUES (NULL, '$guildName', '$idLeader', '$guildDescription', 0, 0, '$guildAvatar')");
			$newId = $query->select("SELECT id_guild FROM guilds_data WHERE guild_leader= '$idLeader'");
			$newId = $newId['id_guild'];
			$query->update("UPDATE user_data SET id_guild = '$newId' WHERE user='$userName'");

			$_SESSION['new_guild_created'] =
				"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
					Nowa gildia ".$_POST['guildname']." powstała i zostałeś jej liderem!
				</div><br />";
			header ('Location: ../controllers/guilds.php');
			exit();
		}
		else{
			$_SESSION['e_guild_form_error'] =
				"<div class='error col-6 offset-3'>
					Nie wypełniłeś wszystkich pól formularza!
				</div><br />";
			header ('Location: ../controllers/guilds-creating.php');
			exit();
		}
	}
}
