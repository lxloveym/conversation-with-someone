<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Column;
use think\Cache;
use app\index\model\Book;
use app\index\model\User;
use app\index\model\Collection;
use app\index\model\Category;

class Recommend extends Controller
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
        $this->assign("column", $column);
    }

    public function index()
    {
        //智能推荐
        $co_data = Collection::where('uid', $username['id'])->where('status', '<>', 2)->select();
        if ($co_data != null) {
            $data = [];
            foreach ($co_data as $key => $value) {
            //统计分类出现的次数
                $book_data = Book::where('id', $value['bid'])->find();
                if (!in_array($book_data['cid'], $data)) {
                    $data[$book_data['cid']] = 1;
                } else {
                    $data[$book_data['cid']] = $data[$book_data['cid']] + 1;
                }
            }
        //拿到次数最多的分类
            $max = max($data);
            $cid = array_search($max, $data);
            $recommend_data = Book::where('cid', $cid)->where('status', '<>', 2)->select();
            $this->assign('recommend_data', $recommend_data);
        } else {
            $recommend_data = Book::where('cid', 4)->where('status', '<>', 2)->select();
            $this->assign('recommend_data', $recommend_data);
        }

        $sc = Collection::where('uid', $username['id'])->select();
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
        $this->assign('two', 2);
        return $this->fetch();
    }

    public function add_cl()
    {
        $username = session("user_data");
        $id = input('param.id');

        $data = Book::where('id', $id)->find();
        //更新收藏量
        $click_co = Book::update(['id' => $id, 'collection' => $data['collection'] + 1]);

        //判断这本书是否已经收藏
        $to_get = Collection::where('uid', $username['id'])->where('bid', $data['id'])->find();

        if ($to_get != null) {
            return $this->error('本书已收藏');
        } else {
            $arr = [
                'uid' => $username['id'],
                'bid' => $data['id'],
                'create_time' => time(),
                'status' => 1
            ];
            $collection = Collection::insert($arr);
            if ($click_co && $collection) {
                return $this->success('收藏成功');
            } else {
                return $this->error('收藏失败');
            }
        }
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
}