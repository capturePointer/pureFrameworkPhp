<?php
function url($c,$a,$params = array()){
	$uri = "?_c=" . $c . "&" . "_a=" . $a;
	if(!empty($params) && is_array($params)){
		foreach($params as $key=>$value){
			$uri = $uri . "&" . $key . "=" . urlencode($value);
		}
	}
	if(isset($_SERVER['PHP_SELF']) && !empty($_SERVER['PHP_SELF'])){
		$url = $_SERVER['PHP_SELF'] . $uri;
	}
	else if(isset($_SERVER['SCRIPT_NAME']) && !empty($_SERVER['SCRIPT_NAME'])){
		$url = $_SERVER['SCRIPT_NAME'] . $uri;
	}
	else{
		$url = "/index.php" . $uri;
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

function getRandomUserAgent(){
    $userAgents = array(
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
        "Opera/9.20 (Windows NT 6.0; U; en)",
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",
        "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48"
    );
    $random = rand(0,count($userAgents)-1);
    return $userAgents[$random];
}

function curlGet($url){
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_USERAGENT,getRandomUserAgent());
//  curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
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

function isLogined(){
	if(isset($_SESSION['member']) && $_SESSION['member']['id'] > 0){
		return true;
	}
	else{
		return false;
	}
}