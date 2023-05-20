<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\collection\index.html";i:1651175607;s:37:"../application/index/view/common.html";i:1651175069;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在这里，充实自己，给你进步的阶梯</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
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
            <li <?php if(isset($five)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/index/tree'); ?>">树洞</a></li>
            <li <?php if(isset($six)): ?>style="border-bottom: 3px solid #444" <?php endif; ?>> <a href="<?php echo url('/index/user'); ?>">个人中心</a></li>
            <form action="<?php echo url('/index/search'); ?>" method="POST" enctype="multipart/form-data" class="search">
                <input type="text" class="one" placeholder="更多精彩请搜索" name="keywords" required="required">
                <button class="two" action="goto" type="submit">搜索</button>
            </form>
        </ul>
    </div>
<div class="zong">
    <!-- 最热 -->
    <div class="hot">
        <div class="zimu">
            <ul class="markey">
                <!-- <li>
                            <h1>宁静方能致远！</h1>
                        </li>
                        <li>
                            <h1>书籍是人类进步的阶梯！</h1>
                        </li>
                        <li>
                            <h1>读万卷书，行万里路！</h1>
                        </li>
                        <li>
                            <h1>今天，你学了吗？</h1>
                        </li> -->
            </ul>
        </div>
        <div class="catalogue">
            <span class="er">
                <h2>我的收藏</h2>
            </span>
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$val): ?>
                <a href="<?php echo url('read',array('id'=>$val['id'])); ?>">
                    <li blur>
                        <div class="zuo"><?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?></div>
                        <div class="you">
                            <div class="jieshao">
                                <h4>作品简介</h4>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                                <?php if(isset($name)): ?>
                                <button><a href="<?php echo url('del_cl',array('id' => $val['id'])); ?>">取消收藏</a></button> <?php else: ?>
                                <button style="pointer-events:none"><a href="javascript:;"
                                        style="pointer-events:none">请先登录</a></button> <?php endif; ?>
                            </div>
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
<script>
    $('.jieshao button').on('click', function() {
        var li = $(this).parent().clone();
        $(this).html('已收藏').css({
            'background': '#ccc',
        });
    })
</script>