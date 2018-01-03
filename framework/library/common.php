<?php
function url($uri,$params = array()){
    if(!empty($params) && is_array($params)){
        $queryArr = array();
        foreach($params as $key=>$value){
            $queryArr[] = $key . "=" . urlencode($value);
        }
        $uri = $uri . '?' . implode('&', $queryArr);
    }
    if(isset($_SERVER['PHP_SELF']) && !empty($_SERVER['PHP_SELF'])){
        $url = getBaseUri() . "/" . $uri;
    }
    else if(isset($_SERVER['SCRIPT_NAME']) && !empty($_SERVER['SCRIPT_NAME'])){
        $url = getBaseUri() . "/" . $uri;
    }
    else{
        $url = "/" . $uri;
    }
    return $url;
}

function urlPublic($file){
	$file = "/public/" . $file;
	if(isset($_SERVER['PHP_SELF']) && !empty($_SERVER['PHP_SELF'])){
		$url = str_replace("index.php",$file,$_SERVER['PHP_SELF']);
	}
	else if(isset($_SERVER['SCRIPT_NAME']) && !empty($_SERVER['SCRIPT_NAME'])){
		$url = str_replace("index.php",$file,$_SERVER['SCRIPT_NAME']);
	}
	else{
		$url = "/" . $file;
	}
	return $url;
}

function urlUpload($file){
	$file = "/upload/" . $file;
	if(isset($_SERVER['PHP_SELF']) && !empty($_SERVER['PHP_SELF'])){
		$url = str_replace("index.php",$file,$_SERVER['PHP_SELF']);
	}
	else if(isset($_SERVER['SCRIPT_NAME']) && !empty($_SERVER['SCRIPT_NAME'])){
		$url = str_replace("index.php",$file,$_SERVER['SCRIPT_NAME']);
	}
	else{
		$url = "/" . $file;
	}
	return $url;
}


function getRandChar($length){
	$str = "";
	$strPol = "ABCDEFGHIJKLMNOP@QRSTUVWXYZ012345|-+!6789abcdefghijklmnopqrstuvwxyz";
	$max = strlen($strPol)-1;

	for($i=0;$i<$length;$i++){
		$str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
	}
	
	return $str;
}

function getBaseUri(){
    $SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
    $SCRIPT_NAME_ARR = explode("/", $SCRIPT_NAME);
    array_shift($SCRIPT_NAME_ARR);
    $uriArr = array();
    for($i = 0; $i < count($SCRIPT_NAME_ARR) - 1; $i++){
        $uriArr[] = $SCRIPT_NAME_ARR[$i];
    }
    $uri = "/" . implode('/', $uriArr);
    $uri = parse_url($uri, PHP_URL_PATH );
    return $uri;
}

function getUri(){
    $SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    $SCRIPT_NAME_ARR = explode("/", $SCRIPT_NAME);
    $REQUEST_URI_ARR = explode("/", $REQUEST_URI);
    $uriArr = array();
    for($i = count($SCRIPT_NAME_ARR) - 1; $i <= count($REQUEST_URI_ARR) - 1; $i++){
        $uriArr[] = $REQUEST_URI_ARR[$i];
    }
    $uri = "/" . implode('/', $uriArr);
    $uri = parse_url($uri, PHP_URL_PATH );
    return $uri;
}

function getUriSegments(){
    $uri = getUri();
    $segments = explode('/',trim($uri));
    array_shift($segments);
    return $segments;
}