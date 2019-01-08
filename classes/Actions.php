<?php

Interface Actions{
	 
}

abstract class LoginPanel implements Actions {
	protected abstract function login();
	protected abstract function changeBannedNick();
}

abstract class RegistrationPanel implements Actions {
	protected abstract function register();
}

abstract class Account implements Actions {
	protected abstract function editAccount();
	protected abstract function showPremiumInfo();
	protected abstract function buyCoins();
	protected abstract function buyPremium();
}

abstract class Guilds implements Actions {
	protected abstract function showGuilds();
	protected abstract function createGuild();
	protected abstract function editGuildMemberMode();
	protected abstract function editGuildLeaderMode();
}

abstract class Equipment implements Actions {
	protected abstract function sellMinerals();
}

abstract class Statistics implements Actions {
	protected abstract function showStats();
	protected abstract function searchUser();
}
?>
