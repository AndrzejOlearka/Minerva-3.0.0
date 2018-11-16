<?php

class LevelUpdateSession{
	
	public function advance($i){	
		
		if(isset($_SESSION['advance_'.$i.'_level'])){
			echo $_SESSION['advance_'.$i.'_level'];
			unset ($_SESSION['advance_'.$i.'_level']);
		}   
	}   	
}


?>