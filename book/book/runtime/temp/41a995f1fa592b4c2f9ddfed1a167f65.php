<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/priactise/public/../application/index/view/collection/index.html";i:1651261091;s:37:"../application/index/view/common.html";i:1651294871;}*/ ?>
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
    <div class="timew" blur>
        <div class="time">
            <div class="run">
                <!-- 改动 -->
                <div class="circle">
                    快捷操作
                </div>
                <!-- 改动 -->
            </div>
            <?php if(!isset($name)): ?>
            <h4>登录记录浏览时长</h4>
            <?php else: ?>
            <h4>结算浏览时长</h4>
            <?php endif; ?>
            <div class="realt">
                <ul>
                    <?php if(isset($name)): ?>
                    <a href="<?php echo url('/index/loginout'); ?>">
                        <li>退出登录</li>
                    </a> <?php else: ?>
                    <a href="<?php echo url('/index/login'); ?>">
                        <li>登录/注册</li>
                    </a> <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 导航栏 -->
    <div class="nav">
        <ul>
            <li <?php if(isset($one)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index'); ?>">首页</a></li>
            <li <?php if(isset($two)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/recommend'); ?>">猜你喜欢</a></li>
            <li <?php if(isset($three)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/collection'); ?>">我的收藏</a></li>
            <li <?php if(isset($four)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/shouhuo'); ?>">美句</a></li>
            <?php if(!isset($name)): ?>
            <li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index/tree'); ?>" >树洞</a></li><?php else: ?>
            <li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index/tree'); ?>" target="_blank">树洞</a></li><?php endif; ?>
            <li <?php if(isset($six)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/user'); ?>">个人中心</a></li>
            <form action="<?php echo url('/index/search'); ?>" method="POST" enctype="multipart/form-data" class="search" target="_blank">
                <input type="text" class="one" placeholder="更多精彩请搜索" name="keywords" required="required">
                <button class="two" action="goto" type="submit">搜索</button>
            </form>
        </ul>
    </div>
<div class="zong">
    <!-- 智能推荐 -->
    <div class="w">
        <!--<div class="head">-->
        <!--    <h2>猜你喜欢</h2>-->
        <!--</div>-->
        <div class="search2">
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$val): ?>
                <a href="<?php echo url('read',array('id'=>$val['id'])); ?>" target="_blank">
                    <li blur>
                        <div class="zuo1a">
                            <h4>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                            <img src="/images/not.jpg" alt=""> <?php endif; ?>
                            </h4>
                            <h1>作者：<?php echo $val['author']; ?></h1>
                        </div>
                        <div class="zhong1a">
                            <h1>作品简介</h1>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </div>
                        <div class="you1a">
                            <?php if(isset($name)): ?>
                                <a href="<?php echo url('del_cl',array('id' => $val['id'])); ?>"><button>取消收藏</button></a> <?php else: ?>
                                <a href="javascript:;"
                                    style="pointer-events:none"><button style="pointer-events:none">请先登录</button></a> <?php endif; ?>
                        </div>
                    </li>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>

</body>

</html>
