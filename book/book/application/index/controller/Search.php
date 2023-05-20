<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Book;
use app\index\model\Collection;

class Search extends Controller
{

    public function _initialize()
    {
		//判断是否登录
        $username = session("user_data");

        if ($username) {
            $this->assign("name", $username);
        }
    }

    public function index()
    {
        $data = input('param.keywords');

            $search_data = Book::where('status', '<>', 2)
                ->where("book_name like '%$data%'")
                ->whereOr("introduction like '%$data%'")
                ->whereOr("author like '%$data%'")
                ->paginate(5, false, ['query' => request()->param()]);;
            $total = Book::where('status', '<>', 2)
                ->where("book_name like '%$data%'")
                ->whereOr("introduction like '%$data%'")
                ->whereOr("author like '%$data%'")
                ->count();
        // $page = $search_data->render();
            $this->assign('data', $search_data);
            $this->assign('total', $total);
            $this->assign('category', 1);
        // $this->assign('page', $page);
       

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