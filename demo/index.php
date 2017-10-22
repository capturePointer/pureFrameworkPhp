<?php
global $_c;
global $_a;
define("FRAMEWORK_DIR",dirname(__FILE__) . "/../framework/");
define("APP_DIR",dirname(__FILE__));
require_once(FRAMEWORK_DIR . "/library/common.php");
require_once(FRAMEWORK_DIR . "/library/Mysqli_Database.php");
require_once(APP_DIR . "/config/config.php");
if(isset($_GET['_c'])){
	$_c = trim($_GET['_c']);
}
else{
	$_c = "Index";
}
if(isset($_GET['_a'])){
	$_a = trim($_GET['_a']);
}
else{
	$_a = "index";
}
$controllerName = $_c . "Controller";
$actionName = $_a;
$initActionName = "init";
$finalActionName = "finish";
require_once(FRAMEWORK_DIR . "/c/Controller.php");
require_once(APP_DIR . "/c/" . $controllerName . ".php");
$controllerObj = new $controllerName();
$controllerObj->{$initActionName}();
$controllerObj->{$actionName}();
$controllerObj->{$finalActionName}();
