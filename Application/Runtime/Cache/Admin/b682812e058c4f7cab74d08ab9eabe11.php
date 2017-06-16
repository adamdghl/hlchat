<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->


    <title>模版</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/hlchat/Public/static/css/admin/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/hlchat/Public/static/css/admin/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

    <link href="/hlchat/Public/static/css/admin/animate.min.css" rel="stylesheet">
    <link href="/hlchat/Public/static/css/admin/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="/hlchat/Public/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Bootstrap table <a href="http://bootstrap-table.wenzhixin.net.cn/zh-cn/" target="_blank">http://bootstrap-table.wenzhixin.net.cn/zh-cn/</a></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Events -->
                    <div class="example-wrap">
                        <!--<h4 class="example-title">事件</h4>-->
                        <div class="example">
                            <div class="alert alert-success" id="examplebtTableEventsResult" role="alert">
                                事件结果
                            </div>
                            <!--<div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">-->
                                <!--<button type="button" class="btn btn-outline btn-default">-->
                                    <!--<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>-->
                                <!--</button>-->
                                <!--<button type="button" class="btn btn-outline btn-default">-->
                                    <!--<i class="glyphicon glyphicon-heart" aria-hidden="true"></i>-->
                                <!--</button>-->
                                <!--<button type="button" class="btn btn-outline btn-default">-->
                                    <!--<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>-->
                                <!--</button>-->
                            <!--</div>-->
                            <table id="table"></table>
                        </div>
                    </div>
                    <!-- End Example Events -->
            </div>
            </div>
        </div>
    </div>
</div>

<script src="/hlchat/Public/static/js/jquery.min.js?v=2.1.4"></script>
<script src="/hlchat/Public/static/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/hlchat/Public/static/js/admin/layer.min.js"></script>
<script src="/hlchat/Public/static/js/admin/content.min.js"></script>
<script src="/hlchat/Public/static/js/admin/welcome.min.js"></script>
<script src="/hlchat/Public/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/hlchat/Public/static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/hlchat/Public/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script>
    $('#table').bootstrapTable({
        url: '<?php echo U("admin/getAdminList");?>',
        columns: [{
            field: 'id',
            title: 'Item ID'
        }, {
            field: 'name',
            title: 'Item Name'
        }, {
            field: 'price',
            title: 'Item Price'
        }, ]
    });
</script>
</body>


</html>