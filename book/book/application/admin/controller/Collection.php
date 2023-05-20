<?php

namespace app\admin\controller;

use app\admin\model\Collection as SC;
use app\admin\model\User;
use app\admin\model\Book;

class Collection extends Lock
{
    public function index()
    {
        //搜索框中的值
        $search = input("get.search");
		//从数据库中读取用户
        $list = SC::order("id desc")->paginate(5, false, ['query' => request()->param()]);//分页中的参数是为了让分页后搜索栏里面的值能够一直产生效果
        $tot = SC::count();//查询出来的数据条数
        //将数据传递过去
        $data1 = Book::select();
        $data2 = User::select();
        foreach ($list as $key => $value) {
            foreach ($data1 as $key1 => $value1) {
                if ($list[$key]['bid'] == $data1[$key1]['id']) {
                    $list[$key]['bid'] = $data1[$key1]['book_name'];
                }
            }
            foreach ($data2 as $key2 => $value2) {
                if ($list[$key]['uid'] == $data2[$key2]['id']) {
                    $list[$key]['uid'] = $data2[$key2]['username'];
                }
            }
        }
        $this->assign("list", $list);
        $this->assign("tot", $tot);
        $this->assign("menu", "news");
        return $this->fetch();
    }
}