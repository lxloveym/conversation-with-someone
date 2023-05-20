<?php 
// 引入命名空间
namespace app\admin\controller;
// 导入数据库类

use think\Db;
// 导入系统类
use think\Controller;

// 声明控制器
class User extends Lock
{
	// 后台首页方法

	public function index()
	{
		//获取搜索框中的内容
		$search = input("param.search");
		//查询所有数据并分页
		// $list = Db::table("user")->order("id desc")->paginate(5, false, ['query' => request()->param()]);
		//统计数据表里中的数据表中数据的条数
		$tot = Db::table("tsxt_user")
			->where("username like '%$search%'")
			->whereOr("nickname like '%$search%'")
			->order("id desc")
			->count();
		//根据搜索框中的内容将所有字段中匹配的项展现出来
		$list = Db::table("tsxt_user")
			->where("username like '%$search%'")
			// ->whereOr("email like '%$search%'")
			// ->whereOr("phone like '%$search%'")
			->whereOr("nickname like '%$search%'")
			->order("id desc")
			->paginate(4, false, ['query' => request()->param()]);
		$this->assign("list", $list);
		$this->assign("tot", $tot);
		// 加载页面
		return view();
	}

	//无刷新修改用户状态
	public function ajax_status()
	{
		$id = input('param.id');
		$status = input('param.status');
		$arr = [
			"status" => $status,
		];
		if (Db::table("tsxt_user")->where('id', $id)->update($arr)) {
			return 1;
		} else {
			return 0;
		}
	}
}




?>