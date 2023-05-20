<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpstudy_pro\WWW\priactise\public/../application/index\view\login\index.html";i:1651169552;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录，注册</title>
    <link rel="shortcut icon" href="/images/favicon-2021082605202820.ico" />
    <script src="/js/jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-position: center;
            background: url(/imagesone/img10.jpg) no-repeat fixed center;
            background-size: cover;
        }
        
        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, .8);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
            border-radius: 10px;
        }
        
        .box h2,
        .box1 h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }
        
        .box .inputBox,
        .box1 .input {
            position: relative;
        }
        
        .box .inputBox input,
        .box1 .input input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            letter-spacing: 1px;
            border: none;
            outline: none;
            border-bottom: 1px solid #fff;
            background: transparent;
        }
        
        .box input[type="submit"],
        .box1 input[type="submit"] {
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            background: #03a9f4;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        .box1 {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, .8);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
            border-radius: 10px;
        }
        
        .add,
        .add1 {
            margin-left: 90px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Login</h2>
        <form action="<?php echo url('check'); ?>" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="text" name="username" required="" value="" placeholder="用户名">
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="" value="" placeholder="密码">
            </div>
            <input type="submit" name="" value="Submit">
        </form>
        <div class="add"><em>没有账号，立即注册</em></div>
    </div>
    <div class="box1">
        <h2>注册</h2>
        <form action="<?php echo url('add'); ?>" method="POST" enctype="multipart/form-data">
            <div class="input">
                <input type="text" name="username" required="" placeholder="请输入用户名">
            </div>
            <div class="input">
                <input type="password" name="password1" required="" placeholder="请输入密码">
            </div>
            <div class="input">
                <input type="password" name="password2" required="" placeholder="请确认密码">
            </div>
            <input type="submit" name="" value="提交">
        </form>
        <div class="add1"><em>已有账号，立即登录</em></div>
    </div>
    <script>
        $(function() {
            $('.add').click(function() {
                $('.box1').show();
                $('.box').hide();
            })
            $('.add1').click(function() {
                $('.box').show();
                $('.box1').hide();
            })
        })
    </script>
</body>

</html>