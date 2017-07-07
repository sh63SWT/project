<?php

namespace App\Http\Controllers\Admin;

use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SlideshowController extends Controller
{
    //
    public function slideAdd()
    {
        return view('admin.slideshow.slideshowAdd');
    }
    public function slideshowAdd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
//        $data = $this->fliter_data($data);
        $upload=($request->img);
//        var_dump($upload);die;
        $info=$upload->store('upload');
        $name=explode('/',$info)[1];
//        $path=public_path();
        $upload->move('img/admin',$name);
        $data['img']=$name;
        $res = DB::table('slideshow')->insert($data);
        if($res){
            return redirect('/slideshow-list');
        }else{
            return redirect('/slideshow-Add');
        }
    }
    public function slideshowList()
    {
        $slideshow=Slideshow::all();
        return view('admin.slideshow.slideshowList', compact('slideshow'));
    }
    public function slideUpdate(Request $request)
    {
        $slideshow = DB::table('slideshow')->where('id',$request->id)->get()->first();
        return view('admin.slideshow.slideshowUpdate',compact('slideshow'));
    }
    public function slideshowUpdate(Request $request)
    {
        $data=$request->all();
//        var_dump($data);
        unset($data['_token']);
        $upload=($request->img);
//        var_dump($upload);die;
//        dd($upload==null);
        if ($upload==null)
        {
            $res = DB::table('slideshow')->where(['id'=>$data['id']])->update($data);
            if ($res){
                return redirect('/slideshow-list');
            }else{
                return redirect('/slideshow-list');
            }
        }else{
            $info=$upload->store('upload');
            $name=explode('/',$info)[1];
//        $path=public_path();
            $upload->move('img/admin',$name);
            $data['img']=$name;
            $res = DB::table('slideshow')->where(['id'=>$data['id']])->update($data);
//         var_dump($res);die;
            if($res){
                return redirect('/slideshow-list');
            }else{
                return redirect('/slideshow-list');
            }
        }

    }

    public function slideshowDelete(Request $request)
    {
        $data1=DB::table('slideshow')->get();

        if (count($data1)>5)
        {
            $data = DB::table('slideshow')->where('id',$request->id)->delete();
            if ($data)
            {
                return redirect('/slideshow-list');
            }else{
                return redirect('/slideshow-list');
            }
        }else{
            return redirect('/slideshow-list');
        }

    }
}
