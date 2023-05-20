<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/www/wwwroot/priactise/public/../application/index/view/user/index.html";i:1651240041;s:37:"../application/index/view/common.html";i:1681562888;}*/ ?>
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
    <!-- 个人中心 -->
    <div class="mine">
        <div class="bg">
            <div class="tou">
                <?php if(isset($name) && $name['user_image'] != null): ?><img src="/upload/user/<?php echo $name['user_image']; ?>" alt="" style="width: 100%;height: 100%;border-radius: 50%;"><?php else: ?><img src="/upload/user/head.jpg" alt="" style="width: 100%;height: 100%;border-radius: 50%;"><?php endif; ?>
            </div>
            <?php if(isset($name)): ?>
            <!-- <form action="" class="go">
                <input type="file" name="user_image">
                <input type="submit" value="上传">
            </form> -->
            <?php endif; ?>
        </div>
        <div class="mysaid">
            <h4>个人资料</h4>
            <div class="said5">
                <div class="hd">
                    <?php if(isset($name)): ?>
                    <a href="<?php echo url('findone',array('id'=>$name['id'])); ?>" target="_blank"><button class="juan">编辑资料</button></a> <?php endif; ?>
                    <ul>
                        <li>
                            <h5>用户名：</h5> <?php if(isset($name)): ?>
                            <p><?php echo $name['username']; ?></p><?php else: ?>
                            <p>游客</p><?php endif; ?>
                        </li>
                        <li>
                            <h5>个性签名：</h5> <?php if(isset($name)): ?>
                            <p><?php echo $name['autograph']; ?></p><?php else: ?>
                            <p>无</p><?php endif; ?>
                        </li>
                        <li>
                            <h5>昵称：</h5> <?php if(isset($name)): ?>
                            <p><?php echo $name['nickname']; ?></p><?php else: ?>
                            <p>无</p><?php endif; ?>
                        </li>
                        <li>
                            <h5>上一次浏览时长：</h5> <?php if(isset($name)): ?>
                            <p><?php echo $name['last_time']; ?>小时</p><?php else: ?>
                            <p>游客未统计</p><?php endif; ?>
                        </li>
                    </ul>
                    <?php if(isset($name)): ?>
                    <div class="tu" style="width: var(--main-width);height: 400px;background: rgba(0, 0, 0, 0.5);margin-top: 40px;display:block;">
                    </div>
                    <script type="text/javascript">
                        var myChart = echarts.init(document.querySelector('.tu'));
                        var last_time = JSON.parse(atob("<?php echo base64_encode(json_encode($name['last_time'])); ?>"));
                        var year = JSON.parse(atob("<?php echo base64_encode(json_encode($time['year'])); ?>"));
                        var mouth = JSON.parse(atob("<?php echo base64_encode(json_encode($time['mouth'])); ?>"));
                        var day = JSON.parse(atob("<?php echo base64_encode(json_encode($time['day'])); ?>"));
                        var option = {
                            title: {
                                text: '用户浏览时长可视化界面(首次登录浏览时长为0)',
                                left: 'center',
                                textStyle:{
                                    color:'#fff'
                                }
                            },
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                orient: 'vertical',
                                left: 'left'
                            },
                            series: [{
                                name: '浏览时长以小时为单位',
                                type: 'pie',
                                radius: '50%',
                                data: [{
                                    value: year,
                                    name: '年浏览时长(退出登录后更新)',
                                }, {
                                    value: mouth,
                                    name: '月浏览时长(退出登录后更新)'
                                }, {
                                    value: day,
                                    name: '今日浏览时长(退出登录后更新)'
                                }, {
                                    value: last_time,
                                    name: '上一次浏览时长'
                                }, ],
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.7)'
                                    }
                                }
                            }],
                        };
                        myChart.setOption(option);
                    </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>