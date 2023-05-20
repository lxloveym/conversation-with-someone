<?php 
// 引入命名空间
namespace app\admin\controller;

// 导入系统类
use think\Controller;
use app\admin\model\Category;	

// 声明控制器
class newtype extends Lock
{
	// 后台首页方法

	public function index()
	{
		$search = input("get.search");
		$list = Category::where("name like '%$search%'")->where('status', '<>', 2)->order("id desc")->paginate(5, false, ['query' => request()->param()]);//分页中的参数是为了让分页后搜索栏里面的值能够一直产生效果
		$tot = Category::where("name like '%$search%'")->where('status', '<>', 2)->count();//查询出来的数据条数
		$page = $list->render();
		$this->assign('page', $page);
		$this->assign("menu", "news");
		$this->assign("list", $list);
		$this->assign("tot", $tot);
		return view();
	}

	// ajax添加的处理

	public function ajax_add()
	{

		// 接受post请求的数据

		$data = input("post.");
		$data['create_time'] = time();
		$data['status'] = 1;
		// 插入是数据库

		if (Category::insert($data)) {
			# code...
			$arr = [
				"code" => 200,
				"info" => "添加成功",
			];
		} else {
			$arr = [
				"code" => 400,
				"info" => "添加失败",
			];
		}

		return $arr;
	}


	//修改新闻分类
	public function ajax_update()
	{
		$id = input("param.id");
		$data = Category::find($id);
		$this->assign("data", $data);
		return view();
	}

	//保存修改后的新闻分类
	public function ajax_save()
	{
		$arr = input("param.");
		$arr['update_time'] = time();
		if (Category::where("id", $arr['id'])->update($arr)) {
			$data = [
				"code" => 200,
				"info" => "修改成功"
			];
		} else {
			$data = [
				"code" => 400,
				"info" => "修改失败"
			];
		}
		return $data;
	}
	 

	//删除数据
	public function ajax_del_all()
	{
		$id = input("param.id");

		$res = Category::where("id", $id)->update([
			'status' => 2,
			'update_time' => time()
		]);

		if ($res) {
			$data = [
				"code" => 200,
				"info" => "删除成功"
			];
		} else {
			$data = [
				"code" => 400,
				"info" => "删除失败"
			];
		}
		return $data;
	}
}




?>