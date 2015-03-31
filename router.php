<?php

// function __autoload($class) {
//     require_once "./controller" . strtolower($class) . ".php";
// }


require_once "controllers/startcontroller.php";
require_once "controllers/usercontroller.php";
require_once "controllers/membercontroller.php";
require_once "controllers/messagecontroller.php";
require_once "controllers/statuscontroller.php";


$requestURI = explode("/", parse_url(rtrim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));
$controller = 'startcontroller';
$action = 'indexaction';


if(!empty($requestURI[2])){
	$controller = $requestURI[2] . 'controller';
}

if(!empty($requestURI[3])){
	$action = explode("?", $requestURI[3]);
	$action = $action[0] . 'action';
}


if (method_exists($controller, $action)){
	$obj = new $controller;
	$obj->$action();
}else{
	echo "404";	
}




// if(is_readable("./controllers/". $defaultController . ".php")
//     && method_exists($defaultController, $defaultAction)){
//         $cont = new $defaultController;
//         $cont->$defaultAction();
// }
// else{
//     $cont = new ErrorsController;
//     $cont->notFoundAction();
// }

