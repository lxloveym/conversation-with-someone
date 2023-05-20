<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\hot\index.html";i:1651170162;s:37:"../application/index/view/common.html";i:1651169630;}*/ ?>
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
    <script src="/js/echarts.min.js"></script>
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
            <?php if(is_array($column) || $column instanceof \think\Collection || $column instanceof \think\Paginator): if( count($column)==0 ) : echo "" ;else: foreach($column as $key=>$val): if($val['id'] == 1): ?>
            <li class="you">
                <a href="<?php echo url($val['goto']); ?>"><?php echo $val['name']; ?></a>
            </li><?php else: ?>
            <li>
                <a href="<?php echo url($val['goto']); ?>"><?php echo $val['name']; ?></a>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                <h2>热门书籍</h2>
            </span>
            <ul>
                <?php if(is_array($hot_data) || $hot_data instanceof \think\Collection || $hot_data instanceof \think\Paginator): if( count($hot_data)==0 ) : echo "" ;else: foreach($hot_data as $key=>$val): ?>
                <li blur>
                    <div class="zuo"><?php if($val['img'] != null): ?>
                        <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                        <img src="/images/not.jpg" alt=""><?php endif; ?></div>
                    <div class="you">
                        <div class="jieshao">
                            <h4>作品简介</h4>
                            <p><?php echo $val['introduction']; ?>
                            </p>
                            <a href="#"><button>收藏</button></a>
                        </div>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
</body>

</html>