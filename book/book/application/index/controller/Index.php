<?php
namespace app\index\controller;

// 导入数据库类
use think\Db;
// 导入数系统类
use think\Controller;
use think\queue\connector\Database;
use app\index\model\Column;
use app\index\model\Collection;
use app\index\model\Book;
use app\index\model\Comment;
use think\Cache;

class Index extends Controller
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

	//前台首页
	public function index()
	{
		//文学类
		$wx_data = Book::where('cid', 3)->where('status', '<>', 0)->paginate(6);
		//故事0
		$gs_data = Book::where('cid', 4)->where('status', '<>', 0)->paginate(6);
		//青春0
		$qc_data = Book::where('cid', 5)->where('status', '<>', 0)->paginate(6);
		//小说0
		$xs_data = Book::where('cid', 7)->where('status', '<>', 0)->paginate(6);
		//热门
		$hot_data = Book::order('click_num', 'desc')->where('is_hot', 1)->where('status', '<>', 2)->paginate(6);

		$this->assign('hot_data', $hot_data);
		$this->assign('wx_data', $wx_data);
		$this->assign('gs_data', $gs_data);
		$this->assign('qc_data', $qc_data);
		$this->assign('xs_data', $xs_data);
		$this->assign('one', 1);
		return view();
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


	public function tree()
	{
		//我的收获
		$username = session('user_data');
		if ($username != null) {
			$get_data = Comment::where('uid', $username['id'])->where('status', '<>', 2)->order('id', 'desc')->select();

			$this->assign('get_data', $get_data);
		} else {
			return $this->error('请先登录');
		}
		$this->assign('five', 5);
		return $this->fetch('tree/index');
	}

	/**
	 * 记录用户收获
	 */
	public function add()
	{
		$data = input('param.data');
		$arr = [];
		$arr['create_time'] = time();
		$arr['status'] = 1;
		$arr['content'] = $data;
		$arr['uid'] = session('user_data')['id'];
		$res = Comment::insert($arr);
		if ($res) {
			return $this->success('记录成功');
		} else {
			return $this->error('记录失败');
		}
	}
	
	
	
	public function more()
	{
	    
	    $id = input('param.id');
	    
	    if($id == 1){
	        //热门
	        $data = Book::order('click_num', 'desc')->where('is_hot', 1)->where('status', '<>', 2)->select();
	        $this->assign('category',2);
	    }elseif ($id == 2) {
	        //文学类
		    $data = Book::where('cid', 3)->where('status', '<>', 0)->select();
		    $this->assign('category',3);
	    }elseif ($id == 3) {
	        //故事类
		    $data = Book::where('cid', 4)->where('status', '<>', 0)->select();
		    $this->assign('category',4);
	    }elseif ($id == 4) {
	        //青春类
		    $data = Book::where('cid', 5)->where('status', '<>', 0)->select();
		    $this->assign('category',5);
	    }elseif ($id == 5) {
	        //小说类
		    $data = Book::where('cid', 7)->where('status', '<>', 0)->select();
		    $this->assign('category',7);
	    }
	    
	    $this->assign('data',$data);
	    return $this->fetch('search/index');
	}
}
