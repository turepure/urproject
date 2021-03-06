<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
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
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-select.min.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品工具 <span class="c-gray en">&gt;</span>  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal myclass"  id="form-parent"> <!--action="/product/category_analysis/getAllData" method="post"-->
                <div class="form-group" >
                    <label class="col-sm-1 control-label">交易时间</label>
                    <div class="col-sm-2">
                        <input id="d11" type="text" name="BeginDate" class="form-control" placeholder="BeginDate" required="required">
                        <img onclick="WdatePicker({el:'d11'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">
                    </div>

                    <div class="col-sm-2">
                        <input id="d12" type="text" name="EndDate" class="form-control"  placeholder="EndDate" required="required">
                        <img onclick="WdatePicker({el:'d12'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">
                    </div>
                    <label for="" class="col-sm-1 control-label" >平台</label>
                    <div class="col-sm-2" >
                        <select name="pingtai" id="" class="form-control">
                            <option value="">全部</option>
                            <option value="eBay">eBay</option>
                            <option value="SMT">SMT</option>
                            <option value="Amazon">Amazon</option>
                            <option value="Wish">Wish</option>
                            <option value="Lazada">Lazada</option>
                            <option value="Tophatter">Tophatter</option>
                            <option value="shopee">shopee</option>
                        </select>
                    </div>
                    <label for="suffix" class="col-sm-1 control-label" >卖家简称</label>
                    <div class="col-sm-2">
                        <select name="suffix" class="form-control" >
                            <option value="">全部</option>
                            <option value="01-buy">01-buy</option>
                            <option value="02-2008">02-2008</option>
                            <option value="03-aatq">03-aatq</option>
                            <option value="04-cheong">04-cheong</option>
                            <option value="05-5avip">05-5avip</option>
                            <option value="06-happygirl">06-happygirl</option>
                            <option value="07-smile">07-smile</option>
                            <option value="08-xea">08-xea</option>
                            <option value="09-niceday">09-niceday</option>
                            <option value="10-girlspring">10-girlspring</option>
                            <option value="11-newfashion">11-newfashion</option>
                            <option value="12-showgirl">12-showgirl</option>
                            <option value="13-showtime">13-showtime</option>
                            <option value="14-degage">14-degage</option>
                            <option value="15-exao">15-exao</option>
                            <option value="16-sunshine">16-sunshine</option>
                            <option value="17-su061">17-su061</option>
                            <option value="18-shuai">18-shuai</option>
                            <option value="eBay-01-global_saler">eBay-01-global_saler</option>
                            <option value="99Buy01-eeeshop">99Buy01-eeeshop</option>

                            <option value="AMZ01-CA">AMZ01-CA</option>
                            <option value="AMZ01-DE">AMZ01-DE</option>
                            <option value="AMZ01-ES">AMZ01-ES</option>
                            <option value="AMZ01-FR">AMZ01-FR</option>
                            <option value="AMZ01-IT">AMZ01-IT</option>
                            <option value="AMZ01-JP">AMZ01-JP</option>
                            <option value="AMZ02-JP">AMZ01-MX</option>
                            <option value="AMZ01-UK">AMZ01-UK</option>
                            <option value="AMZ01-US">AMZ01-US</option>

                            <option value="AMZ02-CA">AMZ02-CA</option>
                            <option value="AMZ02-DE">AMZ02-DE</option>
                            <option value="AMZ02-ES">AMZ02-ES</option>
                            <option value="AMZ02-FR">AMZ02-FR</option>
                            <option value="AMZ02-IT">AMZ02-IT</option>
                            <option value="AMZ02-JP">AMZ02-JP</option>
                            <option value="AMZ02-JP">AMZ02-MX</option>
                            <option value="AMZ02-UK">AMZ02-UK</option>
                            <option value="AMZ02-US">AMZ02-US</option>

                            <option value="AMZ03-CA">AMZ03-CA</option>
                            <option value="AMZ03-MX">AMZ03-MX</option>
                            <option value="AMZ03-US">AMZ03-US</option>

                            <option value="AMZ04-CA">AMZ04-CA</option>
                            <option value="AMZ04-MX">AMZ04-MX</option>
                            <option value="AMZ04-US">AMZ04-US</option>

                            <option value="AMZ05-CA">AMZ05-CA</option>
                            <option value="AMZ05-US">AMZ05-US</option>

                            <option value="AMZ06-CA">AMZ06-CA</option>
                            <option value="AMZ06-US">AMZ06-US</option>

                            <option value="AMZ08-CA">AMZ08-CA</option>
                            <option value="AMZ08-US">AMZ08-US</option>

                            <option value="LZD01-eeeshopping-ID">LZD01-eeeshopping-ID</option>
                            <option value="LZD01-eeeshopping-MY">LZD01-eeeshopping-MY</option>
                            <option value="LZD01-eeeshopping-SG">LZD01-eeeshopping-SG</option>
                            <option value="LZD01-eeeshopping-TH">LZD01-eeeshopping-TH</option>
                            <option value="Shopee01-eshop-MY">Shopee01-eshop-MY</option>
                            <option value="Shopee01-eshop-SG">Shopee01-eshop-SG</option>


                            <option value="SMT01-eshop">SMT01-eshop</option>
                            <option value="SMT02-great">SMT02-great</option>
                            <option value="SMT03-happygirl">SMT03-happygirl</option>
                            <option value="SMT04-smile">SMT04-smile</option>
                            <option value="SMT05-fashion">SMT05-fashion</option>
                            <option value="SMT06-niceday">SMT06-niceday</option>
                            <option value="SMT07-girlspring">SMT07-girlspring</option>
                            <option value="SMT08-newfashion">SMT08-newfashion</option>
                            <option value="SMT09-showgirl">SMT09-showgirl</option>
                            <option value="SMT10-showtime">SMT10-showtime</option>
                            <option value="SMT11-degaga">SMT11-degaga</option>
                            <option value="SMT12-fashionzone">SMT12-fashionzone</option>
                            <option value="SMT13-sunshinegir">SMT13-sunshinegir</option>
                            <option value="SMT14-foxlady">SMT14-foxlady</option>
                            <option value="SMT15-charmgarden">SMT15-charmgarden</option>
                            <option value="SMT16-girlswardrobe">SMT16-girlswardrobe</option>
                            <option value="SMT17-magicspace66">SMT17-magicspace66</option>
                            <option value="SMT18-my5aVIP">SMT18-my5aVIP</option>
                            <option value="SMT19-YRSMT19">SMT19-YRSMT19</option>

                            <option value="Top-01">Top-01</option>

                            <option value="WIS01-eshop">WIS01-eshop</option>
                            <option value="WIS02-zone">WIS02-zone</option>
                            <option value="WIS03-world">WIS03-world</option>
                            <option value="WIS04-hapyshop">WIS04-hapyshop</option>
                            <option value="WIS05-fashionp">WIS05-fashionp</option>
                            <option value="WIS06-hones">WIS06-hones</option>
                            <option value="WIS07-Rosa">WIS07-Rosa</option>
                            <option value="WIS08-angel">WIS08-angel</option>
                            <option value="WIS09-universe">WIS09-universe</option>
                            <option value="WIS10-gossipgirl">WIS10-gossipgirl</option>
                            <option value="WIS11-fashiontribe">WIS11-fashiontribe</option>
                            <option value="WIS12-fantasticgirl">WIS12-fantasticgirl</option>
                            <option value="WIS13-decorationsector">WIS13-decorationsector</option>
                            <option value="WIS14-wednesdayshop">WIS14-wednesdayshop</option>

                            <option value="WISE03-Sixtyplus">WISE03-Sixtyplus</option>
                            <option value="WISE05-Ifyou521">WISE05-Ifyou521</option>
                            <option value="WISE07-Coldbone">WISE07-Coldbone</option>
                            <option value="WISE08-Highhigh">WISE08-Highhigh</option>
                            <option value="WISE09-Singledog">WISE09-Singledog</option>
                            <option value="WISE10-Womenflowers">WISE10-Womenflowers</option>
                            <option value="WISE13-Fastcar269">WISE13-Fastcar269</option>
                            <option value="WISE14-Fantasticfairyland">WISE14-Fantasticfairyland</option>
                            <option value="WISE15-Hanoba">WISE15-Hanoba</option>
                            <option value="WISE16-Badgirl">WISE16-Badgirl</option>
                            <option value="WISE17-Sunshinegirl">WISE17-Sunshinegirl</option>
                            <option value="WISE19-Highhigh2016">WISE19-Highhigh2016</option>
                            <option value="WISE20-Goodday125">WISE20-Goodday125</option>
                            <option value="WISE21-Hopefine">WISE21-Hopefine</option>
                            <option value="WISE22-Feifeimarket">WISE22-Feifeimarket</option>
                            <option value="WISE24-Lonelybar">WISE24-Lonelybar</option>
                            <option value="WISE26-Privatecorner">WISE26-Privatecorner</option>
                            <option value="WISE27-Travelgirl">WISE27-Travelgirl</option>
                            <option value="WISE28-Foreverbeauty521">WISE28-Foreverbeauty521</option>
                            <option value="WISE29-Girlswardrobe">WISE29-Girlswardrobe</option>
                            <option value="WISE31-Beathyclube">WISE31-Beathyclube</option>
                            <option value="WISE32-Magicspace">WISE32-Magicspace</option>
                            <option value="WISE33-Showtime128">WISE33-Showtime128</option>
                            <option value="WISE35-Eeeshopping">WISE35-Eeeshopping</option>
                            <option value="WISE36-Showgirl">WISE36-Showgirl</option>
                            <option value="幽然实业">幽然实业</option>
                        </select>

                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-1 control-label">创建时间</label>
                    <div class="col-sm-2">
                        <input id="d13" type="text" name="BeginCreateDate" class="form-control" placeholder="BeginCreateDate" required="required">
                        <img onclick="WdatePicker({el:'d13'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">
                    </div>
                    <div class="col-sm-2">
                        <input id="d14" type="text" name="EndCreateDate" class="form-control"  placeholder="EndCreateDate" >
                        <img onclick="WdatePicker({el:'d14'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">
                    </div>
                    <label  class="col-sm-1 control-label" >业绩归属</label>
                    <div class="col-sm-2" >
                        <select name="SalerName" class="form-control">
                            <option value="">全部</option>
                            <option value="尚显贝">尚显贝</option>
                            <option value="宋现中">宋现中</option>
                            <option value="陈海月">陈海月</option>
                            <option value="吴琼">吴琼</option>
                            <option value="杨淑琳">杨淑琳</option>
                            <option value="杨曼曼">杨曼曼</option>
                        </select>
                    </div>
                    <div class="col-sm-1" >
                        <button name="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 下载模板</button>
                    </div >

                    <!--<div class="text-c"> 日期范围：-->
                        <!--<input type="text" onfocus="WdatePicker()" id="datemin" class="input-text Wdate" style="width:120px;">-->
                        <!-- - -->
                        <!--<input type="text" onfocus="WdatePicker()" id="datemax" class="input-text Wdate" style="width:120px;">-->

                    <!--</div>-->


                </div>
            </form>



        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','picture-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="40"><input name="" type="checkbox" value=""></th>
                <th width="80">ID</th>
                <th width="100">分类</th>
                <th width="100">封面</th>
                <th>图片名称</th>
                <th width="150">Tags</th>
                <th width="150">更新时间</th>
                <th width="60">发布状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                <td><input name="" type="checkbox" value=""></td>
                <td>001</td>
                <td>分类名称</td>
                <td><a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')"><img width="100" class="picture-thumb" src=""></a></td>
                <td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">现代简约 白色 餐厅</a></td>
                <td class="text-c">标签</td>
                <td>2014-6-11 11:11:42</td>
                <td class="td-status"><span class="label label-success radius">已发布</span></td>
                <td class="td-manage"><a style="text-decoration:none" onClick="picture_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_edit('图库编辑','picture-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
        ]
    });
    /*图片-添加*/
    function picture_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-查看*/
    function picture_show(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-审核*/
    function picture_shenhe(obj,id){
        layer.confirm('审核文章？', {
                    btn: ['通过','不通过'],
                    shade: false
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                    $(obj).remove();
                    layer.msg('已发布', {icon:6,time:1000});
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                    $(obj).remove();
                    layer.msg('未通过', {icon:5,time:1000});
                });
    }
    /*图片-下架*/
    function picture_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*图片-发布*/
    function picture_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*图片-申请上线*/
    function picture_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }
    /*图片-编辑*/
    function picture_edit(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-删除*/
    function picture_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }

</script>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/Public/js/bootstrap-select.min.js"></script>
<script src="/Public/js/moment.min.js"></script>
<script src="/Public/js/zh-cn.js"></script>


</body>
</html>