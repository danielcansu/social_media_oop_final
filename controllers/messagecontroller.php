<?php

class MessageController{

	public function messagesAction(){

		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();



		$stm = $db->prepare("SELECT * FROM conversations WHERE username_sender = :username_sender OR  username_receiver = :username_receiver ORDER BY date_message DESC");
		$stm->bindParam(":username_sender", $_SESSION["username"]);
		$stm->bindParam(":username_receiver", $_SESSION["username"]);
		$stm->execute();
		$recovers = $stm->fetchAll();

		require_once 'views/messages_view.php';
	}

	public function newMessageAction(){

		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("INSERT INTO conversations (username_sender,username_receiver,body_message) VALUES (:username_sender,:username_receiver,:body_message)");
		$stm->bindParam(":username_sender", $_SESSION["username"]);
		$stm->bindParam(":username_receiver", $_POST["username_receiver"]);
		$stm->bindParam(":body_message", $_POST["body_message"]);
		$stm->execute();

		header("location:../message/messages");

	}


}

?>