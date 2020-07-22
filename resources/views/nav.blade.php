<nav class="row">
	<div class="col-6 col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-1 pl-2 pr-0 pr-sm-2 pr-lg-3">
		@guest
			<a href="/login"><p>Logowanie</p></a>
		@endguest
		@auth
		<a href="{{ route('logout') }}"
			onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
			<p>Wyloguj</p>
		</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
		@endauth
	</div>

	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3">
		@guest
			<a href="/register"><p>Rejestracja</p></a>
		@endguest
		@auth
			<a href="/market"><p>Targowisko</p></a>
		@endauth	
	</div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/tutorial"><p>Samouczek</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/statistics"><p>Statystyki</p></a></div>
	<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3">
		@guest
			<a href="/authors"><p>Autorzy</p></a>
		@endguest
		@auth
			<a href="/debts"><p>Inwestycje</p></a>
		@endauth
	</div>			
	
</nav>
	
<header>
	
	<h1> Poznaj drogocenne kamienie oraz odkryj tajemnicze minerały...</h1>
	
</header>	

@auth

	<nav class="row">

		<div class="col-6  col-sm-4 col-sm-4 col-lg-2 offset-3 offset-sm-2 offset-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p><a href="/equipment">Ekwipunek</p></a></div>
		<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/expeditions"><p>Ekspedycje</p></a></div>
		<div class="col-6 col-sm-4 col-lg-2 offset-sm-1 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/mines"><p>Kopalnie</p></a></div>
		<div class="col-6 col-sm-4 col-lg-2 offset-sm-2 offset-md-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/trips"><p>Wyprawy</p></a></div>
		<div class="lg-w-100"></div>
		<div class="col-6 col-sm-4 col-lg-2 offset-lg-3 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/missions"><p>Misje</p></a></div>			
		<div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/guilds"><p>Gildie</p></a></div>
		<div class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/account"><p>Konto</p></a></div>								
		
	</nav>	

@endauth