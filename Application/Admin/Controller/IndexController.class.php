<?php
namespace Admin\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->assign('a','b');
        $this->display();
    }

    public function index_v1(){
        $this->display();
    }

    public function defaultpage(){
        $this->display('index/default');
    }
}