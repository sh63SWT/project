<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class labelController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('image_category')->get()->toArray();
        return view('admin.label.index', compact('users'));
    }

    //评论编辑 右 get
    public function labelUpdate(Request $request)
    {
        $labelup = DB::table('image_category')->where('id',$request->id)->get()->first();
        return view('admin.label.labelUpdate',compact('labelup'));
    }
    //评论编辑 右 post
    public function  labelUpd(Request $request)
    {
        $data=$_POST;
        unset($data['_token']);
//        dump($data);
        $res = DB::table('image_category')->where(['id'=>$data['id']])->update($data);
        if($res){
            $users = DB::table('image_category')->get()->toArray();
            return view('admin.label.index', compact('users'));
            return redirect('admin.label.index');
        }else{
            return back();
        }
    }

    //删除
    public function labelDel(Request $request )
    {
        $data = DB::table('image_category')->where('id',$request->id)->delete();
        if($data){
//            $users = DB::table('image_category')->get()->toArray();
//            return view('admin.label.index', compact('users'));
            return back();
        }else{
            echo '有问题，快修改一下！';
        }
    }



    //标签添加
    public function labelAdd()
    {
        return view('admin/label/labelAdd');
    }
    //标签form接收
    public function labelFormAdd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $labels = DB::table('image_category')->get()->toArray();
//        dump($data);

        foreach($labels as $k => $v){
            if($v->categoryName == $data['categoryName'])
            {
                return view('admin.label.index', compact('users'));
            }
        }

        $result = DB::table('image_category')->insert($data);

        if($result){
            $users = DB::table('image_category')->get()->toArray();
            return view('admin.label.index', compact('users'));
        }else{
            return view('admin.label.index', compact('users'));
        }
    }
}
