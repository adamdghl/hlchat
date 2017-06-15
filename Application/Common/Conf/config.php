<?php
require "db.php";
$other_config =  array(
    //'配置项'=>'配置值'
);
return array_merge($db_config,$other_config);
