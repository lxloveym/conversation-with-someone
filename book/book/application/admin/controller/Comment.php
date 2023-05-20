<?php 
// 引入命名空间
namespace app\admin\controller;

// 导入系统类
use think\Controller;
use think\Db;
// 导入数据库类
use app\admin\model\Comment as pinglun;
use app\admin\model\User;
use app\admin\model\Book;

// 声明控制器
class Comment extends Lock
{
	// 后台首页方法

	public function index()
	{
		//查询数据
		$search = input("param.search");

		$data = pinglun::where("content like '%$search%'")
			->order("id desc")
			->paginate(5, false, ['query' => request()->param()]);

		$data2 = User::select();
		foreach ($data as $key => $value) {
			foreach ($data2 as $key2 => $value2) {
				if ($data[$key]['uid'] == $data2[$key2]['id']) {
					$data[$key]['uid'] = $data2[$key2]['username'];

				}
			}
		}
		$tot = pinglun::where("content like '%$search%'")
			->count();
		$this->assign("data", $data);
		$this->assign("tot", $tot);
		$this->assign("menu", "news");
		// 加载页面

		return view();
	}

	// 无刷新修改状态
	public function ajax_status()
	{
		$arr = input("param.");

		if (Db::table("tsxt_comment")->update($arr)) {
			$data = [
				"code" => 200,
				"info" => "状态修改成功"
			];
		} else {
			$data = [
				"code" => 400,
				"info" => "状态修改失败"
			];
		}

		return $data;
	}
}




?>