<?php
class StartController{
	public function indexAction(){

		require_once 'views/start_view.php';
	}

	public function loginAction(){

		if(isset($_POST["submit_login"])){
			$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
			$stm = $db->prepare("SELECT id FROM users WHERE username = :username AND password = :password");
			$stm->bindParam(":username", $_POST["username"], PDO:: PARAM_STR);
			$stm->bindParam(":password", $_POST["password"], PDO:: PARAM_STR);
			$stm->execute();

			if($stm->rowCount() == 1){
				$row = $stm->fetchColumn();

				
				session_start();
				$_SESSION['status'] = "LoggedIn";
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["id"] = $row;
				

				header("location:../user/member");
				
				
			}
			else{
				echo "There is no such user or pass";
			}
		}
	}

	public function logoutAction(){
		session_start();
		session_unset();
		session_destroy();
		header("location:../start");
	}


	public function registerAction(){
	
		 if(isset($_POST["submit_register"])){
	        if(empty($_POST["email"]) || empty($_POST["password"])){
	            echo "Email or password missing. Please provide both in order to proceed!";
	        }
	        else{
	            //Connect to db
	            $db = new PDO("mysql:host=localhost;dbname=social", "root", "root");

	            //try inserting the user using the provided fields from the form
	            $stm = $db->prepare("INSERT INTO users (sex, username, password, email, about, situation) VALUES (:sex, :username, :password, :email, :about, :situation)");
	            $stm->bindParam(":sex", $_POST["sex"], PDO:: PARAM_STR);
	            $stm->bindParam(":username", $_POST["username"], PDO:: PARAM_STR);
	            $stm->bindParam(":password", $_POST["password"], PDO:: PARAM_STR);
	            $stm->bindParam(":email", $_POST["email"], PDO:: PARAM_STR);
	            $stm->bindParam(":about", $_POST["about"], PDO:: PARAM_STR);
	            $stm->bindParam(":situation", $_POST["situation"], PDO:: PARAM_STR);

	            //IF the registration was successful
	            if($stm->execute()){
	               header("location:../start");
	            }
	            else{
	                //If error 23000 happens (aka duplicate key)
	                if($stm->errorCode() == 23000) {
	                    echo "username already used!";
	                }
	                //Else generic error
	                else{
	                    echo "some unknown error! Please try again!";
	                }
	            }
	        }
	    }

	}

}