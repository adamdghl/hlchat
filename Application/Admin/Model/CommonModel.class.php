<?php

namespace Admin\Model;
use Think\Model;

/**
 * Class CommonModel 一些通用的数据模型操作方法，create by Adam 20170613
 * @package Admin\Model
 *
 * 复杂的查询请使用thinkphp中提供query与execute方法
 * query方法用于读操作，execute方法用于写操作
 */

class CommonModel extends Model
{

    /**
     * 根据主键查询
     * @param $id 查询的主键
     * @param string $field
     */
    public function getInfoById($id, $field = '*'){
        $pk = $this->getPk();
        return $this->where(array($pk => $id))->field($field)->find();
    }

    /**
     * 普通的条件查询
     * @param $condition 条件
     * @param string $field 查询的字段
     * @return mixed
     */
    public function getInfoByCondition($condition, $field = '*'){
        return $this->where($condition)->field($field)->select();
    }

    /**
     * 查询符合条件的所有记录
     * @param $condition
     * @param string $field
     * @param string $order
     */
    public function getList($condition, $field = '*', $order = array('id' => 'desc'))
    {
        return $this->where($condition)->field($field)->order($order)->select();
    }

    /**
     * 分页查询
     * @param $condition
     * @param string $field
     * @param int $offset
     * @param int $limit
     * @param string $order
     */
    public function getListWithPage($condition, $offset = 0, $limit = 10, $order = array('id' => 'desc'), $field = '*', $return_total = true)
    {
        $result = $this->where($condition)->field($field)->limit($offset, $limit)->order($order)->select();
        if ($return_total) {//是否要求返回符合条件的总记录数量
            $total = $this->getCount($condition);
            return array('total' => $total?$total:0, 'rows' => $result?$result:array());
        } else {
            return $result;
        }
    }

    /**
     * 左联查询所有符合条件的记录
     * @param string $condition 查询条件
     * @param string $tb_a 表一名称
     * @param string $tb_b 表二名称
     * @param string $field 查询的字段，注意格式
     * @param string $join_on 建立关联关系的字段
     * @param string $tb_a_as 表一别名
     * @param string $tb_b_as 表二别名
     * @param string $order 排序，注意改变了别名后必须要对应更改排序字段
     * @return mixed
     */
    public function getListByJoin($condition = '', $tb_a = '', $tb_b = '', $field = 'a.*,b.*', $join_on = '', $tb_a_as = 'a', $tb_b_as = 'b', $order = 'id desc')
    {
        if(!empty($condition)){
            $condition = " where ".$condition;
        }
        $result = $this->query("select {$field} from {$tb_a} as {$tb_a_as} left join {$tb_b} as {$tb_b_as} on {$join_on} {$condition} order by {$order}");
        return $result;
    }

    /**
     * 左联查询所有符合条件的记录
     * @param string $condition 查询条件
     * @param string $tb_a 表一名称
     * @param string $tb_b 表二名称
     * @param string $field 查询的字段，注意格式
     * @param string $join_on 建立关联关系的字段
     * @param int $offset 起始记录位置
     * @param int $limit 查询记录条数
     * @param string $tb_a_as 表一别名
     * @param string $tb_b_as 表二别名
     * @param string $order 排序，注意改变了别名后必须要对应更改排序字段
     * @return mixed
     */
    public function getListWithPageByJoin($condition = '', $tb_a = '', $tb_b = '', $field = 'a.*,b.*', $join_on = '', $offset = 0, $limit = 10, $tb_a_as = 'a', $tb_b_as = 'b', $order = 'a.id desc')
    {
        if(!empty($condition)){
            $condition = " where ".$condition;
        }
        $result = $this->query("select {$field} from {$tb_a} as {$tb_a_as} left join {$tb_b} as {$tb_b_as} on {$join_on} {$condition} order by {$order}");

        return $result;
    }


    /**
     * 关于某些字段且符合查询条件的求和
     * @param $field 求和字段名
     * @param $condition 查询条件 (暂时只支持字符串,$condition = "id = 1 and sex = 1")
     */
    public function getSum($field, $condition = '', $table_name = '')
    {
        if (empty($table_name)) {
            $table_name = $this->getTableName();
        }
        $sum = $this->table($table_name)->where($condition)->sum($field);
        return $sum?$sum:0;
//        if (empty($table_name)) {
//            $table_name = $this->getTableName();
//        }
//        if (!empty($condition)) {
//            $condition = " where " . $condition;
//        }
//        $sum = $this->query("select ifnull(sum({$field}),0) as s from {$table_name} {$condition}");
//        $sum = $sum[0];
//        return $sum['s'];
    }

    /**
     * 查询符合条件的记录数量
     * @param string $condition 查询的条件
     * @param string $table_name 查询的表
     * @return mixed
     */
    public function getCount($condition = '', $table_name = '')
    {
        if (empty($table_name)) {
            $table_name = $this->getTableName();
        }
        return $this->table($table_name)->where($condition)->count('*');
    }

    /**
     * 新增数据
     * @access public
     * @param mixed $data 数据
     * @param array $options 表达式
     * @param boolean $replace 是否replace
     * @return mixed
     */
    public function insert($data = '', $options = array(), $replace = false)
    {
        return $this->add($data, $options, $replace);
    }

    /**
     * 删除
     * @param array $options 条件
     * @return mixed
     */
    public function del($options = array())
    {
        return $this->delete($options);
    }

    /**
     * 更新
     * @param $where
     * @param $data
     */
    public function update($where, $data = '', $options = array())
    {
        $this->where($where)->save($data, $options);
    }
}