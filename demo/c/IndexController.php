<?php
class IndexController extends Controller{
	public function index(){
		$this->assign("author","capturepointer");
		$this->assign("website","http://www.banguanshui.com/");
		$this->display();
	}
}