<?php

namespace App\Http\Controllers\Home\People;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function index(Request $request,$id)
    {
        if(Auth::guard()->user()){
            $uid = Auth::guard()->user()->id;//获取当前登录用户的值
        }else{
            $uid = '';
        }
        $special2 = DB::table('album')->where('uid', $request->id)->get();//专辑表(首先显示)
        $user = DB::table('users')->where('id', $request->id)->get()->first();//找到当前用户


        // $users 创建专辑里的标签
        $users = DB::table('image_category')->get()->toArray();
        if($uid == $id){//当前用户的id和其他人的id相等跳转页面
            $status = 1;//自己的页面不需要关注需要编辑
            return view('home.personal.index', compact('users','special2','id','user','status'));//个人
        } else {
            //判断是否有关注关系
            //$uid:登录用户
            //$id:其他用户
            $result = DB::table('vers')->where('uid',$uid)->where('gid',$id)->get();
            if(empty($result->first())){//如果为空
                $status = 2;//未关注
            }else{
                $status = 1;//已关注
            }
            return view('home.people.index', compact('users','special2','id','user','uid','status'));//他人
        }
    }

    // 切换到文章小框
    public function article(Request $request,$id)
    {
        $user = DB::table('users')->where('id', $request->id)->get()->first();
        $article = DB::table('article')->where('uid', $request->id)->get()->toArray();
        return view('home.people.article', compact('article','id','user'));
    }

    public function collect(Request $request,$id)
    {
        $picture = DB::table('picture as pic')
            ->select('pic.*', 'alb.album')
            ->join('album as alb','pic.aid', 'alb.id')
            ->where('alb.uid', $request->id)
            ->get()
            ->toArray();
//        dump($picture);
        $user = DB::table('users')->where('id', $request->id)->get()->first();

        return view('home.people.collect', compact('picture','id','user'));
    }

    public function original(Request $request,$id)
    {
        $picture = DB::table('picture as pic')
            ->select('pic.*', 'alb.album')
            ->join('album as alb','pic.aid', 'alb.id')
            ->where('alb.uid', $request->id)
            ->get()
            ->toArray();
        $user = DB::table('users')->where('id', $request->id)->get()->first();
//        dump($picture);
        return view('home.people.original', compact('picture','id','user'));
    }
}
