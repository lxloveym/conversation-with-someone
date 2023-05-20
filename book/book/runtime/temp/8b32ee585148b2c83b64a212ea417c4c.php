<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/wwwroot/priactise/public/../application/admin/view/news/add.html";i:1650551694;s:59:"/www/wwwroot/priactise/application/admin/view/uekadmin.html";i:1651294367;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>"心灵的窗口"图书后台管理系统</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="/static/admin/bs/css/bootstrap.min.css">
    <script src="/static/admin/bs/js/jquery.min.js"></script>
    <script src="/static/admin/bs/js/bootstrap.min.js"></script>
    <style>
        .navbar .navbar-brand {
            color: #fff;
        }
        
        .navbar .navbar-brand:hover {
            color: #fff;
        }
        
        .navbar-default .navbar-nav>li>a {
            color: #fff;
        }
        
        .navbar-default .navbar-nav>li>a:hover {
            color: #fff;
        }
        
        .navbar-brand>img {
            display: inline-block;
        }
        
        .body {
            margin-top: 80px;
        }
        
        .list-group {
            display: none;
        }
        
        .navbar-blue {
            background-color: #428bca;
        }
        
        @media (min-width: 1200px) {
            .container {
                width: 98%;
            }
        }
        
        .navbar-brand {
            float: left;
            padding: 0px;
            font-size: 18px;
            line-height: 20px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- 导航条 -->
        <nav class="navbar navbar-default navbar-primary navbar-fixed-top navbar-blue" role="navigation">
            <div class="container-fluid">
                <!-- 导航logo -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="padding-top: 15px;padding-left: 30px;">"心灵的窗口"图书后台管理系统</a>
                </div>

                <!-- 出logo以外 -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li><a href="#"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">后台管理<span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><?php echo session('uekblog_message_username'); ?></a></li>
                                <li><a href="#" data-toggle="modal" data-target="#editPass">修改密码</a></li>
                                <li><a href="<?php echo url('Index/index/index'); ?>">前台首页</a></li>
                                <li><a href="<?php echo url('Login/loginout'); ?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>


        <!-- 内容区域 -->
        <div class="row body">

            <!-- 菜单 -->
            <div class="col-md-2">

                <!-- 管理员管理-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title" id="user"><span class="glyphicon glyphicon-user"></span> 用户管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo url('Admin/index'); ?>">管理员列表</a></li>
                        <li class="list-group-item"><a href="<?php echo url('User/index'); ?>">用户列表</a></li>

                    </ul>
                </div>

                <!-- 分类管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title" id="news"><span class="glyphicon glyphicon-tasks"></span> 书籍管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo url('Newtype/index'); ?>">书籍分类列表</a></li>
                        <li class="list-group-item"><a href="<?php echo url('News/index'); ?>">书籍列表</a></li>
                        <li class="list-group-item"><a href="<?php echo url('Collection/index'); ?>">收藏列表</a></li>
                    </ul>
                </div>

                <!-- 系统管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title" id="sys"><span class="glyphicon glyphicon-certificate"></span> 系统管理</h2>
                    </div>
                    <ul class="list-group">
                        <!--<li class="list-group-item"><a href="<?php echo url('System/index'); ?>">系统配置</a></li>-->
                        <!--<li class="list-group-item"><a href="<?php echo url('Column/index'); ?>">栏目管理</a></li>-->
                        <!--<li class="list-group-item"><a href="<?php echo url('Comment/index'); ?>">树洞列表</a></li>-->
                        <li class="list-group-item"><a href="<?php echo url('Said/index'); ?>">名人名言</a></li>
                    </ul>
                </div>
            </div>

            <!-- 引入模板布局 -->

<style>
    .alert {
        padding: 10px;
        display: none;
    }
</style>
<!-- 引入layer -->
<script src="/static/layer/layer.js"></script>

<!-- 引入百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="/static/baidu/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/baidu/ueditor.all.min.js">
</script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/baidu/lang/zh-cn/zh-cn.js"></script>

<!-- 引入无刷新上传图片 -->
<script src="/static/up/jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/static/up/uploadifive.css">

<!-- 内容 -->
<div class="col-md-10">

    <ol class="breadcrumb">
        <li><a href="<?php echo url('index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
        <li><a href="<?php echo url('news/index'); ?>">书籍管理</a></li>
        <li class="active">书籍添加</li>

        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
    </ol>

    <!-- 面版 -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            添加页面
        </div>
        <div class="panel-body">
            <form action="<?php echo url('news/insert'); ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍标题</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="请输入书籍标题" name="book_name" class="form-control" id="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍描述</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="请输入书籍简介" name="introduction" class="form-control" id="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍阅读量</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="请输入书籍阅读量" name="click_num" class="form-control" id="" value="0">
                    </div>
                    <label for="" class="col-sm-2 control-label">书籍点赞量</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="请输入书籍点赞量" name="click_good" class="form-control" id="" value="0">
                    </div>
                    <label for="" class="col-sm-2 control-label">书籍收藏量</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="请输入书籍收藏量" name="collection" class="form-control" id="" value="0">
                    </div>
                </div>


                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍作者</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="请输入书籍作者" name="author" class="form-control" id="">
                    </div>
                    <label for="" class="col-sm-2 control-label">书籍分类</label>
                    <div class="col-sm-2">
                        <select name="cid" id="" class="form-control">
                            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">书籍状态</label>
                        <div>
                            <label><input type="radio" name="status" checked value="1" id="">正常</label>
                            <label><input type="radio" name="status" value="0" id="">不显示</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">是否热门书籍</label>
                        <div>
                            <label><input type="radio" name="is_hot" checked value="0" id="">否</label>
                            <label><input type="radio" name="is_hot" value="1" id="">是</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍图片</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="img" id="imgHidden">
                        <input type="file" name="" id="img">
                        <br>
                        <div id="main"></div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">书籍内容</label>
                    <div class="col-sm-10">
                        <script id="editor" name="content" type="text/plain" style="width:100%;height:500px;"></script>
                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="提交">
                    <input type="reset" class="btn btn-danger" value="重置">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var ue = UE.getEditor('editor');


    $('#img').uploadifive({
        // 是否自动上传
        'auto': true,
        // 显示上传动画DIV
        'queueID': 'main',
        // 处理文件上传的地址
        'uploadScript': '<?php echo url("news/upload"); ?>',
        // 文件上传框文字
        "buttonText": "上传图片",
        // 监听图片上传成功
        'onUploadComplete': function(file, data) {
            // $("#main").find(".uploadifive-queue-item").remove();
            // $("#main").append(`<img width='200px' src='/upload/tmp/${data}'>`);
            $("#main").html(`<img width='200px' src='/upload/tmp/${data}'>`);

            $("#imgHidden").val(data);
        }
    });
</script>
        </div>
    </div>


    <!-- 修改密码的摸态框 -->
    <div class="modal fade" id="editPass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">修改密码</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo url('Login/update_pwd'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">原密码</label>
                            <input type="front_password" name="" class="form-control" placeholder="请输入原密码">
                        </div>
                        <div class="form-group">
                            <label for="">新密码</label>
                            <input type="new_password" name="" class="form-control" placeholder="请输入新密码">
                        </div>
                        <div class="form-group">
                            <label for="">确认密码</label>
                            <input type="re_new_password" name="" class="form-control" placeholder="请再次输入密码">
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="提交" class="btn btn-success">
                            <input type="reset" value="重置" class="btn btn-danger">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</body>

<script>
    // 菜单切换
    $(".panel-title").click(function() {
        $(".list-group").hide();
        $(this).parent().next().toggle();
    });

    // 自动触发菜单点击
    $("#<?php echo (isset($menu) && ($menu !== '')?$menu:'user'); ?>").click();
</script>

</html>