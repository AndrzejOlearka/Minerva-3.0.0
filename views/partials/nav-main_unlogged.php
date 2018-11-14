<nav class="row">

	<div class="col-6 col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-1 pl-2 pr-0 pr-sm-2 pr-lg-3">
	<?php if(!isset($_SESSION['logged'])){
					echo '<a href="login.php"><p>Logowanie</p></a>';
					}
				else{
					echo '<a href="../controllers/logout.php"><p>Wylogowanie</p></a>';
					}
	?></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="../controllers/registration.php"><p>Rejestracja</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="../controllers/tutorial.php"><p>Samouczek</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="../controllers/statistics.php"><p>Statystyki</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="../controllers/authors.php"><p>Autorzy</p></a></div>			
	
</nav>

			
<header>
	
	<h1> Poznaj drogocenne kamienie oraz odkryj tajemnicze minerały...</h1>
	
</header>	
