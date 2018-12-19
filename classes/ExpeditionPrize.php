<?php
	// określenie nagrody za ekspedycje

	class ExpeditionPrize{

		public static function addGuildExp($exp){
			
			$query = require '../core/bootstrap.php';
			$guildMemberData = $query->select("SELECT user, id_guild FROM user_data WHERE user = '$userName'");
			$idGuild = $guildMemberData['id_guild'];
			$query->update("UPDATE guilds_data SET guild_exp = guild_exp + $exp WHERE id_guild = '$idGuild'");
			
		}
		
		public function getExpeditionPrize($expeditionNumber){
			
			$query = require '../core/bootstrap.php';
			require_once '../core/premium.php';
			$expeditionNumber = $expeditionNumber - 1;
			$minPrize = [5, 4, 8, 8, 6, 8, 6, 3, 2, 1, 40, 5];
			$maxPrize = [10, 12, 16, 18, 12, 12, 12, 6, 3, 2, 60, 15];
			$premMaxPrize = [15, 16, 24, 24, 18, 18, 8, 4, 3, 80, 25];
			$exp = [200, 400, 750, 1400, 1900, 3700, 14000, 14000, 14000, 26000, 50000, 50000];
			$mineral = [
				'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes',
				'emeralds', 'rubies', 'sapphires', 'diamonds', 'gold', 'silver'
			];
			$mineralPrizeInfo = [
				'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
				'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra'
			];

			$data = $query->select("SELECT * FROM user_data JOIN basic_equipment ON user_data.user = basic_equipment.user
				WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName'");

			if($premiumActivated === false){
				$rand = rand($minPrize[$expeditionNumber],$maxPrize[$expeditionNumber]);
			}
			else{
				$rand = rand($maxPrize[$expeditionNumber], $premMaxPrize[$expeditionNumber]);
			}
			
			$minerals = $mineral[$expeditionNumber];
			$newAmount = $rand + $data[$minerals];
			$newExp = $exp[$expeditionNumber]+$data['exp'];
			$query->update("UPDATE basic_equipment SET $minerals = $newAmount WHERE user = '$userName'");
			$query->update("UPDATE user_data SET exp = $newExp WHERE user = '$userName'");
			$query->update("UPDATE expeditions_data SET expedition_prize = false WHERE user = '$userName'");
			
			$idGuild = $data['id_guild'];
			if($idGuild !== 0){
				ExpeditionPrize::addGuildExp($exp[$expeditionNumber]);
			}	
			
			$expeditionPrizeInfo =  "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
				Zadanie z poszukiwaniem ".$mineralPrizeInfo[$expeditionNumber]." zostało zakończone!<br />
				otrzymałeś: ".$rand." ".$mineralPrizeInfo[$expeditionNumber]."  
				oraz ".$exp[$expeditionNumber]." punktów doświadczenia.";

			if($idGuild == 0){
				return "$expeditionPrizeInfo</div><br />";
			}	
			else{
				return $expeditionPrizeInfo = "$expeditionPrizeInfo<br />
					Exp twojej gildii również zwiększył się o tą ilość!</div><br />";
			}

		}
	}

?>
