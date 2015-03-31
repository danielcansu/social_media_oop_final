<?php

class MemberController {

	public function viewAction(){

		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();

		$stm = $db->prepare("SELECT * FROM users WHERE id != :uid");
		$stm->bindParam(":uid", $_SESSION["id"]);
		$stm->execute();
		$users = $stm->fetchAll();

		foreach($users as &$user){
			$stm = $db->prepare("SELECT *
                      FROM friends
                      WHERE
                      (username_sender = :user1 AND username_receiver = :user2) OR
                      (username_sender = :user2 AND username_receiver = :user1)");

			$stm->bindParam(":user1", $user["username"]);
			$stm->bindParam(":user2", $_SESSION["username"]);
			$stm->execute();

			if($stm->rowCount() > 0){
				$user["friend_status"] = 1;
			}
			else{
				$user["friend_status"] = 0;
			}

		}


		require_once 'views/list_view.php';

	}



	public function friendsAction(){

		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();

		$stm = $db->prepare("SELECT * FROM friends WHERE (username_sender = :username_sender OR username_receiver = :username_receiver) AND active = 1");
		$stm->bindParam(":username_sender", $_SESSION["username"]);
		$stm->bindParam(":username_receiver", $_SESSION["username"]);
		$stm->execute();
		$recovers = $stm->fetchAll();


		require_once 'views/friends_view.php';
	}



	public function makeFriendAction() {

		session_start();
		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("INSERT INTO friends (username_sender, username_receiver) VALUES (:username_sender, :username_receiver)");
		$stm->bindParam(":username_sender", $_SESSION["username"]);
		$stm->bindParam(":username_receiver", $_GET["friend_username"]);
		$stm->execute();

		header("location:../member/view");
	
	}


	public function invitationsAction(){


		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();


		$stm = $db->prepare("SELECT username_sender, date_invitation,active,avatar FROM friends INNER JOIN users ON users.username = friends.username_sender
		WHERE username_receiver = :username_receiver ORDER BY date_invitation DESC");
		$stm->bindParam(":username_receiver", $_SESSION["username"]);
		$stm->execute();
		$recovers = $stm->fetchAll();


		$stm = $db->prepare("SELECT count(id_invitation) FROM friends WHERE username_sender = :username_sender AND username_receiver = :username_receiver ");
		$stm->bindParam(":username_sender", $_SESSION["username"]);
		$stm->bindParam(":username_receiver", $_GET["username"]);
		$stm->execute();
		$dakhris= $stm->fetchAll();


		require_once 'views/invitations_view.php';

	}


	public function acceptFriendAction(){

		session_start();
		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("UPDATE friends SET active = 1, date_confirm=NOW() WHERE username_sender = :username_sender AND username_receiver = :username_receiver ");
		$stm->bindParam(":username_sender", $_GET["username_sender"]);
		$stm->bindParam(":username_receiver", $_SESSION["username"]);
		$stm->execute();

	
		header("location:../member/friends");
	}


	public function declineFriendAction(){

		session_start();
		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("DELETE FROM friends WHERE (username_sender = :username_sender AND username_receiver = :username_receiver) OR 
														(username_sender = :username_receiver AND username_receiver = :username_sender)");
		$stm->bindParam(":username_sender", $_GET["username"]);
		$stm->bindParam(":username_receiver", $_SESSION["username"]);
		$stm->execute();

		header("location:../member/view");

		
	}


}




?>