<?php

//
//

class Admin{

	public static function checkBannedUser($login){
		$query = require '../core/bootstrap.php';
		$bannedUser = $query->rows("SELECT * FROM banned_users WHERE user = '$login'");
		if($bannedUser==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	public static function checkModeratorUser($login){
		$query = require '../core/bootstrap.php';
		$moderator = $query->rows("SELECT * FROM moderators WHERE user = '$login'");
		if($moderator==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getAllPlayers(){

		require ( '../core/database/connect.php' );
		function t1($val, $min, $max) {
			return ($val >= $min && $val <= $max);
		 }
		$count = $dataBase->query( 'SELECT COUNT( id ) as cnt FROM user_data' )->fetch()['cnt'];
		$page = isset( $_GET['page'] ) ? intval( $_GET['page'] - 1 ) : 0;
		$limit = 10;
		$from = $page * $limit;
		$allPage = ceil( $count / $limit );
		$sql = 'SELECT * FROM user_data ORDER BY id DESC LIMIT ' . $from . ', ' . $limit;
		echo 'Strona: ' . ($page +1) . '<br>';
		echo 'Liczba graczy: ' . $count . '<br>';
		echo 'Liczba stron: ' . $allPage . '<br>';
		$tbl = $dataBase->query( $sql  );
		echo
			'<table border="1">
				<tr>
					<th>ID</th>
					<th>Użytkownik</th>
					<th>Level</th>
					<th>Exp</th>
					<th>Monety</th>
					<th>Premium</th>
					<th>Gildia</th>
					<th>Zmiana nicku</th>
					<th>Zbanowanie</th>';
					if(isset($_SESSION['admin'])){
						echo '<th>Usunięcie</th>';
					}		
				echo '</tr>';

			foreach( $tbl->fetchAll() as $value ) {
				echo '<tr>
					<td>' . $value['id'] . '</td>
					<td>' . $value['user'] . '</td>
					<td>' . $value['level'] . '</td>
					<td>' . $value['exp'] . '</td>
					<td>' . $value['coins'] . '</td>
					<td>' . $value['premium_end'] . '</td>
					<td>' . $value['id_guild'] . '</td>';
					if($value['user'] !== 'admin' && Admin::checkModeratorUser($value['user']) == false){
						echo '<td><input type="button" name="changing" value="zmień nick" data-changing='.$value['user'].'></td>';
					}
					else{
						echo '<td><div class="text-center success col-12" >MOD</div></td>';
					}
					if($value['user'] !== 'admin' && Admin::checkModeratorUser($value['user']) == false){
						if(Admin::checkBannedUser($value['user']) == false){
							echo '<td><input type="button" name="banning" value="zbanuj" data-banning='.$value['user'].'></td>';
						}
						else{
							echo '<td><input type="button" name="unbanning" value="odbanuj" data-unbanning='.$value['user'].'></td>';
						}
					}
					else{
						echo '<td><div class="text-center success col-12" >MOD</div></td>';
					}						
					if(isset($_SESSION['admin'])){
						if($value['user'] !== 'admin' && Admin::checkModeratorUser($value['user']) == false){
							echo '<td><input type="button" name="accountDelete" value="usuń"></td>';
						}
						else{
							echo '<td><div class="text-center success col-12" >MOD</div></td>';
						}
					}
				echo '</tr>';
			}
		echo '</table>';
		if( $page > 4 ) {
			echo '<a href="admin.php?page=1"> < pierwsza strona </a> | ';
		}
		for( $i = 1; $i <= $allPage; $i++ ) {
			$bold = ( $i == ( $page + 1 ) ) ? 'style="font-size: 24px;"' : '';
			if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {
				echo '<a ' . $bold . ' href="admin.php?page=' . $i . '">' . $i . '</a> | ';
			}
		}
		 if( $page < ( $allPage - 1 ) ) {
			 echo '<a href="admin.php?page=' . $allPage . '">ostatnia strona > </a> | ';
		 }

	}

	public function addModerator(){

		require '../core/database/connect.php';

		if(isset($_POST['moderator'])){

			$moderator = filter_input(INPUT_POST, 'moderator');

			$query = $dataBase->prepare("INSERT INTO moderators VALUES (:moderator, now())");
			$query->bindValue(':moderator', $moderator , PDO::PARAM_STR);
			$query->execute();
		}
	}

	public function showModerators(){
		
		$query = require '../core/bootstrap.php';
		$moderatorsData = $query->selectAll("SELECT * FROM moderators");

		echo
		'<br /><table border="1">
			<tr>
				<th>Numer</th>
				<th>Użytkownik</th>
				<th>Data awansu</th>';
				if(isset($_SESSION['admin'])){
					echo '<th>Usunięcie</th>';
				}
				echo '</tr>';
		$i = 1;
		foreach($moderatorsData as $moderator) {
		$advanceDate = DateTime::createFromFormat('Y-m-d H:i:s', $moderator['advance_date']);
		$advanceDate = $advanceDate->format('Y/m/d H:i:s');
			echo '<tr>
				<td>' . $i . '</td>
				<td>' . $moderator['user'] . '</td>
				<td>' . $advanceDate . '</td>';
				if(isset($_SESSION['admin'])){
					echo '<td><input type="button" data-mod-deleting="'.$moderator["user"].'" value="usuń"></td>';
				}
			echo '</tr>
		</table>';
		}
	}

	public function deleteAccount($deletedNick){

		$query = require '../core/bootstrap.php';
		$query->update("DELETE FROM user_data WHERE user = '$deletedNick'");
		$query->update("DELETE FROM basic_equipment WHERE user = '$deletedNick'");
		$query->update("DELETE FROM rare_equipment WHERE user = '$deletedNick'");
		$query->update("DELETE FROM expeditions_data WHERE user = '$deletedNick'");
		$query->update("DELETE FROM trips_data WHERE user = '$deletedNick'");
		$query->update("DELETE FROM mines_data WHERE user = '$deletedNick'");
		$query->update("DELETE FROM banned_users WHERE user = '$deletedNick'");
		header ('Location: ../controllers/admin.php');
		exit();
	}

	public function banAccount($bannedNick){
		$query = require '../core/bootstrap.php';
		$query->update("INSERT INTO banned_users VALUES ('$bannedNick', now() + INTERVAL 7 DAY, false)");
	}
	
	public function unbanAccount($unbannedNick){
		$query = require '../core/bootstrap.php';	
		$query->update("DELETE FROM banned_users WHERE user = '$unbannedNick'");
	}
	
	public function banUserNick($changedNick){
		$query = require '../core/bootstrap.php';	
		$query->update("INSERT INTO banned_users VALUES ('$changedNick', now() + INTERVAL 7 DAY, true)");
	}
	
	
}

?>
