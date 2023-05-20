<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/www/wwwroot/priactise/public/../application/index/view/shouhuo/index.html";i:1681614766;s:37:"../application/index/view/common.html";i:1681611774;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"心灵的窗口"</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="/cssone/content.css">
    <script src="/jsone/jquery.min.js"></script>
    <script src="/jsone/bootstrap.min.js"></script>
    <script src="/jsone/index.js"></script>
    <script src="/jsone/echarts.min.js"></script>
</head>

<body>
    <!-- 页面浏览计时 -->
    <!--<div class="timew" blur>-->
    <!--    <div class="time">-->
    <!--        <div class="run">-->
                 <!--改动 -->
    <!--            <div class="circle">-->
    <!--                快捷操作-->
    <!--            </div>-->
                 <!--改动 -->
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
    <!-- 导航栏 -->
    <div class="nav" style="display:block;">
        <ul>
            <li <?php if(isset($one)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index'); ?>">首页</a></li>
            <li <?php if(isset($two)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/recommend'); ?>">猜你喜欢</a></li>
            <!--<li <?php if(isset($three)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/collection'); ?>">我的收藏</a></li>-->
            <li <?php if(isset($four)): ?>style="border-bottom: 3px solid #444;" <?php endif; ?>> <a href="<?php echo url('/index/shouhuo'); ?>">美句</a></li>
            <!--<?php if(!isset($name)): ?>-->
            <!--<li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index/tree'); ?>" >树洞</a></li><?php else: ?>-->
            <!--<li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index/tree'); ?>" target="_blank">树洞</a></li><?php endif; ?>-->
            <li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="http://120.26.61.97/">去树洞</a></li>
            <!--<li <?php if(isset($six)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/user'); ?>">个人中心</a></li>-->
            <form action="<?php echo url('/index/search'); ?>" method="POST" enctype="multipart/form-data" class="search">
                <input type="text" class="one" placeholder="更多精彩请搜索" name="keywords" required="required">
                <button class="two" action="goto" type="submit">搜索</button>
            </form>
        </ul>
    </div>
<div class="zong">
    <!-- 美句 -->
    <div class="goodsen">
        <!-- 字幕 -->
        <div class="zimu">
            <!-- <ul class="markey">
                <li>
                    <h1>好记性不如烂笔头，</h1>
                </li>
                <li>
                    <h1>喜欢就记下来；</h1>
                </li>
                <li>
                    <h1>学习别人，</h1>
                </li>
                <li>
                    <h1>突破自己。</h1>
                </li>
            </ul> -->
        </div>
        <!-- 名人名言 -->
        <div class="mingyan">
            <span class="san">
                <h2>名人名言</h2>
            </span>
            <ul>
                <?php if(is_array($good_data) || $good_data instanceof \think\Collection || $good_data instanceof \think\Paginator): if( count($good_data)==0 ) : echo "" ;else: foreach($good_data as $key=>$val): ?>
                <li><?php echo $val['content']; ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

    </div>
</div>
</body>

</html>