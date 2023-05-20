<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\search\index.html";i:1651169138;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>搜索结果</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
    <link rel="stylesheet" href="/cssone/search.css">
    <link rel="stylesheet" href="/cssone/base.css">

    <script src="/jsone/index.js"></script>

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
    <div class="w">
        <div class="head">
            <h2>搜索结果</h2>
        </div>
        <div class="search2">
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$val): ?>
                <li>
                    <div class="zuo1">
                        <h4>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/news/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                            <img src="/images/not.jpg" alt=""> <?php endif; ?>
                        </h4>
                        <h1>作者:<?php echo $val['author']; ?></h1>
                    </div>
                    <div class="zhong1">
                        <h1>作品简介</h1>
                        <p>
                            <?php echo $val['introduction']; ?>
                        </p>
                    </div>
                    <div class="you1">
                        <a href="#"><button>收藏</button></a>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</body>

</html>