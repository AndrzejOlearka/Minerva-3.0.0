<?php

// obiekt Missions pozwalający na wykonanie misji 
// obiekt Missions that allows to getting missions

class Missions{

		public static function addGuildExp($exp){
			
			$query = require '../core/bootstrap.php';
			$guildMemberData = $query->select("SELECT user, id_guild FROM user_data WHERE user = '$userName'");
			$idGuild = $guildMemberData['id_guild'];
			$query->update("UPDATE guilds_data SET guild_exp = guild_exp + $exp WHERE id_guild = '$idGuild'");
			
		}
	
	public function getMission($nr){

		$query = require '../core/bootstrap.php';
		$equipment = $query->select("SELECT * FROM user_data JOIN basic_equipment JOIN rare_equipment ON user_data.user=basic_equipment.user
			WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName' AND rare_equipment.user = '$userName'");
		$idGuild = $equipment['id_guild'];
		
		$minerals = ['diamonds', 'rubies', 'agates', 'sapphires', 'emeralds', 'topazes', 'turquoises', 'amethysts', 'malachites'];
		$minerals2 = ['crystals', 'morganites', 'pearls', 'fluorites', 'aquamarines', 'cymophanes', 'opales', 'painites', 'jadeites'];

		$mineralsSession = ['diament', 'rubinów', 'agatów', 'szafir', 'szmaragdów', 'topazów', 'turkusów', 'ametystów', 'malachitów'];
		$minerals2Session = ['kryształów', 'morganitów', 'pereł', 'fluorytów', 'akwamarynów', 'cymofanów', 'opali', 'painity', 'jadeit'];

		$sessionMissionsText = [
			'Złodziejaszka Max dostał to co mu było potrzebne!', 'Kowal będzie mógł teraz dokończyć koronę!',
			'Doris będzie mogła stworzyć kilka naszyjników!', 'ktoś będzie mógł kupić piękny pierścionek zaręczynowy z fluorytem',
			'Mistyk dalej będzie mógł badać nieznane', 'Fizyk Olek wciąż będzie miał szanse by odkryć coś niezwykłego',
			'Wydaje się, że ktoś będzie miał teraz pięknie ozdobione ściany!', 'Czarownica... tzn lekarka będzie  mogła dalej robić to co robi...',
			'Szamani stworzą teraz kolejny magiczny amulet'
		];

		$amount = [1, 6, 20, 1, 5, 20, 40, 6, 6];
		$amount2 = [50, 3, 20, 4, 10, 8, 40, 2, 1];

		$newMineralAmount = $equipment[$minerals[$nr]] - $amount[$nr];
		$newMineralAmount2 = $equipment[$minerals2[$nr]] - $amount2[$nr];

		if ($newMineralAmount < 0){
			$requiredAmount = $equipment[$minerals[$nr]] - $amount[$nr];
			$requiredAmount = $requiredAmount * -1;
			if($requiredAmount >1 && $requiredAmount < 5){
				$mineralsSession = ['diament', 'rubiny', 'agaty', 'szafiry', 'szmaragdy', 'topazy', 'turkusów', 'ametysty', 'malachity'];
			}
			$_SESSION['e_mission_amount_first'] =
				"<div class='error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>
					Niestety nie możesz wykonać misji, brakuje ci ".$requiredAmount." ".$mineralsSession[$nr].",
				</div><br /><br />";

				if($newMineralAmount2 < 0){
					$requiredAmount2 = $equipment[$minerals2[$nr]] - $amount2[$nr];
					$requiredAmount2 = $requiredAmount2 * -1;
					if($requiredAmount2 >1 && $requiredAmount2 < 5){
						$minerals2Session = ['kryształy', 'morganity', 'perły', 'fluoryty', 'akwamaryny', 'cymofany', 'opale', 'painity', 'jadeity'];
					}
					unset($_SESSION['e_mission_amount_first']);
					$_SESSION['e_mission_amount_second'] =
						"<div class='error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>
							Niestety nie możesz wykonać misji, brakuje ci ".$requiredAmount." ".$mineralsSession[$nr]."
								 oraz ".$requiredAmount2." ".$minerals2Session[$nr].".
						</div><br /><br />";
					header('Location: ../controllers/missions.php');
					exit();
				}

			header('Location: ../controllers/missions.php');
			exit();
		}

		if ($newMineralAmount2 < 0){
			$requiredAmount2 = $equipment[$minerals2[$nr]] - $amount2[$nr];
			$requiredAmount2 = $requiredAmount2 * -1;
			if($requiredAmount2 >1 && $requiredAmount2 < 5){
				$minerals2Session = ['kryształy', 'morganity', 'perły', 'fluoryty', 'akwamaryny', 'cymofany', 'opale', 'painity', 'jadeity'];
			}
			$_SESSION['e_mission_amount_second'] =
				"<div class='error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>
					Niestety nie możesz wykonać misji, 
					brakuje ci ".$requiredAmount2." ".$minerals2Session[$nr].".
				</div><br /><br />";
			header('Location: ../controllers/missions.php');
			exit();
		}

		$newExpAmount = $equipment['exp'] + 1000;

		$query->update("UPDATE basic_equipment SET $minerals[$nr] = $newMineralAmount WHERE user = '$userName'");
		$query->update("UPDATE rare_equipment SET $minerals2[$nr] = $newMineralAmount2 WHERE user = '$userName'");
		$query->update("UPDATE user_data SET exp = $newExpAmount WHERE user = '$userName'");
		if($idGuild !== 0){
			Missions::addGuildExp(1000);
		}	

		if($idGuild == 0){
			$_SESSION['mission_completed'] =
				"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
					Misja została ukończona, ".$sessionMissionsText[$nr].", Otrzymałeś 1000 expa.
				</div><br /><br />";
		}
		else{
			$_SESSION['mission_completed'] =
				"<div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
					Misja została ukończona, ".$sessionMissionsText[$nr].", Otrzymałeś 1000 expa.<br /> 
					Twoja gildia równiez otrzymała tą ilość expa.
				</div><br /><br />";
		}
		header('Location: ../controllers/missions.php');
		exit();

	}
}

?>
