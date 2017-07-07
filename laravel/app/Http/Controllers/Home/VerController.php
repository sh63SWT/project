<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Ver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerController extends Controller
{
    //显示粉丝列表
    public function VerList($uid)
    {
        //dd($id);//获取到的是用户中心的id
        //查询所有的用户
        $result = DB::table('cares')//查询粉丝表
            ->select('users.id','cares.fid')//查找用户id和当前用户关注他的人id
            ->join('users','users.id','cares.uid')//通过用户id和粉丝id相同连接
            ->where('cares.uid','=',$uid)//条件是查找粉丝表中的被关注的人的id等于当前获取到的用户从而获取到谁关注了他
            ->paginate(2);//获取当前用户的粉丝id
        //粉丝不为空
        if($result->all()){
            foreach ($result as $value)
            {
                $care = DB::table('users')->find($value->fid);//查询用户当前粉丝(是否已经被用户表删除)
                if(empty($care)){//如果没有在用户表查找到当前粉丝的值就删除
                    $a = DB::table('cares')->where('fid',$value->fid)->delete();//删除粉丝表的信息
                }else{
//                    dd($care->id);//当前的粉丝的id
                    //判断当前这个粉丝，在登录用户的关注表中有没有被关注
                    $ver = DB::table('vers')->where('gid',$care->id)->where('uid',$uid)->get()->first();//查询当前粉丝我是否关注
                    if($ver)
                    {
                        $care1 = ['sta'=>'1'];//状态1表示相互关注
                        $cares[] = (object)array_merge((array)$care,$care1);//将状态传入
                    }else{
                        $care1 = ['sta'=>'0'];//状态0表示没有互相关注
                        //foreach ($care as $k => $v){
                        //$care1[$k] = $v;
                        //}
                        $cares[] = (object)array_merge((array)$care,$care1);
                    }
                }

            }
        }else{
            $cares = '';
            $result = '';
        }

        return view('home.care.verList', compact('cares','result','uid'));
    }

    //添加关注
    public function addver($id) {//获取到关注id
        $uid = Auth::guard()->user()->id;//当前用户id
        $regtime = date('Y-m-d H:i:s',time());//关注时间
        $result = DB::table('vers')
                    ->insert(
                        ['uid' => $uid,//当前id用户
                        'gid' => $id,//关注谁的id
                        'regtime' => $regtime]
                    );
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
    public function delver($id)
    {
        $uid = Auth::guard()->user()->id;//获取当前用户
        //删除信息
        DB::table('vers')->where('gid',$id)->where('uid',$uid)->delete();//条件要当前用户下的粉丝id
        DB::table('cares')->where('fid',$uid)->where('uid',$id)->delete();//条件要当前用户下的粉丝id
        return back();
    }
}
