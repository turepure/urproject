<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/lib/html5.js"></script>
    <script type="text/javascript" src="/Public/lib/respond.min.js"></script>
    <script type="text/javascript" src="/Public/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/lib/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>产品分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品分类管理 <span class="c-gray en">&gt;</span> 分类管理 <a id="refresh" class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><span id ='test'><i   class="Hui-iconfont">&#xe68f;</i></span></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" id="bantch-del" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加分类','<?php echo U('Admin/cats/add_cats_display');?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a> </span> <span class="r">共有数据：<strong><?php echo ($counter); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="6">分类管理</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" value="" name=""></th>
            <th width="40">ID</th>
            <th width="200">分类名</th>
            <th>父分类名</th>

            <th width="70">操作</th>
        </tr>
        </thead>
        <tbody>

        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c" id="role_edit_display">
                <td><input type="checkbox" value="" name=""></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["categoryname"]); ?></td>
                <td><?php echo ($vo["categoryparentname"]); ?></td>
                <td class="f-14" ><a id="" title="编辑" href="javascript:;" onclick="admin_role_edit('分类编辑','<?php echo U('Admin/cats/cats_edit_display','id='.$vo['id']);?>','800')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_cats_del(this,<?php echo ($vo['id']); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    /*管理员-角色-添加*/
    //    admin_role_add('添加角色','<?php echo U('Admin/role/add_role_display');?>','800')
    function admin_role_add(title,url,w,h){

        layer_show(title,url,w,h);

    }
    /*管理员-角色-编辑*/


    function admin_role_edit(title,url,w,h){

        layer_show(title, url, w, h);
    }

    //        $(document).ready(function() {
    //
    //            $('#role_edit_display').click(function(){
    //                var id =$('#edit-id').val();
    //                console.log(id);
    //                $.ajax({
    //                    url: "<?php echo U('Admin/Role/role_edit_display');?>",
    //                    data: {'id': id},
    //                    type: 'post',
    //                    cache: false,
    //                    async: false,
    //                    success: function (msg) {
    //
    //                    },
    //                    error: function () {
    //                        alert('error');
    //                    }
    //                });
    //            })
    //
    //
    //      });



    /*管理员-类别-删除*/
    function admin_cats_del(obj,id){
        layer.confirm('类别删除须谨慎，确认要删除吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
//          console.log(id);
            $.ajax({
                url:"<?php echo U('Admin/cats/delete_cats');?>",
                data:{'id':id},
                type:'post', //GET
                cache:false,
                success:function(msg){
                    if(msg =='OK'){
                        alert('succes!');
                    }
                }
            });
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});

        });
    }

    /*分类- 批量删除*/
    function datadel(){

    }
//$().ready(function(){
//
//})
    $("#bantch-del").click(function(){
    alert("ds");
        var checkedNum = $("input[name='check']:checked").length;
        if(checkedNum == 0) {
            alert("请选择至少一项！");
            return;
        }
// // 批量选择
        if(confirm("确定要删除所选项目？")) {
            var che = $("input[name='check']:checked");
//              alert(che)
            var hh = new Array();
            for(var a=0;a<che.length;a++){
                hh[a] = che[a].value;
            }
            $.ajax({
                type: "POST",
                url: "?r=user/dels",
                data: {'delitems':hh},
                success: function(result) {
                    alert("删除成功");
                }
            });
        }
    });

</script>
</body>
</html>