<?php
class Controller{
        public function __construct() {
            $this->_init();;
        }
        
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
	
	protected function _init(){
		global $configs;
		date_default_timezone_set("Asia/Shanghai");
		session_start();
		$this->assign('configs',$configs);
	}
	
	protected function _finish(){
            
	}
        
        public function __destruct() {
            $this->_finish();;
        }
}