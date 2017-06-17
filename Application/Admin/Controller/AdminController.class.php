<?php

namespace Admin\Controller;

use Admin\Model\AdminModel;

class AdminController extends CommonController
{

    public function index()
    {
        $this->adminList();
    }

    public function adminList()
    {
        $this->assign('tableTitle', '管理员列表');
        $this->assign('tips', '操作说明');
        $this->display('admin/adminList');
    }

    public function getAdminList()
    {
        $searchNameArr = array(
            'name' => 'admin_name',
            'truename' => 'admin_truename',
            'tel' => 'tel'
        );
        $offset = I('offset') ? I('offset') : 0;
        $limit = I('limit') ? I('limit') : 10;
        $sortName = I('sortName') ? I('sortName') : 'id';
        $order = I('order') ? I('order') : 'desc';
        /**
         * 目前只支持但条件查询
         */
//        $searchName = I('searchName')?I('searchName'):'';
        $searchName = I('searchName')?$searchNameArr[I('searchName')]:'';
        $searchContent = I('searchContent')?I('searchContent'):'';

        #TODO 多条件查询
        #code ....

        $condition = array();
        if (!empty($searchContent)) {
            $condition[$searchName] = $searchContent;
        }

        $admin_model = new AdminModel();
        $result = $admin_model->getListWithPage($condition, $offset, $limit,array($sortName => $order));
        echo json_encode(array('total' => $result['total'], 'rows' => $result['rows']));

    }
}