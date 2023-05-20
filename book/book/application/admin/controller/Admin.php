<?php 
// 引入命名空间
namespace app\admin\controller;

// 导入系统类
use think\Db;
use think\Controller;

// 声明控制器
class Admin extends Lock
{


	// 后台首页方法

	public function index()
	{
		//搜索框中的值
		$search = input("get.search");
		//从数据库中读取用户
		$list = Db::table("tsxt_adminuser")->where("username like '%$search%'")->order("id desc")->paginate(5, false, ['query' => request()->param()]);//分页中的参数是为了让分页后搜索栏里面的值能够一直产生效果
		$tot = Db::table("tsxt_adminuser")->where("username like '%$search%'")->count();//查询出来的数据条数
		//将数据传递过去
		$this->assign("list", $list);
		$this->assign("tot", $tot);
		$this->assign("menu", "user");
		return view();
	}

	// 添加用户时 检测用户名是否存在

	public function ajax_username()
	{
		$username = input('get.username');
		$data = Db::table('tsxt_adminuser')->where("username = '$username'")->find();
		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}

	//增加管理员用户
	public function ajax_add()
	{

		$post = input("post.");

		// 判断用户名是否书写

		if ($post['username']) {
			// 判断是否输入密码

			if ($post['password']) {
				// 判断两次密码是否一致

				if ($post['password'] == $post['repassword']) {
					// 插入数据

					$arr['username'] = $post['username'];
					$arr['passwd'] = md5($post['password']);
					$arr['status'] = $post['status'];
					$arr['create_time'] = date('Y-m-d H:i:s');

					if (Db::table("tsxt_adminuser")->insert($arr)) {
						$data = [
							"code" => 200,
							"info" => "添加成功",
						];
					} else {

						$data = [
							"code" => 400,
							"info" => "添加失败",
						];
					}
				} else {
					$data = [
						"code" => 400,
						"info" => "两次密码不一致",
					];
				}
			} else {
				$data = [
					"code" => 400,
					"info" => "请输入密码",
				];
			}
		} else {
			$data = [
				"code" => 400,
				"info" => "请输入用户名",
			];
		}

		return $data;
	}

	//批量删除管理员用户
	public function ajax_del_all()
	{
		//接收要删除的id
		$id = input("get.str");
		//删除所有数据
		if (Db::table("tsxt_adminuser")->delete($id)) {
			echo 1;
		} else {
			echo 0;
		}
	}

	//无刷新获取修改数据
	public function ajax_find()
	{
		$id = input("get.id");
		$data = Db::table("tsxt_adminuser")->find($id);
		$this->assign("data", $data);
		return view();
	}

	//无刷新的修改数据
	public function ajax_save()
	{
		$id = input("post.id");
		$password = input("post.password");
		$repassword = input("post.repassword");
		$status = input("post.status");
		
		//判断用户是否修改密码
		if ($password || $repassword) {
			if (strlen($password) >= 6 && strlen($password) <= 12) {
				if ($password == $repassword) {
					$arr = [
						"id" => $id,
						"passwd" => md5($password),
						"status" => $status,
						"update_time" => date('Y-m-d H:i:s')
					];
				} else {
					$data = [
						"code" => 400,
						"info" => "两次密码不一致"
					];
					return $data;
				}
			} else {
				$data = [
					"code" => 400,
					"info" => "密码长度在6-12位之间"
				];
				return $data;
			}
		} else {
			$arr = [
				"id" => $id,
				"status" => $status,
				"update_time" => date('Y-m-d H:i:s')
			];
		}
		if (Db::table("tsxt_adminuser")->update($arr)) {
			$data = [
				"code" => 200,
				"info" => "修改成功"
			];
			return $data;
		} else {
			$data = [
				"code" => 400,
				"info" => "修改失败"
			];
			return $data;
		}
	}

	//修改用户状态信息
	public function ajax_status()
	{
		$id = input("param.id");
		$status = input("param.status");
		$arr = [
			"status" => $status,
			"update_time" => date('Y-m-d H:i:s')
		];
		if (Db::table("tsxt_adminuser")->where("id", $id)->update($arr)) {
			return 1;
		} else {
			return 0;
		}
	}
}


?>