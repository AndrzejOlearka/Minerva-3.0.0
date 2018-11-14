<?php

class StatisticsSessions{
	
	public function searchUserError(){
		if(isset($_SESSION['no_nick_error'])){
			echo $_SESSION['no_nick_error'];
			unset($_SESSION['no_nick_error']);
		}
	}

}

?>