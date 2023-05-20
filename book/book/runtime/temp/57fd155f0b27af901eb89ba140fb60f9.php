<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/priactise/public/../application/index/view/read/index.html";i:1681563755;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"心灵的窗口"</title>
    <link rel="stylesheet" href="/cssone/read.css">
    <link rel="stylesheet" href="/cssone/base.css">
    <link rel="shortcut icon" href="/images/favicon.ico" />

    <script src="/jsone/jquery.min.js"></script>
    <script src="/jsone/index.js"></script>
</head>

<body>
    <!-- 页面浏览计时 -->
    <!--<div class="timew" blur>-->
    <!--    <div class="time">-->
    <!--        <div class="run">-->
                <!-- 改动 -->
    <!--            <div class="circle">-->
    <!--                快捷操作-->
    <!--            </div>-->
                <!-- 改动 -->
    <!--        </div>-->
    <!--        <?php if(!isset($name)): ?>-->
    <!--        <h4>登录记录浏览时长</h4>-->
    <!--        <?php else: ?>-->
    <!--        <h4>结算浏览时长</h4>-->
    <!--        <?php endif; ?>-->
    <!--        <div class="realt">-->
    <!--            <ul>-->
    <!--                <?php if(isset($name)): ?>-->
    <!--                <a href="<?php echo url('/index/loginout'); ?>">-->
    <!--                    <li>退出登录</li>-->
    <!--                </a> <?php else: ?>-->
    <!--                <a href="<?php echo url('/index/login'); ?>">-->
    <!--                    <li>登录/注册</li>-->
    <!--                </a> <?php endif; ?>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="every">
        <h2>进入阅读模式</h2>
        <h1 class="last"><?php echo $data['book_name']; ?></h1>
        <h3>作者：<?php echo $data['author']; ?></h3>
        <p class="pp">
            <?php echo $data['content']; ?>
        </p>
        <li>创作日期：<?php echo $data['create_time']; ?></li>
    </div>
</body>

</html>