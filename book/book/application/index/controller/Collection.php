<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Column;
use app\index\model\Collection as SC;
use app\index\model\Book;
use app\index\model\User;

class Collection extends Controller
{
    public function _initialize()
    {
		// 栏目查询
        $column = Column::where('is_display', '<>', 2)->where('status', '<>', 2)->order("sort")->select();
		//判断是否登录
        $username = session("user_data");

        if ($username) {
            $this->assign("name", $username);
        }
		//轮播图展示
        $this->assign("column", $column);
    }

    public function index()
    {
        $user_data = session('user_data');
        if ($user_data == null) {
            return $this->error('请先登录');
        } else {
            $sc = SC::where('uid', $user_data['id'])->where('status', '<>', 2)->order('create_time', 'desc')->select();
            $book = Book::where('status', '<>', 2)->select();
            $data = [];
            foreach ($sc as $key => $value) {
                foreach ($book as $key1 => $value1) {
                    if ($sc[$key]['bid'] == $book[$key1]['id']) {
                        array_push($data, $value1);
                    }
                }
            }
            $this->assign('data', $data);
        }
        $this->assign('three', 3);
        return $this->fetch();
    }

    public function read()
    {
        $id = input('param.id');

        $data = Book::where('id', $id)->find();
        //更新点击量
        $click_num = Book::where('id', $id)->update(['click_num' => $data['click_num'] + 1]);
        $data = Book::where('id', $id)->find();
        $this->assign('data', $data);
        return $this->fetch('read/index');
    }

    public function del_cl()
    {
        $username = session("user_data");
        $id = input('param.id');

        $data = Book::where('id', $id)->find();
        //更新收藏量
        $click_co = Book::update(['id' => $id, 'collection' => $data['collection'] - 1]);

        $res = SC::where('uid', $username['id'])->where('bid', $data['id'])->find();
        $arr = [
            'id' => $res['id'],
            'update_time' => time(),
            'status' => 2
        ];
        $collection = SC::update($arr);
        if ($click_co && $collection) {
            return $this->success('取消收藏成功');
        } else {
            return $this->error('取消收藏失败');
        }

    }

}