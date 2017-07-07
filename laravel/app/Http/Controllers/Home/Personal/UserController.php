<?php

namespace App\Http\Controllers\Home\Personal;

use App\Models\Home\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function indexHe()
    {
        $uid = Auth::guard()->user()->id;
        $special2 = DB::table('album')->where('uid', $uid)->get();
        // $users 创建专辑里的标签
        $users = DB::table('image_category')->get()->toArray();
        return view('home.personal.index', compact('users','special2'));
    }
    //专辑
    public function indexFrom(Request $request,$id)
    {
//        dump($id);
//        $uid = Auth::guard()->user()->id;
        // $special 各式专辑
        $special2 = DB::table('album')->where('uid', $id)->get();
        $user = DB::table('users')->where('id', $id)->get()->first();
        // $users 创建专辑里的标签
        $users = DB::table('image_category')->get()->toArray();
        $id = Auth::guard()->user()->id;
//        dd($id);
        return view('home.personal.index', compact('users','special2','id','user'));
    }
    //创建 专辑

    public function createAlbu(Request $request)
    {
        $id = Auth::guard()->user()->id;
        $result = DB::table('album')->insert(
            [
                'uid' => $id,
                'album' => $request->album,
                'describe' => $request->describe,
                'label' => $request->label
            ]
        );
        if($result)
        {
            return json_encode(array('status' => 0, 'uid' => '$id'));
        }
    }
    public function createAlbum(Request $request)
    {
        $data = $request->all();
        $id = Auth::guard()->user()->id;
        $user = DB::table('users')->select('name','icon','id')->where('id', $id)->get()->first();
        $result = DB::table('album')->insert(
            [
                'uid' => $id,
                'album' => $request->album,
                'describe' => $request->describe,
                'label' => $request->label
            ]
        );
        $users = DB::table('image_category')->get()->toArray();
        $special2 = DB::table('album')->where('uid', $id)->get();
        if($result){
            $alb = DB::table('album')->where(['album'=>$data['album']])->get()->first();
            $users = DB::table('image_category')->get()->toArray();
            return view('home.personal.index', compact('users','special2','id','user','alb'));
        }else{
            echo '添加失败，请重新添加';
        }

    }

    //专辑 编辑
    public function album($id)
    {
        $albs = DB::table('album')->get();
        $alb = DB::table('album')->where(['id'=>$id])->get()->first();
        $users = DB::table('image_category')->get()->toArray();
        $picture = DB::table('picture')->where(['aid'=>$id])->get()->toArray();
//        dump($picture);
        return view('home.personal.album', compact('users','alb','albs','picture'));
    }
    //更改 专辑
    public function updateAlbum(Request $request)
    {
        $result = DB::table('album')->update(
            [
                'uid' => '1',
                'album' => $request->album,
                'describe' => $request->describe,
                'label' => $request->label
            ]
        );
    }

    //创建图片
    public function createPic(Request $request)
    {
        $data = $request->all();
        $upload = ($request->img);//获取头像信息
        $info = $upload->store('uploads');//上传路径
//        dump($upload);
//        dump($info);
//        dump($data);
        $result = DB::table('picture')->insert(
            [
                'aid' => $request->option,
                'img' => $info,
                'describe' => $request->describe,
                'label' => $request->lab
            ]
        );
        if($result){
            $filetrue = $request->file('img')->isValid();
            $alb = DB::table('album')->where(['id'=>$data['option']])->get()->first();
            $users = DB::table('image_category')->get()->toArray();
            $picture = DB::table('picture')->where(['aid'=>$data['option']])->get()->toArray();
            $albs = DB::table('album')->get();
            return view('home/personal/album', compact('users','alb','picture','albs', 'filetrue'));
        }else{
            echo '添加失败，请重新添加';
//            $picture = DB::table('picture')->where(['aid'=>$id])->get()->toArray();
//        dump($picture);
        }
    }


    // 切换到文章小框
    public function article(Request $request,$id)
    {
        $user = DB::table('users')->where('id', $request->id)->get()->first();
        $article = DB::table('article')->where('uid', $id)->get()->toArray();
        return view('home.personal.article', compact('article','id','user'));
    }

    public function collect(Request $request,$id)
    {
        $picture = DB::table('picture as pic')
            ->select('pic.*', 'alb.album')
            ->join('album as alb','pic.aid', 'alb.id')
            ->where('alb.uid', '3')
            ->get()
            ->toArray();
        $user = DB::table('users')->where('id', $request->id)->get()->first();
        return view('home.personal.collect', compact('picture','id','user'));
    }

    public function original(Request $request,$id)
    {
        $picture = DB::table('picture as pic')
            ->select('pic.*', 'alb.album')
            ->join('album as alb','pic.aid', 'alb.id')
            ->where('alb.uid', '3')
            ->get()
            ->toArray();
        $user = DB::table('users')->where('id', $request->id)->get()->first();
//        dump($picture);
        return view('home.personal.original', compact('picture','id','user'));
    }
}
