window.addEventListener('load', function() {
    // const head = document.querySelector('header');
    const nav = document.querySelector('.nav');
    // const juan = document.querySelector('.jaun');
    // setTimeout(function() {
    //     head.style.display = 'none';
    // }, 2000)
    // setTimeout(function() {
    //     nav.style.display = 'block';
    // }, 2100)
    const hour = document.querySelector('.shi');
    const minute = document.querySelector('.fen');
    const second = document.querySelector('.miao');
    const getintotime = +new Date();
    console.log(getintotime);

    countDown()
    setInterval(countDown, 1000)

    function countDown() {
        var nowTime = +new Date();
        var sy = (nowTime - getintotime) / 1000; //得到剩余的秒数
        var tian = parseInt((sy / 60 / 60 / 24));
        tian = tian < 10 ? '0' + tian : tian;
        var shi = parseInt((sy / 60 / 60 % 24));
        shi = shi < 10 ? '0' + shi : shi;
        hour.innerHTML = shi;
        var minutes = parseInt((sy / 60 % 60));
        minutes = minutes < 10 ? '0' + minutes : minutes;
        minute.innerHTML = minutes;
        var miao = parseInt((sy % 60));
        miao = miao < 10 ? '0' + miao : miao;
        second.innerHTML = miao;
    }
    // juan.onclick = function() {
    //     alert(11);
    // }
})

$(function() {
    load()
    $('.zimu .markey').each(function() {
        var row = $(this).children().clone();
        $(this).append(row);
    })
    $('.like_book .mask').each(function() {
        var row = $(this).children().clone();
        $(this).append(row);
    })
    $('.into button').on('click', function() {
        var text = $('.said textarea').val();
        var li = $('<li></li>');
        li.html(text);
        if (text == '') {
            alert('你输入的内容为空！');
        } else {
            $('.said ul').prepend(li);
            $('.said textarea').val('');
            var alldata = GetDate();
            console.log(alldata);
            alldata.push(text);
            setdate(alldata);
        }
        // load();

    })

    function GetDate() {
        var data = localStorage.getItem('write'); //判断这个键名里面的值
        if (data !== null) {
            return JSON.parse(data); //转换为数组
        } else {
            return [];
        }
    }

    function setdate(date) { //更新数据的函数，保证数据实时更新
        localStorage.setItem('write', JSON.stringify(date)); //转换为字符串存储
    }

    function load() {
        $('.said ul').empty(); //调用前先将里面元素清空，防止数据重复
        var date1 = GetDate();
        $.each(date1, function(i, n) {
            $('.said ul').prepend("<li> " + n + " </li>");
        })
    }
    $('.nav .you').on('mouseenter', function() {
        $('.like').stop().slideToggle(1000);
    })
    $('.nav ul li').on('click', function() {
        $(this).css('border-bottom', '3px solid #444').siblings().css('border-bottom', '');
        var xuhao = $('.nav ul li').index($(this));
        $('.zong>div').eq(xuhao).show().siblings().hide();



    })
    $('.main1 ul li button').on('click', function() {
        var li = $(this).parent().clone();
        $('.colect ul').prepend(li);
        $('.colect ul li button').html('取消收藏');
        $(this).html('已收藏').css({
            'background': '#ccc',
        });
    })
    $('.my_colect .colect ul li button').on('click', function() {
        $(this).parent().remove();
    })
    $('.two').on('click', function() {
            $('.zong').hide();
            $('.search1').show();
        })
        // $('.juan').click(function() {
        //     const con = prompt('请输入内容：');
        //     console.log(con);

    // })
})