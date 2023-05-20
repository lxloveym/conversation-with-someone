<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\user\findone.html";i:1651077908;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>资料修改</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/userone.css">
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
                <form action="<?php echo url('update_one'); ?>" method="post">
                    <h1>基本资料</h1>
                    <li>个性签名:<span><input type="text" placeholder="" name="autograph" value="<?php echo $data['autograph']; ?>"></span>
                    </li>
                    <li>用户昵称:<span><input type="text" placeholder="" name="nickname" value="<?php echo $data['nickname']; ?>"></span>
                    </li>
                    <h3><button type="submit">保存</button></h3>
                </form>
            </div>
        </div>
    </div>

</body>

</html>