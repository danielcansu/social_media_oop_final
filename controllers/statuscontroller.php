<?php

class StatusController

{


    public function addStatusAction(){

session_start();
		$db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
        $stm = $db->prepare("INSERT INTO status (status_content, status_user_id, status_username) VALUES (:status_content, :status_user_id, :status_username)");
        $stm->bindParam(":status_user_id", $_SESSION["id"]);
        $stm->bindParam(":status_username", $_SESSION["username"]);
        $stm->bindParam(":status_content", $_POST['status_content']);
        $stm->execute();

        header('location:../status/showStatus');


}

    public function showStatusAction(){
        
session_start();
        $db = new PDO("mysql:host=localhost;dbname=social", "root", "root");
        $stm = $db->prepare("SELECT count(id) from users");
        $stm->execute();
        $number = $stm->fetchColumn();


        $db = new PDO("mysql:host=localhost;dbname=social;charset=utf8", "root", "root");
        $showStatusStm = $db->prepare("SELECT status_content,status_username,created_at FROM status 
    WHERE status_username IN (SELECT username_sender FROM friends WHERE username_receiver = :status_username
    UNION 
    SELECT username_receiver FROM friends WHERE username_sender = :status_username)
        ORDER BY created_at DESC");
        $showStatusStm->bindParam(":status_username",$_SESSION['username'], PDO::PARAM_INT);

        if($showStatusStm->execute()){
            $result = $showStatusStm->fetchAll();
            require_once "./views/wall_view.php";
        }

        else{
            //Error
            print_r($showStatusStm->errorInfo());
        }
    }


}


