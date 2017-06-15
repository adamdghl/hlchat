<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
//        echo "<script>location.href='www.baidu.com'</script>";
        $this->display('login/index');
    }

    public function doLogin(){
        if(IS_POST){
            $data = I('post.');
        }
    }
}