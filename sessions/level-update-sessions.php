<?php

class LevelUpdateSession{
	
	public function advance($i){
		if(isset($_SESSION['advance_'.$i.'_level'])){
			echo $_SESSION['advance_'.$i.'_level'];
			unset ($_SESSION['advance_'.$i.'_level']);
		}   
	}   	
}


$advance = new LevelUpdateSession();
for($i = 2; $i < 11; $i++){
	$advance->advance($i);
	$i++;
}
?>