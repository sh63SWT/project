<?php

namespace App\Http\Controllers\Admin;

use App\Url;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    //
    public function urlAdd()
    {
        return view('admin.url.urlAdd');
    }

    public function uAdd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
//        var_dump($upload);die;
//        $path=public_path();
        $res = DB::table('url')->insert($data);
        if($res){
            return redirect('/url-list');
        }else{
            return redirect('/url-Add');
        }
    }
    public function urlList()
    {
        $url=Url::all();
        return view('admin.url.urlList', compact('url'));
    }
    public function urlUpdate(Request $request)
    {
        $url = DB::table('url')->where('id',$request->id)->get()->first();
        return view('admin.url.urlUpdate',compact('url'));
    }
    public  function uUpdate(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $res = DB::table('url')->where(['id'=>$data['id']])->update($data);
//         var_dump($res);die;
        if($res){
            return redirect('/url-list');
        }else{
            return redirect('/url-list');
        }
    }
    public  function urlDelete(Request $request)
    {
        $data = DB::table('url')->where('id',$request->id)->delete();
        if($data){
            return redirect('/url-list');
        }else{
            return redirect('/url-list');
        }
    }
}
