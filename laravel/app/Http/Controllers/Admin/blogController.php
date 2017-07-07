<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlockFactory;

class blogController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('picture_replay')->get()->toArray();
        return view('admin.blog.index', compact('users'));
    }

    //评论编辑 右 get
    public function blogUpdate(Request $request)
    {
        $blogup = DB::table('picture_replay')->where('id',$request->id)->get()->first();
        return view('admin.blog.blogUpdate',compact('blogup'));
    }
    //评论编辑 右 post
    public function  blogUpd(Request $request)
    {
        $data=$_POST;
        unset($data['_token']);
//        dump($data);
        $res = DB::table('picture_replay')->where(['id'=>$data['id']])->update($data);
        if($res){
            $users = DB::table('picture_replay')->get()->toArray();
            return view('admin.blog.index', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    //删除
    public function blogDel(Request $request )
    {
        $data = DB::table('picture_replay')->where('id',$request->id)->delete();
        if($data){
            $users = DB::table('picture_replay')->get()->toArray();
            return view('admin.blog.index', compact('users'));
        }else{
            echo '有问题，快修改一下！';
        }
    }


    //图片评价回复界面
    public function revert()
    {
        $users = DB::table('revert')->get()->toArray();
        return view('admin.blog.revert', compact('users'));
    }

    //评论回复编辑 右 get
    public function revertUpdate(Request $request)
    {
        $revert = DB::table('revert')->where('id',$request->id)->get()->first();
        return view('admin.blog.revertUpdate',compact('revert'));
    }
    //评论编辑 右 post
    public function  revertUpd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
//        dump($data);
        $res = DB::table('revert')->where(['id'=>$data['id']])->update($data);
        if($res){
            $users = DB::table('revert')->get()->toArray();
            return view('admin.blog.revert', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    //删除
    public function revertDel(Request $request )
    {
        $data = DB::table('revert')->where('id',$request->id)->delete();
        if($data){
//            $users = DB::table('revert')->get()->toArray();
//            return view('admin.blog.revert', compact('users'));
            return back();
        }else{
            echo '有问题，快修改一下！';
        }
    }

}
