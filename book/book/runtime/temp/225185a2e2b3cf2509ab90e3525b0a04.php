<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\tree\index.html";i:1651173252;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>树洞</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
    <link rel="stylesheet" href="/cssone/tree.css">
    <link rel="stylesheet" href="/cssone/base.css">
</head>

<body>
    <div class="bb">
        <div class="aa">
            <div class="box" blur>
                <div class="box3">
                    <h1>树洞</h1>
                    <li>在这里，你可以向我诉说一切！</li>
                </div>
                <form action="<?php echo url('add'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="box1">
                        <div class="write"><textarea name="data"> </textarea>
                        </div>
                        <div class="cc">
                            <button type="submit">记录思绪</button>
                        </div>
                    </div>
                </form>
                <div class="box2">
                    <ul>
                        <?php if(is_array($get_data) || $get_data instanceof \think\Collection || $get_data instanceof \think\Paginator): if( count($get_data)==0 ) : echo "" ;else: foreach($get_data as $key=>$val): ?>
                        <li><?php echo $val['content']; ?></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</body>

</html>