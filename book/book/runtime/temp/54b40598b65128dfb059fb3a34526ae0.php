<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/priactise/public/../application/index/view/tree/index.html";i:1651294975;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>"心灵的窗口"</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
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
                <!-- <form action=""> -->
                <div class="box1">

                    <!-- <span>日期：</span>
                    <i><input type="text">年</i>
                   
                    <em><input type="text">月</em>
                    <div class="xq"><input type="text">日</div> -->
                    <div class="write"><textarea> </textarea>
                    </div>
                    <div class="cc">
                        <a href="#"> <button>记录思绪</button></a>
                    </div>
                    <!-- <div class="dd">
                        <img src="./images/hmbb.gif" alt="">
                    </div> -->
                </div>
                <!-- </form> -->
                <!-- <div class="box3">
                 
                </div> -->
                <div class="box2">
                    <ul>

                    </ul>
                </div>

            </div>
        </div>
    </div>


    <script>
        // var text1 = document.querySelector('i input');
        // var text2 = document.querySelector('em input');
        // var text3 = document.querySelector('.xq input');
        var text4 = document.querySelector('.write textarea');
        var button = document.querySelector('.cc button');
        var ul = document.querySelector('ul');
        var k;
        var flag = 1;
        // var liAfter = 0;
        // var num = 0;
        button.addEventListener('click', function() {

            // if (text1.value == '') {
            //     alert('请输入日期后记录');
            // } else if (text2.value == '') {
            //     alert('请输入日期后记录');
            // } else if (text3.value == '') {
            //     alert('请输入日期后记录');
            // } else if (text4.value == '') {
            //     alert('请输入内容后记录');

            // } 
            if (text4.value == '') {
                alert('请输入内容后记录');
            } else if (text4.value == ' ') {
                alert('请输入内容后记录');
            } else {
                // num++;
                // var li = document.createElement('li').className = "index" + num;
                var li = document.createElement('li')
                    // li.innerHTML = text1.value + '年' + text2.value + '月' + text2.value + '日';
                li.innerHTML = text4.value;
                // ul.insertBefore(li, ul.children[0]);
                ul.appendChild(li);
            }
            var li = document.querySelectorAll('li');



            for (var i = 0; i < li.length; i++) {

                li[i].addEventListener('click', function() {
                    if (flag) {
                        flag = 0; // 控制进入
                        this.style.animation = 'move2 .8s';
                        k = this;
                        liAfter = this.className;


                        setTimeout(function() {
                            ul.removeChild(k);
                            flag = 1;
                        }, 600);
                    }

                })
            }

            // for (var i = 0; i < li.length; i++) {
            //     if (li[i].className == liAfter) {
            //         for (var j = i + 1; j < li.length; j++) {
            //             li[j].className = liAfter + " move3"

            //         }
            //     }

            // }
        })
    </script>
</body>

</html>