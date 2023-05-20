<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/www/wwwroot/priactise/public/../application/index/view/index/index.html";i:1681611630;s:37:"../application/index/view/common.html";i:1681611774;}*/ ?>
<!--<header blur>-->
<!--    <h1>欢迎来到书的世界！</h1>-->
<!--</header>-->
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
    <!-- 首页 -->
    <div class="content">
        <div class="neirong">
            <div class="h3">
                <div class="nei-left" blur>
                    <a href="#yi5">热门书籍</a>
                    <a href="#yi1">文学类</a>
                    <a href="#yi2">故事类</a>
                    <a href="#yi3">青春校园类</a>
                    <a href="#yi4">小说类</a>
                </div>
                <div class="nei-right">
                    <div class="topText">
                        <div style="font-family:宋体;">一杯淡茶，一本书；一缕阳光，一个人</div>
                        <div style="font-family:宋体;">是生活，也是人生！</div>
                    </div>
                    <img src="/imagesone/three.webp" alt="">
                </div>
            </div>
            <div class="main1 global">
                <div class="linkto" id="yi5"></div>
                <span class="yi">
                    <h2>热门书籍</h2>
                </span>
                <ol><a href="<?php echo url('more',array('id'=>1)); ?>" target="_blank">更多 >></a></ol>
                <ul>
                    <?php if(is_array($hot_data) || $hot_data instanceof \think\Collection || $hot_data instanceof \think\Paginator): if( count($hot_data)==0 ) : echo "" ;else: foreach($hot_data as $key=>$val): ?>
                    <li blur>
                        <a class="box_a" href="<?php echo url('read',array('id' => $val['id'])); ?>" target="_blank">
                            <div class="zuo1">
                                <h4><?php if($val['img'] != null): ?>
                                    <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                                    <img src="/images/not.jpg" alt=""><?php endif; ?></h4>
                                <h1><?php echo $val['author']; ?></h1>
                            </div>
                            <div class="zhong1">
                                <h1>作品简介</h1>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                            </div>
                        </a>
                        <div class="you1">
                            <!--<?php if(isset($name)): ?>-->
                            <!--<button><a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>">收藏</a></button> <?php else: ?>-->
                            <!--<button style="pointer-events:none"><a href="javascript:;"-->
                            <!--        style="pointer-events:none">请先登录</a></button> <?php endif; ?>-->
                            <button><a href="javascript:;">收藏</a></button>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <div class="linkto" id="yi1"></div>
                <span class="yi">
                    <h2>文学类</h2>
                </span>
                <ol><a href="<?php echo url('more',array('id'=>2)); ?>" target="_blank">更多 >></a></ol>
                <ul>
                    <?php if(is_array($wx_data) || $wx_data instanceof \think\Collection || $wx_data instanceof \think\Paginator): if( count($wx_data)==0 ) : echo "" ;else: foreach($wx_data as $key=>$val): ?>
                    <li blur>
                        <a class="box_a" href="<?php echo url('read',array('id' => $val['id'])); ?>" target="_blank">
                            <div class="zuo1">
                                <h4><?php if($val['img'] != null): ?>
                                    <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                                    <img src="/images/not.jpg" alt=""><?php endif; ?></h4>
                                <h1><?php echo $val['author']; ?></h1>
                            </div>
                            <div class="zhong1">
                                <h1>作品简介</h1>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                            </div>
                        </a>
                        <div class="you1">
                            <!--<?php if(isset($name)): ?>-->
                            <!--<button><a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>">收藏</a></button> <?php else: ?>-->
                            <!--<button style="pointer-events:none"><a href="javascript:;"-->
                            <!--        style="pointer-events:none">请先登录</a></button> <?php endif; ?>-->
                            <button><a href="javascript:;">收藏</a></button>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <div class="linkto" id="yi2"></div>
                <span class="yi">
                    <h2>故事类</h2>
                </span>
                <ol><a href="<?php echo url('more',array('id'=>3)); ?>" target="_blank">更多 >></a></ol>
                <ul>
                    <?php if(is_array($gs_data) || $gs_data instanceof \think\Collection || $gs_data instanceof \think\Paginator): if( count($gs_data)==0 ) : echo "" ;else: foreach($gs_data as $key=>$val): ?>
                    <li blur>
                        <a class="box_a" href="<?php echo url('read',array('id' => $val['id'])); ?>" target="_blank">
                            <div class="zuo1">
                                <h4><?php if($val['img'] != null): ?>
                                    <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                                    <img src="/images/not.jpg" alt=""><?php endif; ?></h4>
                                <h1><?php echo $val['author']; ?></h1>
                            </div>
                            <div class="zhong1">
                                <h1>作品简介</h1>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                            </div>
                        </a>
                        <div class="you1">
                            <!--<?php if(isset($name)): ?>-->
                            <!--<button><a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>">收藏</a></button> <?php else: ?>-->
                            <!--<button style="pointer-events:none"><a href="javascript:;"-->
                            <!--        style="pointer-events:none">请先登录</a></button> <?php endif; ?>-->
                                    <button><a href="javascript:;">收藏</a></button>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <div class="linkto" id="yi3"></div>
                <span class="yi">
                    <h2>青春校园类</h2>
                </span>
                <ol><a href="<?php echo url('more',array('id'=>4)); ?>" target="_blank">更多 >></a></ol>
                <ul>
                    <?php if(is_array($qc_data) || $qc_data instanceof \think\Collection || $qc_data instanceof \think\Paginator): if( count($qc_data)==0 ) : echo "" ;else: foreach($qc_data as $key=>$val): ?>
                    <li blur>
                        <a class="box_a" href="<?php echo url('read',array('id' => $val['id'])); ?>" target="_blank">
                            <div class="zuo1">
                                <h4><?php if($val['img'] != null): ?>
                                    <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                                    <img src="/images/not.jpg" alt=""><?php endif; ?></h4>
                                <h1><?php echo $val['author']; ?></h1>
                            </div>
                            <div class="zhong1">
                                <h1>作品简介</h1>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                            </div>
                        </a>
                        <div class="you1">
                            <!--<?php if(isset($name)): ?>-->
                            <!--<button><a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>">收藏</a></button> <?php else: ?>-->
                            <!--<button style="pointer-events:none"><a href="javascript:;"-->
                            <!--        style="pointer-events:none">请先登录</a></button> <?php endif; ?>-->
                                    <button><a href="javascript:;">收藏</a></button>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <div class="linkto" id="yi4"></div>
                <span class="yi">
                    <h2>小说类</h2>
                </span>
                <ol><a href="<?php echo url('more',array('id'=>5)); ?>" target="_blank">更多 >></a></ol>
                <ul>
                    <?php if(is_array($xs_data) || $xs_data instanceof \think\Collection || $xs_data instanceof \think\Paginator): if( count($xs_data)==0 ) : echo "" ;else: foreach($xs_data as $key=>$val): ?>
                    <li blur>
                        <a class="box_a" href="<?php echo url('read',array('id' => $val['id'])); ?>" target="_blank">
                            <div class="zuo1">
                                <h4><?php if($val['img'] != null): ?>
                                    <img src="/upload/tmp/<?php echo $val['img']; ?>" alt=""> <?php else: ?>
                                    <img src="/images/not.jpg" alt=""><?php endif; ?></h4>
                                <h1><?php echo $val['author']; ?></h1>
                            </div>
                            <div class="zhong1">
                                <h1>作品简介</h1>
                                <p><?php echo $val['introduction']; ?>
                                </p>
                            </div>
                        </a>
                        <div class="you1">
                            <!--<?php if(isset($name)): ?>-->
                            <!--<button><a href="<?php echo url('add_cl',array('id' => $val['id'])); ?>">收藏</a></button> <?php else: ?>-->
                            <!--<button style="pointer-events:none"><a href="javascript:;"-->
                            <!--        style="pointer-events:none">请先登录</a></button> <?php endif; ?>-->
                                    <button><a href="javascript:;">收藏</a></button>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="footer" blur>
                <h2>到底了哦，更多精彩请搜索哦！</h2>
            </div>
        </div>
    </div>
</div>
</body>

</html>