<?php

namespace App\Http\Controllers\Admin;

use App\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //商品的添加
    public function goodsAdd()
    {
        $goods=DB::table('category')->where('pid','0')->get();
        return view('admin.goods.goodsAdd',compact('goods'));
    }
    public function gAdd(Request $request)
    {
        $re = $request->all();
        unset($re['_token']);
        $upload=($request->icon);
//        dd($upload);
        $info=$upload->store('upload');
//        var_dump($info);die;
        $name=explode('/',$info)[1];
//        $path=public_path();
        $upload->move('img/admin',$name);
        $re['icon']=$name;
        $res = DB::table('goods')->insert($re);
        if ($res) {
            return redirect('/goods-list');
            } else {
                return redirect('/goods-Add');
            }
        }

        public function goodsList()
        {
            $goods=Goods::all();
            return view('admin.goods.goodsList', compact('goods'));
        }
        //更新商品
        public function gUpdate(Request $request)
        {
            $categorys = DB::table('goods')->where('id',$request->id)->get()->first();
            $g=DB::table('category')->where('pid','0')->get();
            $goods=DB::table('category')
                ->select('name')
                ->where('id',$categorys->cid)
                ->get()
                ->first();
//            var_dump($goods);die();
            return view('admin.goods.goodsUpdate',compact('categorys','goods','g'));
        }

        public function goodsUpdate(Request $request)
        {
            $data=$request->all();
//            var_dump($data);
            unset($data['_token']);
            $upload=($request->icon);
            if ($upload==null){
                $res = DB::table('goods')->where('id',$data['id'])->update($data);
                if($res){
                    return redirect('/goods-list');
                }else{
                    return redirect('/goods-list');
                }
            }else{
                $info=$upload->store('upload');
//            var_dump($info);die;
                $name=explode('/',$info)[1];
//            dd($name);
                $upload->move('img/admin',$name);
                $data['icon']=$name;
                $res = DB::table('goods')->where('id',$data['id'])->update($data);
//         var_dump($res);die;
                if($res){
                    return redirect('/goods-list');
                }else{
                    return redirect('/goods-list');
                }
            }
//            var_dump($upload);die;

        }
            public function goodsDelete(Request $request,$id)
        {
//            dd($id);
//            var_dump($request->all());die;
            $data = DB::table('goods')->where('id',$id)->delete();
            if($data){
                return redirect('/goods-list');
            }else{
                return redirect('/goods-list');
            }
        }


}
