<?php	

// obiekt umożliwiający wyświetlanie statystyk, w tym wyszukiwanie graczy
// object that allows to showing statistics, including players searching
		
require_once "../classes/StatisticsOperations.php";		
		
class SearchUser extends StatisticsOperations{
	
	private function sanitazeInsertedUserName(){
		if(ctype_alpha($_POST['nick']) == false){
			$_SESSION['no_nick_error']="<br /><div class='error col-6 offset-3'>Wpisałeś nick zawierający nieprawidłowe znaki!</div>";
		}
		else{
			return true;
		}
	}
	
	private function validateInsertedUserName(){
		$indenticalNicks  = $this->query->countRowsBindValue("SELECT user FROM user_data WHERE user = ?", $bindedValues = [$_POST['nick']]);
		if($indenticalNicks==0){
			$_SESSION['no_nick_error']="<br /><div class='error col-6 offset-3'>Nie znaleziono gracza o podanym nicku!</div>";
		}
		else{
			return true;
		}
	}
	
	public function initiateUserSearching(){
		$sanitazing = $this->sanitazeInsertedUserName();
		$validating = $this->validateInsertedUserName();
		if($sanitazing == true && $validating == true){
			return true;
		}
	}	
	
	public function finalizeUserSearching(){			
		$listQuery = $this->query->selectAll("SELECT user, exp, coins FROM user_data ORDER BY `user_data`.`exp` DESC");
		$i = 1;
		foreach($listQuery as $dataSearchedUser)	
		{					
			if($dataSearchedUser['user']==$_POST['nick']){
				break; 
			}	
			$i++; 
		}				

		return $searchingResult = 
		"<br />
		<table class='table col-6 offset-3' id='searchNick'  onmouseenter='play();'>
			<tr>
				<th>Miejsce:</th>
				<th>Nick:</th>
				<th>Exp:</th>
				<th>coins:</th>
			</tr>
			<tr>
				<td>{$i}</td>
				<td>{$dataSearchedUser['user']}</td>
				<td>{$dataSearchedUser['exp']}</td>
				<td>{$dataSearchedUser['coins']}</td>
			</tr>
		</table>";								
	}
}		
	

	