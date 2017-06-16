<?php
namespace Admin\Controller;
class AdminController extends CommonController {
    public function index(){
        $this->display();
    }

    public function getAdminList(){
        $list[0] = array(
            'id' => 1,
            'name' => 1,
            'price' => 1,
        );
        $list[1] = array(
            'id' => 1,
            'name' => 1,
            'price' => 1,
        );
        $list[2] = array(
            'id' => 1,
            'name' => 1,
            'price' => 1,
        );
        echo json_encode($list);
    }
}