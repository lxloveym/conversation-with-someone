<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\User;
use app\index\model\Time;
use think\Cache;


class Login extends Controller
{

    public function index()
    {
        return $this->fetch();
    }


    /**
     * 用户登录检测
     */

    public function check()
    {
        $data = input('param.');

        if ($data['username'] != null && $data['password'] != null) {
            $arr = [
                'username' => $data['username'],
                'passwd' => md5($data['password'])
            ];
            $res = User::where($arr)->find();

            if ($res) {
                $time = Time::where('uid', $res['id'])->find();
                if ($time != null) {
                    //是否同一天
                    $time1 = date('d', time());

                    $time2 = date('d', strtotime($time['update_time']));

                    //是否同一个月
                    $time3 = date('m', time());
                    $time4 = date('m', strtotime($time['update_time']));
                    //是否同一年
                    $time5 = date('Y', time());
                    $time6 = date('Y', strtotime($time['update_time']));
                    //更新天
                    if ($time1 != $time2) {
                        Time::where('uid', $res['id'])->update(['day' => 0]);
                    }
                    //更新月
                    if ($time3 != $time4) {
                        Time::where('uid', $res['id'])->update(['mouth' => 0]);
                    }
                    //更新年
                    if ($time5 != $time6) {
                        Time::where('uid', $res['id'])->update(['year' => 0]);
                    }
                }
                session('user_data', $res);
                session('time', time());//记录开始浏览时间

                $status = User::where('id', $res['id'])->update(['status' => 1, 'login_time' => date('Y-m-d H:i:s')]);

                if ($status) {
                    return $this->success('登录成功', '/index.php');
                } else {
                    return $this->error('内部异常，登录失败');
                }
            } else {
                return $this->error('用户名或者密码不正确');
            }
        } else {
            return $this->error('数据不能为空');
        }
    }

    /**
     * 用户账户注册
     */
    public function add()
    {
        $data = input('param.');
        // if(!(6 < strlen($data['username']) < 12 && 6 < strlen($data['password1']) < 12)){
        //     return $this->error('用户名和密码必须在6-12位之间');
        // }

        if ($data['password1'] == $data['password2']) {
            if (User::where('username', $data['username'])->find()) {
                return $this->error('注册失败，用户名已经存在');
            } else {
                $arr = [
                    'username' => $data['username'],
                    'passwd' => md5($data['password1']),
                    'status' => 2,
                    'create_time' => date('Y-m-d H:i:s'),
                ];
                $res = User::insert($arr);
                if ($res) {
                    return $this->success('注册成功，请登录');
                } else {
                    return $this->error('内部原因，注册失败');
                }
            }
        } else {
            return $this->error('注册失败，两次密码不一致');
        }
    }
}