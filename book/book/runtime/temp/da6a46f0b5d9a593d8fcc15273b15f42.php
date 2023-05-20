<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\news\index.html";i:1651176127;s:66:"D:\phpstudy_pro\WWW\priactise\application\admin\view\uekadmin.html";i:1650782100;}*/ ?>
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
                        <li class="list-group-item"><a href="<?php echo url('Collection/index'); ?>">收藏列表</a></li>
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
<script src="/static/layer/layer.js"></script>

<!-- 内容 -->
<div class="col-md-10">

    <ol class="breadcrumb">
        <li><a href="<?php echo url('index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
        <li><a href="<?php echo url('news/index'); ?>">书籍管理</a></li>
        <li class="active">书籍列表</li>

        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
    </ol>

    <!-- 面版 -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="<?php echo url('news/add'); ?>" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> 添加书籍
            </a>

            <p class="pull-right tots">共有<?php echo $total; ?>条数据</p>
            <form action="" class="form-inline pull-right">
                <div class="form-group">
                    <input type="text" name="search" value="<?php echo (isset($_GET['search']) && ($_GET['search'] !== '')?$_GET['search']:''); ?>" class="form-control" placeholder="请输入你要搜索的内容">
                </div>

                <input type="submit" value="搜索" class="btn btn-success">
            </form>


        </div>
        <table class="table-bordered table table-hover">
            <th><input type="checkbox" name="" class="all"></th>
            <th>ID</th>
            <th>书籍名称</th>
            <th>书籍图片</th>
            <th>书籍简介</th>
            <th>所属分类</th>
            <th>书籍作者</th>
            <th>浏览量</th>
            <th>点赞数</th>
            <th>收藏数</th>
            <th>创作时间</th>
            <th>是否热门</th>
            <th>书籍状态</th>
            <th>操作</th>

            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="" id="" value=""></td>
                <td><?php echo $vo['id']; ?></td>
                <td><?php echo $vo['book_name']; ?></td>
                <td>
                    <?php if($vo['img'] != null): ?><img height="100px" width="200px" src="/upload/tmp/<?php echo $vo['img']; ?>" alt=""><?php else: ?>无<?php endif; ?>
                </td>
                <td><?php echo $vo['introduction']; ?></td>
                <td><?php echo $vo['cid']; ?></td>
                <td><?php echo $vo['author']; ?></td>
                <td><?php echo $vo['click_num']; ?></td>
                <td><?php echo $vo['click_good']; ?></td>
                <td><?php echo $vo['collection']; ?></td>
                <td><?php echo $vo['create_time']; ?></td>
                <td><?php if($vo['is_hot'] == 1): ?>
                    <!-- 点击后状态码变为1 -->
                    <button class="btn btn-success" onclick="status(this,<?php echo $vo['id']; ?>,0)">是</button> <?php else: ?>
                    <!-- 点击后状态码变为0 -->
                    <button class="btn btn-danger" onclick="status(this,<?php echo $vo['id']; ?>,1)">否</button> <?php endif; ?></td>
                <td>
                    <?php if($vo['status'] == 1): ?>
                    <!-- 点击后状态码变为1 -->
                    <button class="btn btn-success" onclick="status1(this,<?php echo $vo['id']; ?>,0)">显示</button> <?php else: ?>
                    <!-- 点击后状态码变为0 -->
                    <button class="btn btn-danger" onclick="status1(this,<?php echo $vo['id']; ?>,1)">不显示</button> <?php endif; ?>
                </td>
                <td>
                    <a href="javascript:;" onclick="find(<?php echo $vo['id']; ?>)" data-toggle="modal" data-target="#editAdmin" class="glyphicon glyphicon-pencil"></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="javascript:;" onclick="del(this,<?php echo $vo['id']; ?>)" class="glyphicon glyphicon-trash"></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>




        </table>

        <!-- 分页效果 -->
        <div class="panel-footer">
            <nav style="text-align:center;">
                <?php echo $page; ?>
            </nav>

        </div>

    </div>
</div>
<!-- 修改页面的摸态框 -->
<div class="modal fade" id="editAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改书籍内容</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo url('News/ajax_save'); ?>" method="post" enctype="multipart/form-data">
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function status(obj, id, is_hot) {
        $.post("<?php echo url('News/ajax_status'); ?>", {
            id: id,
            is_hot: is_hot
        }, function(data) {
            location.reload();
            $("#editAdminForm").html(data);
        })
    }

    function status1(obj, id, status) {
        $.post("<?php echo url('News/ajax_status'); ?>", {
            id: id,
            status: status
        }, function(data) {
            location.reload();
            $("#editAdminForm").html(data);
        })
    }

    function find(id) {
        $.post("<?php echo url('News/ajax_find'); ?>", {
            id: id
        }, function(data) {
            $("#editAdminForm").html(data);
        })
    }

    // 无刷新的删除

    function del(obj, id) {
        //询问框

        layer.confirm('您确认要删除？', {
            btn: ['确认', '取消'] //按钮
        }, function() {
            // 发送ajax请求删除

            $.get("<?php echo url('News/del'); ?>", {
                id: id
            }, function(data) {

                // 判断返回值
                if (data == 1) {
                    layer.msg('删除成功');
                    $(obj).parent().parent().remove();
                    layer.close();

                } else {
                    layer.msg('删除失败');
                    layer.close();
                }
            })
        }, function() {
            // 取消按钮相关处理
            layer.close();
        });


    }
    // 删除所有的方法

    function delAll(img) {
        //询问框

        layer.confirm('您确认要删除？', {
            btn: ['确认', '取消'] //按钮
        }, function() {
            // 确认按钮相关的处理
            let checkbox = $("[type=checkbox]:checked").not(".all");

            let str = "";
            checkbox.each(function() {
                str += $(this).val() + ',';
            });

            // 发送ajax请求删除

            $.get("<?php echo url('News/ajax_delAll'); ?>", {
                str: str,
                img
            }, function(data) {
                // 判断是否删除成功

                if (data == 1) {

                    layer.msg('删除成功', {
                        time: 1000
                    }, function() {
                        window.location.reload();
                    });
                } else {
                    layer.msg('删除失败');
                    layer.close();

                }
            })
        }, function() {
            // 取消按钮相关处理
            layer.close();
        });
    }
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