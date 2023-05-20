<?php 
// 命名空间

namespace app\admin\controller;

// 导入系统控制器

use think\Controller;
use think\Db;

// 声明控制器

class Login extends Controller
{

	// 登录页面

	public function index()
	{
		return view();
	}

	// 处理登录
	public function check()
	{

		$username = input("param.username");
		$password = input("param.password");
		$code = input("param.code");

		if (!empty($username) && !empty($password) && !empty($code)) {
			if (!captcha_check($code)) {
				$this->error("验证码错误");
			} else {
				$where = [
					"username" => $username,
					"passwd" => md5($password),
				];

				$data = Db::table("tsxt_adminuser")->where($where)->find();

				if ($data) {
					//记录session
					session("uekblog_message_username", $data['username']);
					session("uekblog_message_id", $data['id']);
					//更新登录时间
					$logintime = [
						"login_time" => date('Y-m-d H:i:s'),
						"id" => $data['id'],
						"status" => 1
					];
					Db::table("tsxt_adminuser")->update($logintime);
					//提示登录成功
					$this->success("登录成功", "index/index");
				} else {
					$this->error("用户名或者密码错误");
				}
			}
		} else {
			$this->error("请将信息输入完全", 'Login/index');
		}
	}

	//退出登录
	public function loginout()
	{
		$id = session("uekblog_message_id");
		$res = Db::table("tsxt_adminuser")->where('id', $id)->update(['status' => 2]);
		if ($res) {
			session("uekblog_message_username", null);
			session("uekblog_message_id", null);
			$this->success("退出登录成功", "login/index");
		} else {
			$this->error("退出登录成功");
		}
	}



}


?>