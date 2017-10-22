<?php
class Controller{
	protected $vars = array();
	protected function display(){
		global $_c;
		global $_a;
		foreach($this->vars as $key=>$value){
			$$key = $value;
		}
		$tplFile = "v/" . $_c . "_" . $_a . ".html";
		header("Content-type: text/html; charset=utf-8"); 
		require APP_DIR . "/" . $tplFile;
	}
	protected function assign($name,$value){
		$this->vars[$name] = $value;
	}
	
	public function init(){
		date_default_timezone_set("Asia/Shanghai");
	}
	
	public function finish(){
		
	}
}