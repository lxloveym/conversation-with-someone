<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/priactise/public/../application/index/view/search/index.html";i:1681611686;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"心灵的窗口"</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="/cssone/search.css">
    <link rel="stylesheet" href="/cssone/base.css">

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
    
    <div class="w">
        <div class="head">
            <?php if($category == 1): ?>
            <h2>搜索结果</h2>
            <?php elseif($category == 2): ?>
            <h2>热门书籍</h2>
            <?php elseif($category == 3): ?>
            <h2>文学类</h2>
            <?php elseif($category == 4): ?>
            <h2>故事类</h2>
            <?php elseif($category == 5): ?>
            <h2>青春校园类</h2>
            <?php elseif($category == 7): ?>
            <h2>小说类</h2>
            <?php endif; ?>
        </div>
        <div class="search2">
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$val): ?>
                <a href="<?php echo url('read',array('id'=>$val['id'])); ?>" target="_blank">
                <li>
                    <div class="zuo1a">
                        <h4>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                            <img src="/images/not.jpg" alt=""> <?php endif; ?>
                        </h4>
                        <h1>作者:<?php echo $val['author']; ?></h1>
                    </div>
                    <div class="zhong1a">
                        <h1>作品简介</h1>
                        <p>
                            <?php echo $val['introduction']; ?>
                        </p>
                    </div>
                    <div class="you1a">
                        <!--<?php if(isset($name)): ?>-->
                        <!--    <a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>"><button>收藏</button></a> <?php else: ?>-->
                        <!--    <a href="javascript:;"-->
                        <!--            style="pointer-events:none"><button style="pointer-events:none">请先登录</button></a> <?php endif; ?>-->
                        <button><a href="javascript:;">收藏</a></button>
                    </div>
                </li>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</body>

</html>