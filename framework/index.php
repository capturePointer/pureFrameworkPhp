<?php
global $_c;
global $_a;
define("FRAMEWORK_DIR",dirname(__FILE__));
require_once(FRAMEWORK_DIR . "/library/common.php");
require_once(FRAMEWORK_DIR . "/library/Mysqli_Database.php");
require_once(APP_DIR . "/config/config.php");
require_once(FRAMEWORK_DIR . "/library/Controller.php");
require_once(FRAMEWORK_DIR . "/library/Router.php");
require_once(APP_DIR . "/config/route.php");
Router::dispatch();

