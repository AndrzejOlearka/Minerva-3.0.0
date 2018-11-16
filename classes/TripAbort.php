<?php	
	
	// ustawienie nr wyprawy oraz czasu rozpoczecia i zakonczenia dla losowych zdarzen
	// setting the expedition number, trip start  and trip end time for random events
	
	
	class TripAbort{
		
		public function stopTrip(){	

			$query = require '../core/bootstrap.php';
			$tripNumber = $query->select("SELECT trip_number FROM trips_data WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_number = 0 WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_end = now() WHERE user = '$userName'");
			$tripNumber = $tripNumber['trip_number'] - 1;
			$minerals = [
			'z poszukiwaniem jadeitów', 'z poszukiwaniem kryształów', 'z poszukiwaniem painitów', 'z poszukiwaniem fluorytów', 'z poszukiwaniem morganitów', 
			'z poszukiwaniem akwamarynów', 'z poszukiwaniem opali', 'z poszukiwaniem pereł', 'z poszukiwaniem cymofanów'];
			$_SESSION['trip_stopped'] = 
				'<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
					<p>Przerwałeś zadanie '.$minerals[$tripNumber].', wyrusz ponownie na wyprawę, ona nic nie kosztuje!</p>
				</div>';
			$query->update("UPDATE trips_data SET trip_prize = false WHERE user = '$userName'");
			unset($_SESSION['only_exp']);
			unset($_SESSION['only_coins']);	
			unset($_SESSION['main_minerals']);			
			header('Location: ../controllers/trips.php');
			exit();	
		}
	}
	

?>