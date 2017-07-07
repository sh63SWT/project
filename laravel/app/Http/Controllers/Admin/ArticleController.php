<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    public function indexForm()
    {
        $users = DB::table('article_category')->get()->toArray();
        return view('admin.article.index', compact('users'));
    }

    //文章分类添加
    public function articleAdd()
    {
        return view('admin.article.articleAdd');
    }
    //文章分类form接收
    public function articleFormAdd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $result = DB::table('article_category')->insert($data);

        if($result){
            $users = DB::table('article_category')->get()->toArray();
            return view('admin.article.index', compact('users'));
        }else{
            return redirect('admin.article.articleAdd');
        }
    }

    //更改
    public function articleUpdate(Request $request)
    {
        $articles = DB::table('article_category')->where('id',$request->id)->get()->first();
        return view('admin.article.articleUpdate',compact('articles'));
    }
    //判断更改是否成功
    public function  aUpdate(Request $request)
    {
        $data=$_POST;
        unset($data['_token']);
        $res = DB::table('article_category')->where(['id'=>$data['id']])->update($data);
        if($res){
            $users = DB::table('article_category')->get()->toArray();
            return view('admin.article.index', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    //删除
    public function articleDel(Request $request )
    {
        $data = DB::table('article_category')->where('id',$request->id)->delete();
        if($data){
            $users = DB::table('article_category')->get()->toArray();
            return view('admin.article.index', compact('users'));
        }else{
            echo '有问题，快修改一下！';
        }
    }

    public function articleList()
    {
        $users = DB::table('article')->get()->toArray();
//        dump($users);
        return view('admin.article.articleList', compact('users'));
    }

    //文章更改
    public function aUpd(Request $request)
    {
        $articles = DB::table('article')->where('id',$request->id)->get()->first();
        $category = DB::table('article_category')->get()->toArray();
//        dump($articles);
//        dump($category);
        return view('admin.article.aUpd',compact('category','articles'));
    }
    //判断更改是否成功
    public function  aUp(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $upload = ($request->icon);//获取图片信息
        if (!empty($upload))
        {
            $info = $upload->store('uploads');//上传路径
        }

        //凑sql语句
            $str = '';
            foreach($data as $k => $v){
                if( empty($v) || $k == 'id'){
                    continue;
                }
                if($k == 'icon'){
                    $v = $info;
                }

                $str[$k] = htmlentities($v);
            }
            $str['uptime']= time();
        $res = DB::table('article')->where(['id'=>$data['id']])->update($str);

        if($res){
            $users = DB::table('article')->get()->toArray();
            return view('admin.article.articleList', compact('users'));
        }else{
            echo '修改失败，请重新修改';
        }
    }

    //删除
    public function aDel(Request $request )
    {
        $data = DB::table('article')->where('id',$request->id)->delete();
        if($data){
            return back();
        }else{
            echo '有问题，快修改一下！';
            return back();
        }
    }

}
