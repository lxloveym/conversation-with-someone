<?php 
// 命名空间

namespace app\admin\controller;

// 导入系统控制器

use think\Controller;

// 声明控制器

class Lock extends Controller
{

	// 初始化方法
	// Index控制器下的所有方法调用，都会执行_initialize方法
	public function _initialize()
	{
		
		// 判断session中是否有登录的标记
		if (session("uekblog_message_username") && session("uekblog_message_id")) {
			# code...
		} else {
			$this->error("请登录", 'Login/index');
		}
	}
}


?>