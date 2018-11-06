<?php if(isset($_SESSION['logged'])): ?>

<nav class="row">

	<div class="col-6  col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p><a href="equipment.php">Ekwipunek</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="expeditions.php"><p>Ekspedycje</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 offset-sm-1 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="mines.php"><p>Kopalnie</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 offset-sm-2 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="trips.php"><p>Wyprawy</p></a></div>
	<div class="lg-w-100"></div>
	<div class="col-6 col-sm-4 col-lg-2 offset-lg-3 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="missions.php"><p>Misje</p></a></div>			
	<div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="guilds.php"><p>Gildie</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="account.php"><p>Konto</p></a></div>								
	
</nav>		

<?php endif; ?>