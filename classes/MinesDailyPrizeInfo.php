<?php

	//skrypt pozwalający na otrzymanie nagrody dziennej z kopalni
	// script that allows to recieving daily prize from mines
	
	Class MinesDailyPrizeInfo{
		
		public function getInfo(){
			
			$query = require  '../core/bootstrap.php';

			$equipment = $query->select("
				SELECT * FROM user_data JOIN mines_data JOIN basic_equipment 
				ON user_data.user=mines_data.user 
				WHERE  user_data.user = '$userName' AND mines_data.user = '$userName' AND basic_equipment.user = '$userName'"
			);

			$data = getdate();
			$dataArray = ["year", "mon", 'mday', "hours", "minutes", 'seconds'];
			for($i = 0; $i < 6; $i++){
				${'data'.$i} = $data["$dataArray[$i]"];				
			}			
			$dateTime = $data0."-".$data1."-".$data2." ".$data3.":".$data4.":".$data5;	
			
			if($dateTime >= $equipment['daily_prize']){
				$minesDailyPrize = true;
				$minerals = [
					'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 'emeralds',
					'rubies', 'sapphires', 'diamonds', 'gold', 'sillver'
				];
				for($nr = 0; $nr<12; $nr++){
					if($equipment["mines_$minerals[$nr]"] !== 0){
						return $formMinesDailyPrize = 
						'<br /><h2>Do odebrania masz nagrodę za wczorajszą pracę kopalni!</h2><br />
						<div class="dailyPrize col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
							<form action="../controllers/mines.php" method="post"><input type="hidden" name="dailyPrize" value="dailyPrize"/>
								<input type="submit" name="dailyPrize" value="Odbierz nagrodę!"/>
							</form>
						</div>';
						break;
					}
					else{
						if ($equipment['level'] == 10){
							return  $formMinesDailyPrize = '<div class="success col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">Osiągnąłeś 10 level, więc musisz kupić tylko kopalnie, by odbierać dzienne nagrody!</div>';
						}
						return  $formMinesDailyPrize = '<div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">Osiągnij 10 poziom, by móc zakupić kopalnie i odbierać dzienne nagrody!</div>';
						break;
					}
				}
			}
			else if(($dateTime <= $equipment['daily_prize']) && !isset($_SESSION['daily_Prize_Info']))
			{
				$dailyPrizeEndTime = DateTime::createFromFormat('Y-m-d H:i:s', $equipment['daily_prize']);
				$dailyPrizeEndTime->format('Y/m/d H:i:s');
				$stampEndTime = strtotime($dailyPrizeEndTime->format('Y/m/d H:i:s'));
				$date1 = date('nd', $stampEndTime);
				$date2 = date("nd");
				if($date2<$date1){
					return  $formMinesDailyPrize = '<div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">Nagrodę dzienną za kopalnie dostaniesz dopiero jutro!</div>';
				}
				else{
					return  $formMinesDailyPrize = '<div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">Już dzisiaj możesz spodziewać się dziennej nagrody!</div>';					
				}
			}
			else if(isset($_SESSION['daily_Prize_Info'])){		
				function formMinesDailyPrize(){
					echo '<div class="success col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Z wczorajszej nagrody otrzymałeś: ';
					for($nr = 0; $nr<12; $nr++){
						if(isset($_SESSION["daily_Prize$nr"])){
							echo $_SESSION["daily_Prize$nr"];
							unset($_SESSION["daily_Prize$nr"]);
						}
					}
					
					echo '</div>';		
				}				
			}
		}
	}
		
?>
