<?php
namespace app\index\controller;

use think\facade\Request;
use think\Controller;
use app\index\model\Column;
use think\Cache;
use app\index\model\User as GR;
use app\index\model\Time;

class User extends Controller
{
    public function _initialize()
    {
		// 栏目查询
        $column = Column::where('is_display', '<>', 2)->where('status', '<>', 2)->order("sort")->select();

		//栏目
        $this->assign("column", $column);
    }

    public function index()
    {
        $id = input('param.id', '', 'intval');

        $username = session("user_data");

        if ($username) {
            $name = GR::where('id', $username['id'])->find();
            $time = Time::where('uid', $name['id'])->find();
            $this->assign("name", $name);
            $this->assign("time", $time);
        }
        $this->assign('six', 6);
        return $this->fetch();
    }

    public function findone()
    {
        $data = GR::where('id', session('user_data')['id'])->find();
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function update_one()
    {
        $data = input('param.');
        $data['id'] = session('user_data')['id'];
        $data['update_time'] = date('Y-m-d H:i:s');
        $res = GR::update($data);
        if ($res) {
            return $this->success('修改成功');
        } else {
            return $this->error('修改失败');
        }
    }

    public function findtwo()
    {
        $data = GR::where('id', session('user_data')['id'])->find();
        $this->assign('data', $data);
        return $this->fetch();
    }


    public function update_two()
    {
        $data['id'] = session('user_data')['id'];
        $data['update_time'] = date('Y-m-d H:i:s');


        $file = request()->file('user_image');

        if ($file) {
                //判断用户是否有头像
            $user = GR::where($data['id'])->find();
            if ($user['user_image'] == null) {
                    //移动文件
                $info = $file->move(ROOT_PATH . 'public/upload/user/');
                if ($info) {
                    $name = $info->getSaveName();//获取图片名字
                }
                $data['user_image'] = $name;
                $res = GR::update($data);
                if ($res) {
                    return $this->success('修改成功');
                } else {
                    return $this->error('修改失败');
                }
            } else {
                   //移动文件
                unlink("/upload/tmp/" . $user['user_image']);
                $info = $file->move(ROOT_PATH . 'public/upload/tmp/');
                if ($info) {
                    $name = $info->getSaveName();//获取图片名字
                }
                unset($user['user_image']);
                $data['user_image'] = $name;
                $res = GR::update($data);
                if ($res) {
                    return $this->success('修改成功');
                } else {
                    return $this->error('修改失败');
                }
            }
        } else {
            return $this->error('未选择文件');
        }

    }

    public function findthree()
    {
        $data = GR::where('id', session('user_data')['id'])->find();
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function update_three()
    {
        $data = input('param.');
        $data['id'] = session('user_data');

        if ($data['passwd1'] == $data['passwd2']) {
            $user = GR::where($data['id'])->find();
            if (md5($data['passwd'] == $user['passwd'])) {
                $res = GR::update(['passwd' => md5($data['passwd1']), 'id' => session('user_data')['id'], 'update_time' => date('Y-m-d H:i:s')]);
                if ($res) {
                    return $this->success('修改成功', 'findthree');
                } else {
                    return $this->error('修改失败');
                }
            } else {
                return $this->error('原始密码不正确');
            }
        } else {
            return $this->error('两次密码不一致');
        }
    }
}