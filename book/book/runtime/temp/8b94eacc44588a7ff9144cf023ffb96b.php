<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/priactise/public/../application/index/view/user/findtwo.html";i:1651239113;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"心灵的窗口"</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/usertwo.css">
    <link rel="shortcut icon" href="/images/favicon.ico" />
</head>

<body>
    <!-- 顶部开始 -->
    <div class="dingbu">
        <div class="left1">

        </div>

        <div class="right1">
            <p><?php if(isset($data) && $data['user_image'] != null): ?><img src="/upload/user/<?php echo $data['user_image']; ?>" alt=""><?php else: ?><img src="/upload/user/head.jpg" alt=""><?php endif; ?></p>
            <i> <a href="#"><?php echo $data['username']; ?></a></i><em> <a href="<?php echo url('index'); ?>">退出</a></em>
        </div>
    </div>
    <div class="st1">
        <div class="oo">
            <div class="left2">
                <?php if(isset($data) && $data['user_image'] != null): ?><img src="/upload/user/<?php echo $data['user_image']; ?>" alt=""><?php else: ?><img src="/upload/user/head.jpg" alt=""><?php endif; ?>
                <h1><?php echo $data['username']; ?></h1>
            </div>
            <div class="left3">
                <ul>
                    <li><a href="<?php echo url('findone'); ?>">基本资料</a></li>
                    <li><a href="<?php echo url('findtwo'); ?>">头像设置</a></li>
                    <li><a href="<?php echo url('findthree'); ?>">密码修改</a></li>

                </ul>
            </div>
            <div class="right2">
                <form action="<?php echo url('update_two'); ?>" enctype="multipart/form-data" method="post">
                    <h1>头像设置</h1>
                    <li>当前头像:<span><?php if(isset($data) && $data['user_image'] != null): ?><img
                                src="/upload/user/<?php echo $data['user_image']; ?>" alt=""><?php else: ?><img src="/upload/user/head.jpg"
                                alt=""><?php endif; ?></span></li>
                    <li>上传头像:<span><input type="file" name="user_image"></span></li>


                    <h3><button type="submit">保存</button></h3>
                </form>
            </div>
        </div>
    </div>

</body>

</html>