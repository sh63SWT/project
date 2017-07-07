<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class pictureController extends Controller
{
    //进入图片管理首页
    public function pictureIndex()
    {
        $users = DB::table('picture')->get()->toArray();
        return view('admin.picture.pictureIndex', compact('users'));
    }

    // 添加图片 get
    public function pictureAdd()
    {
        $album = DB::table('album')->get()->toArray();
        $category = DB::table('image_category')->get()->toArray();
        return view('admin.picture.pictureAdd', compact('category', 'album'));
    }

    //添加专辑里的图片 post
    public function pictureFormAdd(Request $request)
    {
        $data = $request->all();
        $upload = ($request->img);//获取图片信息
        $info = $upload->store('uploads');//上传路径
        $result = DB::table('picture')->insert(
            [
                'aid' => $request->aid,
                'uid' => $request->uid,
                'img' => $info,
                'describe' => $request->describe,
                'label' => $request->label,
            ]
        );
        if($result){
            $users = DB::table('picture')->get()->toArray();
            return view('admin.picture.pictureIndex', compact('users'));
        }else{
            echo '添加失败，请重新添加';
//            return redirect('admin.personal.pictureAdd');
        }
    }

    //图片编辑 右 get
    public function pictureEdit(Request $request)
    {
        $album = DB::table('album')->get()->toArray();
        $category = DB::table('image_category')->get()->toArray();
        $picture = DB::table('picture')->where('id',$request->id)->get()->first();
        return view('admin.picture.pictureEdit',compact('picture', 'album','category'));
    }

    //图片编辑 右 post
    public function picUpd(Request $request)
    {
        $upload = ($request->img);//获取图片信息
        if (!empty($upload))
        {
            $info = $upload->store('uploads');//上传路径
        }

        $data = $request->all();
        unset($data['_token']);
//        dump($data);
        //凑sql语句
        $str = '';
        foreach($data as $k => $v){
            if( empty($v) || $k == 'id'){
                continue;
            }

            if($k == 'img'){
                $v = $info;
            }

            $str[$k] = htmlentities($v);
        }
//        dump($str);
        $res = DB::table('picture')->where(['id'=>$request->id])->update($str);

        if($res){
            $users = DB::table('picture')->get()->toArray();
            return view('admin.picture.pictureIndex', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    // 删除
    public function pictureDel(Request $request)
    {
        $data = DB::table('picture')->where('id',$request->id)->delete();
        if($data){
//            $users = DB::table('picture')->get()->toArray();
//            return view('admin.picture.pictureIndex', compact('users'));
            return back();
        }else{
            echo '删除失败，快修改一下！';
        }
    }

}
