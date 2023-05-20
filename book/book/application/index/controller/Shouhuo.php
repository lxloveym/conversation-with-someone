<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Column;
use app\index\model\Said;
use think\Db;


class Shouhuo extends Controller
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
        $id = input('param.');

        //名人名言
        $good_data = Said::select();
        // $conn = Db::connect(config('database_expire'));
        // halt($conn);
        // $good_data = $conn->table('usersaid')->where('status',1)->select();
        $this->assign('good_data', $good_data);
        $this->assign('four', 4);
        return $this->fetch();
    }

}