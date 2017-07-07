<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //显示分类列表
    public function categoryList(Request $request)
    {
//        //查询所有的分类
        $categorys = Category::all();
//        dd($categorys);
//        $categorys = DB::table('category')->where('pid','0')->get();
        return view('admin.category.categoryList', compact('categorys'));
//        return view('admin.category.categoryList');

    }
    public function Add()
    {
        return view('admin.category.categoryAdd');
    }

    public function  Cadd(Request $request)
    {
        $categorys = DB::table('category')->where('id',$request->id)->get()->first();
        return view('admin.category.cAdd',compact('categorys'));
    }
    public function cateAdd(Request $request)
    {
        $data=$_POST;
//        var_dump($data);
        unset($data['_token']);
//        $data = $this->fliter_data($data);
        $res = DB::table('category')->insert($data);
        if($res){
            return redirect('/category-list');
        }else{
            return redirect('/category-Add');
        }
    }
    //添加权限表单
    public function categoryAdd(Request $request)
    {
        $data=$_POST;
//        var_dump($data);
        unset($data['_token']);
//        $data = $this->fliter_data($data);
        $res = DB::table('category')->insert($data);
        if($res){
            return redirect('/category-list');
        }else{
            return redirect('/category-Add');
        }
//        if ($request->isMethod('post')) {
//           //添加权限操作
//            $categorys = Category::create($request->all());
//            return redirect('/category-list');
//        }
//        return view('admin.category.categoryAdd', compact('categorys'));
    }

    //修改权限
    public function categoryUpdate(Request $request)
    {
//        $request->all();
        $categorys = DB::table('category')->where('id',$request->id)->get()->first();
        return view('admin.category.categoryUpdate',compact('categorys'));
//        return '111';
//        unset($data['_token']);
//        $res = DB::table('category')->where(['id'=>$data['id']])->update($data);
//         var_dump($res);die;
//        if($res){
//            return redirect('show');
//        }else{
//            echo '修改失败，请重新修改';
//        }
//        dd($request->category_id);
        //修改分类信息
//        if ($request->isMethod('post')) {
//            $categorys = Category::findOrFail($category_id);
//            $categorys->update($request->all());
//            return redirect('/category-list');
//        }
//        //查询出当前的权限信息
//        $categorys = Category::findOrFail($category_id);
//        return view('admin.category.categoryUpdate', compact('categorys'));
    }
    public function  Update(Request $request)
    {
        $data=$_POST;
        unset($data['_token']);
        $res = DB::table('category')->where(['id'=>$data['id']])->update($data);
//         var_dump($res);die;
        if($res){
            return redirect('/category-list');
        }else{
            return redirect('/category-list');
        }
    }
    //删除权限
    public function categoryDelete(Request $request )
    {
        //删除信息
        $data = DB::table('category')->where('id',$request->id)->delete();
        if($data){
            return redirect('/category-list');
        }else{
            return redirect('/category-list');
        }
    }
}
