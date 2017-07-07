<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Care;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CareController extends Controller
{
    //显示关注列表
    public function careList($uid)
    {
        $result = DB::table('vers')
            ->select('users.id','vers.gid')
            ->join('users','users.id','vers.uid')
            ->where('vers.uid','=',$uid)//普通用户的关注
            ->paginate(2);//获取当前用户的关注

        $res = $result->all();//判断是否为空
        if ($res){//不为空执行
            foreach ($result as $value)//不为空就循环值
            {
                $care = DB::table('users')->find($value->gid);//查询当前关注id(防止已被删除)
                if(empty($care)){//如果没有在用户表查找到当前关注的值就删除
                    $a = DB::table('vers')->where('gid',$value->gid)->delete();
                }else{
                    $ver = DB::table('cares')->where('fid',$care->id)->where('uid',$uid)->first();//查询当前关注是否关注我

                    if($ver)
                    {
                        $care1 = ['sta'=>'1'];//相互关注1
                        $cares[] = (object)array_merge((array)$care,$care1);
                    }else{
                        $care1 = ['sta'=>'0'];//纯关注0
                        $cares[] = (object)array_merge((array)$care,$care1);
                    }
                    //最后返回值[粉丝状态]，[返回结果]
                }

            }
        }else{//为空就给空值
            $cares = '';
            $result = '';
        }
        return view('home.care.careList', compact('cares','result','uid'));

    }

   //添加关注
    public function addcare($id) {
        $uid = Auth::guard()->user()->id;//当前登录用户id
        $regtime = date('Y-m-d H:i:s',time());//关注时间
        $result = DB::table('vers')
            ->insert(
                ['uid' => $uid,//当前id用户
                    'gid' => $id,//关注的id
                    'regtime' => $regtime]
            );
        //添加前先判断是否
        //$dd = DB::table('cares')->where('uid',$id)->where('fid',$uid)->get();
        //添加关注的同时要添加粉丝数据
        $results = DB::table('cares')
            ->insert(
                ['uid' => $id,//当前id用户
                    'fid' => $uid,//粉丝的id
                    'regtime' => $regtime]
            );
        return back();
    }

    //取消关注
    public function delcare($id)
    {
        $uid = Auth::guard()->user()->id;
        //删除信息
        DB::table('vers')->where('gid',$id)->where('uid',$uid)->delete();
        return back();
    }
}
