<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\User;
use app\index\model\Time;
use app\index\model\Book;
use think\Cache;
use app\index\model\Column;


class Loginout extends Controller
{

    public function _initialize()
    {
		// 栏目查询
        $column = Column::where('is_display', '<>', 2)->order("sort")->select();
		//判断是否登录
        $username = session("user_data");

        if ($username) {
            $this->assign("name", $username);
        }
        //热门
        $hot_data = Book::order('click_num', 'desc')->where('is_hot', 1)->where('status', '<>', 2)->paginate(6);
		//文学类
        $wx_data = Book::where('cid', 3)->where('status', '<>', 2)->paginate(6);
		//故事6
        $gs_data = Book::where('cid', 4)->where('status', '<>', 2)->paginate(6);
		//青春6
        $qc_data = Book::where('cid', 5)->where('status', '<>', 2)->paginate(6);
		//小说6
        $xs_data = Book::where('cid', 7)->where('status', '<>', 2)->paginate(6);
        $this->assign('hot_data', $hot_data);
        $this->assign('wx_data', $wx_data);
        $this->assign('gs_data', $gs_data);
        $this->assign('qc_data', $qc_data);
        $this->assign('xs_data', $xs_data);
        $this->assign('one', 1);
		//轮播图展示
        $this->assign("column", $column);
    }


    public function index()
    {
        //获取用户浏览时长
        $time = time() - session('time');
        $time = $time / 60 / 60;
        $time = floor($time * 100) / 100;//保留两位小数

        //更新用户登陆状态和上一次浏览时长
        $res = User::update(['id' => session("user_data")['id'], 'last_time' => $time, 'status' => 2]);
        //查找是否存在用户
        $data = Time::where('uid', session("user_data")['id'])->find();

        if ($data) {
            $arr = [
                'total' => floor(($data['total'] + $time) * 100) / 100,
                'year' => floor(($data['year'] + $time) * 100) / 100,
                'mouth' => floor(($data['mouth'] + $time) * 100) / 100,
                'day' => floor(($data['day'] + $time) * 100) / 100,
                'update_time' => time()
            ];
            $result = Time::where('uid', session("user_data")['id'])->update($arr);
        } else {
            $arr = [
                'total' => $time,
                'year' => $time,
                'mouth' => $time,
                'day' => $time,
                'update_time' => time(),
                'uid' => session("user_data")['id']
            ];
            $result = Time::insert($arr);
        }
        session("user_data", null);
        session('time', null);
        if ($res && $result) {
            return $this->success('退出登录成功');
        } else {
            $this->error('退出登录失败');
        }
    }
}