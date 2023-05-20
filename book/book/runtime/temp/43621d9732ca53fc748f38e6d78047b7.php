<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\Index\index.html";i:1650898048;s:37:"../application/index/view/common.html";i:1650996493;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在这里，充实自己，给你进步的阶梯</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
    <link rel="stylesheet" href="/css/content.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/echarts.min.js"></script>
    <script src="/js/index.js"></script>
</head>

<body>
    <!-- 开头句 -->
    <!-- <header>
        <h1>欢迎来到书的世界！</h1>
    </header> -->
    <!-- 页面浏览计时 -->
    <div class="time">
        <div class="run">
            <img src="/images/奔跑小人.jpeg" alt="">
        </div>
        <h4>您已浏览：</h4>
        <div class="realt">

            <ul>
                <!-- <li class="shi"></li>
                <li class="fen"></li>
                <li class="miao"></li> -->
                <a href="<?php echo url('/index/loginout'); ?>">退出登录</a>
            </ul>
        </div>
    </div>
    <!-- 导航栏 -->
    <div class="nav">
        <ul>
            <?php if(is_array($column) || $column instanceof \think\Collection || $column instanceof \think\Paginator): if( count($column)==0 ) : echo "" ;else: foreach($column as $key=>$val): ?>
            <li <?php if(((input('param.id') == $val['id'] or isset($one)))): ?>style="border-bottom: 3px solid #fff" <?php endif; ?>> <a href="<?php echo url($val['goto']); ?>">
                <?php echo $val['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <form action="" method="POST" class="search">
                <input type="text" class="one" placeholder="更多精彩请搜索" name="keywords">
                <button class="two" action="goto" type="submit">搜索</button>
            </form>
        </ul>
    </div>
<div class="zong">
    <!-- 首页 -->
    <div class="content">
        <div class="neirong">
            <div class="h3">
                <h1 class="ju">一杯淡茶，一本书；一缕阳光，一个人</h1>
                <h1 class="ju1">是生活，也是人生！</h1>
            </div>
            <div class="main1 global">
                <span class="yi">
                    <h2>热门书籍</h2>
                </span>
                <ul>
                    <?php if(is_array($hot_data) || $hot_data instanceof \think\Collection || $hot_data instanceof \think\Paginator): if( count($hot_data)==0 ) : echo "" ;else: foreach($hot_data as $key=>$val): ?>
                    <li><span>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt="">
                            <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?>
                            <p><?php echo $val['book_name']; ?></p>
                        </span>
                        <a href="javascript:;">
                            <h4>作品简介</h4>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </a>
                        <button>收藏</button>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <span class="yi">
                    <h2>文学类</h2>
                </span>
                <ul>
                    <?php if(is_array($wx_data) || $wx_data instanceof \think\Collection || $wx_data instanceof \think\Paginator): if( count($wx_data)==0 ) : echo "" ;else: foreach($wx_data as $key=>$val): ?>
                    <li><span>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt="">
                            <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?>
                            <p><?php echo $val['book_name']; ?></p>
                        </span>
                        <a href="javascript:;">
                            <h4>作品简介</h4>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </a>
                        <button>收藏</button>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <span class="yi">
                    <h2>故事类</h2>
                </span>
                <ul>
                    <?php if(is_array($gs_data) || $gs_data instanceof \think\Collection || $gs_data instanceof \think\Paginator): if( count($gs_data)==0 ) : echo "" ;else: foreach($gs_data as $key=>$val): ?>
                    <li><span>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt="">
                            <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?>
                            <p><?php echo $val['book_name']; ?></p>
                        </span>
                        <a href="javascript:;">
                            <h4>作品简介</h4>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </a>
                        <button>收藏</button>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <span class="yi">
                    <h2>青春校园类</h2>
                </span>
                <ul>
                    <?php if(is_array($qc_data) || $qc_data instanceof \think\Collection || $qc_data instanceof \think\Paginator): if( count($qc_data)==0 ) : echo "" ;else: foreach($qc_data as $key=>$val): ?>
                    <li><span>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt="">
                            <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?>
                            <p>书籍名称：<?php echo $val['book_name']; ?></p>
                        </span>
                        <a href="javascript:;">
                            <h4>作品简介</h4>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </a>
                        <button>收藏</button>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="main1 global">
                <span class="yi">
                    <h2>小说类</h2>
                </span>
                <ul>
                    <?php if(is_array($xs_data) || $xs_data instanceof \think\Collection || $xs_data instanceof \think\Paginator): if( count($xs_data)==0 ) : echo "" ;else: foreach($xs_data as $key=>$val): ?>
                    <li><span>
                            <?php if($val['img'] != null): ?>
                            <img src="/upload/tmp/<?php echo $val['img']; ?>" alt="">
                            <?php else: ?>
                            <img src="/images/not.jpg" alt=""><?php endif; ?>
                            <p><?php echo $val['book_name']; ?></p>
                        </span>
                        <a href="javascript:;">
                            <h4>作品简介</h4>
                            <p>
                                <?php echo $val['introduction']; ?>
                            </p>
                        </a>
                        <button>收藏</button>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="footer">
                <h2>到底了哦，更多精彩请搜索哦！</h2>
            </div>
        </div>
    </div>
</div>
</body>

</html>