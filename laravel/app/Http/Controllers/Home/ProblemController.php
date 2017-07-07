<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ProblemRequest;
use App\Models\Problem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProblemController extends Controller
{
    //提交密码
    public function getAnswer(ProblemRequest $request){
        $data = $request->all();
        $uid = $request->all()['uid'];
        $answer = $request->all()['answer'];
        $problem = $request->all()['problem'];
        $results = DB::table('problems')->where('uid',$uid)->first();//查看表是否有数据
        if ($results){
            $datas = ['uid'=>$uid,'answer'=>$answer,'problem'=>$problem];
            $dd = DB::table('problems')->where('uid',$uid)->update($datas);
        }else{
            $dd = Problem::create($request->all());
        }
        if($dd){
            return back();
        }else{
            return redirect('/home/vipUpdate');
        }
    }

    //显示
    public function forgetPass(){

        return view('home.forgetPass');
    }

    public function getproblem(ProblemRequest $request){
        //获取表单中的答案
        $newpro = $request->all()['problem'];
        //获取表格中的手机
        $phone = $request->all()['phone'];
        //查找用户表中的关于输入手机号的用户是否存在
        $uid = DB::table('users')->select('id')->where('phone',$phone)->first()->id;
        $oldpro = DB::table('problems')->select('problem')->where('uid',$uid)->first()->problem;
        //如果新旧答案一致，则重置用户密码
        if($newpro == $oldpro){
            $value = '123456';
            $values = Hash::make($value);
            $data=['password'=>$values];
            $update = DB::table('users')->where('id',$uid)->update($data);
            return json_encode(array('status' => 1, 'mess' => $value));
        }else{
            return json_encode(array('status' => 2, 'mess' => '答案不正确'));
        }
    }

    //根据手机号码显示问题
    public function gettel(Request $request){
        //查看用户表中手机号码的id
        $result = DB::table('users')->select('id')->where('phone',$request->phone)->get();
        if($result->all()){//如果找到就执行
            $uid = $result->first()->id;//获取该手机号的id
            $res = DB::table('problems')->select('answer','problem')->where('uid',$uid);//去问题表中查询是否有设置密码找回
            if(empty($res->first()->answer))//如果返回的结果为空
            {
                return json_encode(array('status' => 2, 'mess' => '您没有找回功能'));//则返回值没有
            }else{
                $mess = $res->first()->answer;//如果返回的结果有值
                return json_encode(array('status' => 1, 'mess' => $mess));//则将状态和错误信息携带问题返回
            }
        }else{
            return json_encode(array('status' => 3, 'mess' => '该手机号没有注册'));//则将状态和错误信息携带问题返回
        }

    }
}
