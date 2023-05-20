<?php 
// 引入命名空间
namespace app\admin\controller;

// 导入系统类
use think\Controller;

use think\Db;
use app\admin\model\Book;
use app\admin\model\Category;

// 声明控制器
class News extends Lock
{
	// 后台首页方法

	public function index()
	{
		$search = input("param.search");

		// 加载页面
		$data = Book::where('status', '<>', 2)->where("book_name like '%$search%'")->order('id', 'desc')->paginate(5, false, ['query' => request()->param()]);;
		$total = Book::where('status', '<>', 2)->where("book_name like '%$search%'")->count();
		foreach ($data as $key => $value) {
			$category = Category::where('id', $value['cid'])->find();
			$data[$key]['cid'] = $category['name'];
		}
		$page = $data->render();
		$this->assign('page', $page);
		$this->assign('data', $data);
		$this->assign('total', $total);
		$this->assign("menu", "news");
		return view();
	}


	//更新书籍状态

	public function ajax_status()
	{
		$data = input('param.');
		$res = Book::update($data);
		if ($res) {
			$this->success('修改成功', 'nes/index');
		} else {
			$this->error('修改失败', 'nes/index');
		}
	}

	// 添加新闻的页面

	public function add()
	{

		// 查询所有新闻分类
		$data = Category::where('status', '<>', 2)->select();
		$this->assign("data", $data);

		$this->assign("menu", "news");

		// 加载页面
		return view();
	}

	// 文件上传
	public function upload()
	{
		$file = request()->file('Filedata');
		if ($file) {
			//移动文件
			$info = $file->move(ROOT_PATH . 'public/upload/tmp/');
			if ($info) {
				$name = $info->getSaveName();//获取图片名字
				return $name;
			}
			return $name;
		} else {
			return false;
		}
	}


	//新闻信息上传
	public function insert()
	{
		$data = input("param.");

		if (empty($data)) {
			$this->redirect("news/add");
		} else {
			$data['create_time'] = time();

			if (Book::insert($data)) {
				//将图片从临时目录转移到news目录
				$tmp = "./upload/tmp/" . $data['img'];
				$new = "./upload/news/" . $data['img'];
				//因为少了一个文件日期目录，复制过去的时候会出错，所以得先创建一个日期目录
				//获取新的目录部分
				$dir = dirname($tmp);
				if (!file_exists($dir)) {
					mkdir($dir);
				}
				$this->redirect("news/index");
			}
		}
	}

	//找到需要修改的数据
	public function ajax_find()
	{
		$id = input("param.id");
		$data = Book::where('id', $id)->find();
		$category = Category::where('status', '<>', 2)->select();
		$this->assign("data", $data);
		$this->assign("category", $category);
		return view();
	}

	//保存修改后的新闻数据
	public function ajax_save()
	{
		$arr = input("param.");
		$file = request()->file("img");
		$data = Book::where('id', $arr['id'])->find();
		//判断是否有图片上传
		if ($file) {
			if ($data['img'] != null) {
				// unlink(ROOT_PATH . 'public/upload/tmp/' . $arr['oldimg']);
			}
			$info = $file->move(ROOT_PATH . 'public/upload/tmp/');
			if ($info) {
				$img = $info->getSaveName();
				$arr['img'] = $img;
			}
		}
		unset($arr['oldimg']);
		if (Book::update($arr)) {
			$this->success("修改成功");
		} else {
			$this->error("修改失败");
		}
		return $data;

	}

	//删除书籍
	public function del()
	{
		$id = input('param.id');

		$res = Book::where('id', $id)->update([
			'status' => 2
		]);

		if ($res) {
			$data = 1;
		} else {
			$data = 0;
		}

		return $data;
	}

}




?>