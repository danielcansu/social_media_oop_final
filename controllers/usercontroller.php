<?php
class UserController{
	public function memberAction(){
		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();

		$stm = $db->prepare("SELECT username,email,sex,situation,about,avatar FROM users WHERE id = :uid");
		$stm->bindParam(":uid", $_SESSION["id"]);
		$stm->execute();
		$info = $stm->fetch();

		require_once 'views/member_view.php';
	}



	public function pictureAction(){

		session_start();

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("UPDATE users SET avatar = :pic WHERE id = :uid");
		$stm->bindParam(":uid", $_SESSION["id"]);
		$stm->bindParam(":pic", $_POST["avatar"]);
		$stm->execute();

		header('location:../user/member');

	}


	public function updateInfoWayAction(){

		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("SELECT count(id) from users");
		$stm->execute();
		$number = $stm->fetchColumn();

		$stm = $db->prepare("SELECT username,email,sex,situation,about,avatar FROM users WHERE id = :uid");
		$stm->bindParam(":uid", $_SESSION["id"]);
		$stm->execute();
		$info = $stm->fetch();


		require_once 'views/change_information_view.php';


	}

	public function updateInfoAction(){

		session_start();
		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
		$stm = $db->prepare("UPDATE users SET email= :email, situation = :situation, about = :about WHERE id =:uid");
		$stm->bindParam(":uid", $_SESSION["id"]);
		$stm->bindParam(":email", $_POST['email']);
		$stm->bindParam(":situation", $_POST['situation']);
		$stm->bindParam(":about", $_POST['about']);
		$stm->execute();


		header('location:../user/member');



	}
}



?>