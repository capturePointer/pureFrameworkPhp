<?php
class IndexController extends Controller{
        protected function _init(){
            parent::_init();
            echo "init<br>";
        }
    
	protected function _finish(){
            parent::_finish();
            echo "<br>finish<br>";
	}
        
	public function index(){
            $segments = getUriSegments();
            print "uri segments:";
            print_r($segments);
            print "<br>";
            $this->assign("author","capturepointer");
            $this->display();
	}
        
        public function page(){
            print "page";
        }
        
        public function view($id){
            print "id:";
            echo $id;
            echo "<br>";
            $segments = getUriSegments();
            print "uri segments:";
            print_r($segments);
            print "<br>";
        }
        
        
}