<?php

class GuildSessions{
			
			
			public function guildsErrorDoubleLeader(){
				if(isset($_SESSION['e_leader'])){
				echo $_SESSION['e_leader'];
				unset($_SESSION['e_leader']);
				}
			}

			public function guildsGetNewLeader(){
				if(isset($_SESSION['new_leader_added'])){
					echo $_SESSION['new_leader_added'];
					unset ($_SESSION['new_leader_added']);
				}
			}

			public function guildsGetNewDescription(){
				if(isset($_SESSION['new_description_added'])){
					echo $_SESSION['new_description_added'];
					unset ($_SESSION['new_description_added']);
				}
			}

			public function guildsErrorWrongLevel(){
				if(isset($_SESSION['e_guild_wrong_level'])){
					echo $_SESSION['e_guild_wrong_level'];
					unset ($_SESSION['e_guild_wrong_level']);
				}
			}

			public function guildsErrorWrongName(){
				if(isset($_SESSION['e_guild_wrong_name'])){
					echo $_SESSION['e_guild_wrong_name'];
					unset ($_SESSION['e_guild_wrong_name']);
				}
			}			
					
			public function guildsErrorGuildnameLength(){
				if(isset($_SESSION['e_guildname_length'])){
					echo $_SESSION['e_guildname_length'];
					unset ($_SESSION['e_guildname_length']);
				}
			}
			
			public function guildsErrorGuildnameIdentical(){
				if(isset($_SESSION['e_guildname_identical'])){
					echo $_SESSION['e_guildname_identical'];
					unset ($_SESSION['e_guildname_identical']);
				}
			}

			public function guildsErrorGuilddescribe(){
				if(isset($_SESSION['guilddescribe'])){
					echo $_SESSION['guilddescribe'];
					unset ($_SESSION['guilddescribe']);
				}
			}

			public function guildsErrorFormInputs(){
				if(isset($_SESSION['new_guild_created'])){
					echo $_SESSION['new_guild_created'];
					unset ($_SESSION['new_guild_created']);
				}	
			}

			public function guildsSuccessGuildAdded(){
				if(isset($_SESSION['e_guild_form_error'])){
					echo $_SESSION['e_guild_form_error'];
					unset ($_SESSION['e_guild_form_error']);
				}
			}			
			
			public function createGuildErrorDescribe(){
				if(isset($_SESSION['e_guild_describe'])){
					echo $_SESSION['e_guild_describe'];
					unset ($_SESSION['e_guild_describe']);
				}
			}

			public function createGuildsErrorWrongLevel(){
				if(isset($_SESSION['e_guild_wrong_level'])){
					echo $_SESSION['e_guild_wrong_level'];
					unset ($_SESSION['e_guild_wrong_level']);
				}
			}

			public function createGuildsErrorWrongName(){
				if(isset($_SESSION['e_guild_wrong_name'])){
					echo $_SESSION['e_guild_wrong_name'];
					unset ($_SESSION['e_guild_wrong_name']);
				}
			}	

			public function createNewGuildSuccess(){
				if(isset($_SESSION['new_guild_created'])){
					echo $_SESSION['new_guild_created'];
					unset ($_SESSION['new_guild_created']);
				}
			}	
			
			public function joinGuildSuccess(){
				if(isset($_SESSION['guild_join_leave'])){
					echo $_SESSION['guild_join_leave'];
					unset ($_SESSION['guild_join_leave']);
				}
			}		
			
			public function leaveGuildSuccess(){
				if(isset($_SESSION['guild_join_success'])){
					echo $_SESSION['guild_join_success'];
					unset ($_SESSION['guild_join_success']);
				}
			}		
			
			public function deleteGuildSuccess(){
				if(isset($_SESSION['guild_deleted'])){
					echo $_SESSION['guild_deleted'];
					unset ($_SESSION['guild_deleted']);
				}
			}		
			
			public function guildsLowLeaderLevel(){
				if(isset($_SESSION['e_guild_level'])){
					echo $_SESSION['e_guild_level'];
					unset ($_SESSION['e_guild_level']);
				}
			}					
			
}

?>