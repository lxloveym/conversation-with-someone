<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Said as MingYan;


class Said extends Lock
{
    public function index()
    {
        $search = input("param.search");
        $order = [
            "id" => "desc"
        ];
        $list = MingYan::where("content like '%$search%'")->order($order)->paginate(5, false, ['query' => request()->param()]);
        $tot = MingYan::where("content like '%$search%'")->count();//没搜索的时候就是数据总条数
        $this->assign("menu", "sys");
        $this->assign("list", $list);
        $this->assign("tot", $tot);
		// 获取用户搜搜的内容

        return view();
    }

    /**
     * 新增数据
     */
    public function ajax_add()
    {
        $data = input('param.');
        $data['create_time'] = time();
        $data['status'] = 1;
        $res = MingYan::insert($data);
        if ($res) {
            return $this->success('添加成功');
        } else {
            return $this->error('添加失败');
        }
    }

    /**
     * 修改状态
     */
    public function ajax_status()
    {
        $id = input('param.id');
        $res = MingYan::where('id', $id)->update(['status' => 2]);
        if ($res) {
            $data = [
                'code' => 200,
                'info' => '删除成功'
            ];
            return $data;
        } else {
            $data = [
                'code' => 400,
                'info' => '删除失败'
            ];
            return $data;
        }
    }

    /**
     * 查找需要修改的数据
     */

    public function ajax_find()
    {
        $id = input('param.id');

        $data = MingYan::where('id', $id)->find();

        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * 保存修改的数据
     */
    public function ajax_save()
    {
        $arr = input('param.');
        $arr['update_time'] = time();

        $res = MingYan::where('id', $arr['id'])->update($arr);

        if ($res) {
            $data = [
                'code' => 200,
                'info' => '修改成功'
            ];
            return $data;
        } else {
            $data = [
                'code' => 400,
                'info' => '修改失败'
            ];
            return $data;
        }
    }
}