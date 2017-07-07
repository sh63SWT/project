<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    //
    public function indexForm()
    {
        $users = DB::table('album')->get()->toArray();
        return view('admin.personal.index', compact('users'));
    }

    public function personalAdd()
    {
        $category = DB::table('image_category')->get()->toArray();
//        dump($category);
        return view('admin/personal/personalAdd', compact('category'));
    }

    public function personalFormAdd(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
//        dump($data);
//        return 'aa';
        $result = DB::table('album')->insert($data);
        if($result){
            $users = DB::table('album')->get()->toArray();
            return view('admin.personal.index', compact('users'));
        }else{
            echo '添加失败，请重新添加';
            return redirect('admin.personal.personalAdd');
        }
    }


    //添加专辑里的图片 get
    public function pAdd(Request $request)
    {
        $articles = DB::table('article_category')->where('id',$request->id)->get()->first();
        return view('admin.article.articleUpdate',compact('articles'));
    }
    //添加专辑里的图片 post
    public function  pFormAdd(Request $request)
    {
        $data=$_POST;
        unset($data['_token']);
        $res = DB::table('article_category')->where(['id'=>$data['id']])->update($data);
        if($res){
            $users = DB::table('article_category')->get()->toArray();
            return view('admin.article.index', compact('users'));
        }else{
            echo '添加失败，请重新添加';
        }
    }

    public function personalUpdate(Request $request)
    {
        $category = DB::table('image_category')->get()->toArray();
        $album = DB::table('album')->where('id',$request->id)->get()->first();
        return view('admin.personal.personalUpdate',compact( 'album','category'));
    }

    public function personalUpd(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
//        dump($data);

        $res = DB::table('album')->where(['id'=>$request->id])->update($data);
        if($res){
            $users = DB::table('album')->get()->toArray();
            return view('admin.personal.index', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    // 删除
    public function personalDel(Request $request)
    {
        $data = DB::table('album')->where('id',$request->id)->delete();
        if($data){
            $data = DB::table('picture')->where('aid',$request->id)->delete();
            return back();
        }else{
            echo '删除失败，快修改一下！';
        }
    }


    //详情
    public function personalDetail(Request $request)
    {
        $users = DB::table('picture')->where('aid',$request->id)->get()->toArray();
//        dump($users);
        return view('admin.picture.pictureIndex', compact('users'));
    }


}
