<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/www/wwwroot/priactise/public/../application/admin/view/admin/index.html";i:1648745320;s:59:"/www/wwwroot/priactise/application/admin/view/uekadmin.html";i:1651294367;}*/ ?>
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
<script src="/static/layer/layer.js"></script>

<!-- 内容 -->
<div class="col-md-10">

    <ol class="breadcrumb">
        <li><a href="<?php echo url('index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
        <li><a href="<?php echo url('admin/index'); ?>">管理员管理</a></li>
        <li class="active">管理员列表</li>

        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
    </ol>

    <!-- 面版 -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-danger" onclick="delAll()"><span class="glyphicon glyphicon-trash"></span>
                批量删除</button>
            <a href="javascript:;" data-toggle="modal" data-target="#addAdmin" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> 添加管理员
            </a>

            <p class="pull-right tots">共有 <?php echo $tot; ?> 条数据</p>
            <form action="" class="form-inline pull-right">
                <div class="form-group">
                    <input type="text" name="search" value="<?php echo (isset($_GET['search']) && ($_GET['search'] !== '')?$_GET['search']:''); ?>" class="form-control" placeholder="请输入你要搜索的内容" id="">
                </div>

                <input type="submit" value="搜索" class="btn btn-success">
            </form>


        </div>
        <table class="table-bordered table table-hover">
            <th><input type="checkbox" name="" class="all" id=""></th>
            <th>ID</th>
            <th>用户名</th>
            <th>注册时间</th>
            <th>更新时间</th>
            <th>上次登录时间</th>
            <th>状态</th>
            <th>操作</th>

            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="" value="<?php echo $value['id']; ?>" id=""></td>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['create_time']; ?></td>
                <td><?php echo $value['update_time']; ?></td>
                <td>
                    <?php echo $value['login_time']?$value['login_time']:"该用户未登录";?>
                </td>
                <td>
                    <?php if($value['status'] == 1): ?>
                    <!-- 点击后状态码变为1 -->
                    <button class="btn btn-success" onclick="status(this,<?php echo $value['id']; ?>,2)">已登录</button> <?php elseif($value['status'] == 3): ?><button class="btn btn-danger" onclick="status(this,<?php echo $value['id']; ?>,2)">黑名单</button> <?php else: ?>
                    <!-- 点击后状态码变为0 -->
                    <button class="btn btn-danger" onclick="status(this,<?php echo $value['id']; ?>,1)">未登录</button> <?php endif; ?>
                </td>
                <td>
                    <a href="javascript:;" onclick="find(<?php echo $value['id']; ?>)" data-toggle="modal" data-target="#editAdmin" class="glyphicon glyphicon-pencil"></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="javascript:;" onclick="del(this,<?php echo $value['id']; ?>)" class="glyphicon glyphicon-trash"></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>


        </table>
        <!-- 分页效果 -->
        <div class="panel-footer">
            <nav style="text-align:center;">
                <?php echo $list->render(); ?>
            </nav>
        </div>
    </div>
</div>


<!-- 添加页面的摸态框 -->
<div class="modal fade" id="addAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">添加管理员</h4>
            </div>
            <div class="modal-body">
                <form action="" id="addAdminForm">
                    <div class="form-group ">
                        <label for="">用户名</label>
                        <input type="text" name="username" class="form-control addAdmin" placeholder="请输入管理员账号名" id="">
                        <div class="alert alert-warning"></div>

                    </div>
                    <div class="form-group">
                        <label for="">密码</label>
                        <input type="password" name="password" class="form-control addAdmin" placeholder="请输入管理员密码" id="">
                        <div class="alert alert-warning"></div>

                    </div>
                    <div class="form-group">
                        <label for="">确认密码</label>
                        <input type="password" name="repassword" class="form-control addAdmin" placeholder="请再次输入密码" id="">
                        <div class="alert alert-warning"></div>

                    </div>

                    <div class="form-group">
                        <label for="">状态</label>
                        <div>
                            <label><input type="radio" name="status" checked value="2" id="">未登录</label>
                            <label><input type="radio" name="status" value="1" id="">已登录</label>
                            <label><input type="radio" name="status" value="3" id="">黑名单</label>
                        </div>

                    </div>
                    <div class="form-group pull-right">
                        <input type="button" onclick="add()" value="提交" class="btn btn-success">
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


<!-- 修改页面的摸态框 -->
<div class="modal fade" id="editAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改管理员</h4>
            </div>
            <div class="modal-body">
                <form action="" id="editAdminForm">

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    // ajax 修改用户状态

    function status(obj, id, status) {

        // 发送ajax请求

        $.get("<?php echo url('Admin/ajax_status'); ?>", {
            id: id,
            status: status
        }, function(data) {

            // 通过判断

            if (data == 1) {
                layer.msg("修改状态成功", {
                    icon: 6,
                    time: 1000
                }, function() {

                    // 如果修改成功
                    location.reload();

                    // 根据状态值，修改状态的显示
                    if (status == 1) {

                        $(obj).parent().html('<span class="btn btn-danger" onclick="status(this,' + id +
                            ',0)">未登录</span>');
                    } else {

                        $(obj).parent().html('<span class="btn btn-success" onclick="status(this,' +
                            id + ',1)">已登录</span>');
                    }
                });

            } else {
                layer.msg("修改状态失败", {
                    icon: 2
                });
            }
        });

    }
    // 查询对应的数据

    function find(id) {

        // 发送ajax请求

        $.get("<?php echo url('admin/ajax_find'); ?>", {
            id: id
        }, function(data) {
            $("#editAdminForm").html(data); //将数据放到表单中 返回的数据是一个表单页面
        })
    }
    // 无刷新的删除

    function del(obj, id) {
        //询问框

        layer.confirm('您确认要删除？', {
            btn: ['确认', '取消'] //按钮
        }, function() {
            // 发送ajax请求删除

            $.get("<?php echo url('admin/ajax_del_all'); ?>", {
                str: id
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

    function delAll() {
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

            $.get("<?php echo url('admin/ajax_del_all'); ?>", {
                str: str
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
    // 复选框

    $(".all[type=checkbox]").click(function() {

        let checked = $(this).prop("checked");

        $("[type=checkbox]").not(".all").prop("checked", checked);
    });
    // 检测用户名

    $(".addAdmin[name=username]").blur(function() {
        // 获取输入框中的内容

        let val = $(this).val();

        // 判断内容是否存在

        if (val) {
            // 判断用户名长度
            if (val.length >= 6 && val.length <= 12) {
                // 检测用户名是否注册

                $.get("<?php echo url('Admin/ajax_username'); ?>", {
                    username: val
                }, function(data) {
                    // 根据data进行判断

                    if (data == 1) {
                        $(".addAdmin[name=username]").next().show(100).html('用户名已经注册');
                        $(".addAdmin[name=username]").attr("isok", 0);

                    } else {

                        $(".addAdmin[name=username]").next().hide(100);
                        $(".addAdmin[name=username]").attr("isok", 1);

                    }
                })
            } else {
                $(this).next().show(100).html('用户名长度6-12位');
                $(this).attr("isOk", 0);

            }
        } else {
            $(this).next().show(100).html('请输入用户名');
            $(this).attr("isOk", 0);
        }


    });

    // 检测密码
    $(".addAdmin[name=password]").blur(function() {
        // 获取输入框中的内容

        let val = $(this).val();

        // 判断用户是否输入密码

        if (val) {
            // 检测密码长度
            if (val.length >= 6 && val.length <= 12) {
                $(this).next().hide(100);
                $(this).attr("isOk", 1);


            } else {
                $(this).next().show(100).html('密码长度6-12为之间');
                $(this).attr("isOk", 0);

            }
        } else {
            $(this).next().show(100).html('请输入密码');
            $(this).attr("isOk", 0);


        }
    });

    // 确认密码

    $(".addAdmin[name=repassword]").blur(function() {
        // 获取到确认密码

        let repass = $(this).val();
        let pass = $(".addAdmin[name=password]").val();

        // 判断密码是否一致

        if (repass == pass && pass) {
            $(this).next().hide(100);
            $(this).attr("isOk", 1);

        } else {
            $(this).next().show(100).html('两次密码不一致');
            $(this).attr("isOk", 0);


        }
    });

    // 提交表单方法 

    function add() {
        // 让所有的input失去焦点
        $(".addAdmin").blur();

        // 判断每一个输入框是否成功
        let tot = 0;
        $(".addAdmin").each(function() {

            tot += Number($(this).attr("isok"));
        });

        // 判断是否提交

        if (tot == $(".addAdmin").length) {

            let str = $("#addAdminForm").serializeArray();


            // 发送ajax请求

            $.post("<?php echo url('Admin/ajax_add'); ?>", str, function(data) {

                // 判断


                if (data.code == 200) {

                    layer.msg(data.info, {
                        time: 1000
                    }, function() {
                        // 成功重新加载本页面
                        window.location.reload();
                    });

                } else {

                    // 提示增加失败
                    layer.msg(data.info);

                    // 重新添加
                }
            });

        };

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