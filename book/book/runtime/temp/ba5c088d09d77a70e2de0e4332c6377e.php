<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\system\index.html";i:1538036945;s:66:"D:\phpstudy_pro\WWW\priactise\application\admin\view\uekadmin.html";i:1650781827;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>"心灵的窗口"图书后台管理系统</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico">
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
                        <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
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
                        <li class="list-group-item"><a href="<?php echo url('Comment/index'); ?>">学习心得列表</a></li>
                    </ul>
                </div>

                <!-- 系统管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title" id="sys"><span class="glyphicon glyphicon-certificate"></span> 系统管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo url('System/index'); ?>">系统配置</a></li>
                        <li class="list-group-item"><a href="<?php echo url('Column/index'); ?>">栏目管理</a></li>

                    </ul>
                </div>
            </div>

            


<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="<?php echo url('index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="<?php echo url('system/index'); ?>">系统管理</a></li>
		<li class="active">系统配置</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			系统设置
		</div>
		<div class="panel-body">
			
			<form action="<?php echo url('System/check'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">网站标题</label>
					<input type="text" name="TITLE" placeholder="请输入网站标题" class="form-control" id="" value="<?php echo config('webConfig.TITLE'); ?>">
				</div>
				<div class="form-group">
					<label for="">网站LOGO</label>
					<input type="file" name="LOGO"  class="form-control"  id="">
					<img src="/upload/<?php echo config('webConfig.LOGO'); ?>" alt="">
				</div>
				<div class="form-group">
					<label for="">网站关键字</label>
					<input type="text" name="KEYWORDS" placeholder="请输入网站关键字" class="form-control" id="" value="<?php echo config('webConfig.KEYWORDS'); ?>">
				</div>
				<div class="form-group">
					<label for="">网站描述</label>
					<textarea name="DESCRIPT" id="" placeholder="请输入网站描述" class="form-control" cols="30" rows="5" ><?php echo config('webConfig.DESCRIPT'); ?></textarea>
				</div>
				<div class="form-group">
					<label for="">版权信息</label>
					<input type="text" name="BANQUAN" placeholder="请输入网站版权信息" class="form-control" id="" value="<?php echo config('webConfig.BANQUAN'); ?>">
				</div>

				<div class="form-group">
					<label for="">备案信息</label>
					<input type="text" name="BEIAN" placeholder="请输入网站备案信息" class="form-control" value="<?php echo config('webConfig.BEIAN'); ?>" id="">
				</div>

				<div class="form-group">
					<label for="">百度统计代码</label>
					<textarea name="BAIDU" id="" placeholder="请输入百度统计代码" class="form-control" cols="30" rows="5"><?php echo config('webConfig.BAIDU'); ?></textarea>
				</div>
				

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="提交">
					<input type="reset" class="btn btn-danger" value="重置">
				</div>
				
			</form>
		</div>
		
	</div>
</div>
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