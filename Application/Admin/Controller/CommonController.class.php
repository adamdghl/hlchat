<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {

    public function _initialize(){
        //判断有没有登录
        $login = new LoginController();
//        $login->index();
    }
}