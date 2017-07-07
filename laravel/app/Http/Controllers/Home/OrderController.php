<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public  function  order(Request $request)
    {
        $uid = Auth::guard()->user();//获取当前用户id
        $uuid=$uid->id;
        if(empty($uid)){
            $uid = '';
        }else{
            $uid = Auth::guard()->user()->name;
        }
//        dd($request->all());
        $order=DB::table('car')->where('uid',$uuid)->get();
//        dd($order);
        return view('home.order',compact('order','uid'));
    }
    public function end()
    {
        return view('home/end');
    }
    public function orders(Request $request)
    {
        $uid = Auth::guard()->user();//获取当前用户id
        $uuid=$uid->id;
        if(empty($uid)){
            $uid = '';
        }else{
            $uid = Auth::guard()->user()->name;
        }
//        dd($request->all());
        $Num = str_random(40);
        $time=date('Y-m-d h:i:s',time());
        $data=[
            'orderNum'=>$Num,
            'uid'=>1,
            'receiver'=>$request->receiver,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'count'=>$request->count,
            'time'=>$time,
            'status'=>"1",
            'isPay'=>"1",
            'cancel'=>'2',
        ];
//        dd($data);
        $order=DB::table('order')->insert($data);
        if ($order) {
            DB::table('car')->where('uid',$uuid)->delete();
        } else {
            return back();
        }

    }
    public function information()
    {
        $uid = Auth::guard()->user();//获取当前用户id
        $uuid=$uid->id;
        if(empty($uid)){
            $uid = '';
        }else{
            $uid = Auth::guard()->user()->name;
        }
        $data=DB::table('order')->where('uid',$uuid)->orderby('id','desc')->get();
//        dd($data);
        return view('home.information',compact('data','uid'));
    }

    public function cancel($id)
    {
        $uid = Auth::guard()->user();//获取当前用户id
        if(empty($uid)){
            $uid = '';
        }else{
            $uid = Auth::guard()->user()->name;
        }
        $a=DB::table('order')->where('id',$id)->get();
        return view('home.cancel',compact('a','uid'));
//        dd($id);
//        $a=DB::table('order')->where('id',$id)->get();
//        $b=$a->first()->cancel;
//        if ($b==2)
//        {
//            $b ==1;
//        }
//        dd($b);

    }
    public function status($id)
    {
        $uid = Auth::guard()->user();//获取当前用户id
        if(empty($uid)){
            $uid = '';
        }else{
            $uid = Auth::guard()->user()->name;
        }
        $a=DB::table('order')->where('id',$id)->get();
        return view('home.status',compact('a','uid'));
//        dd($id);
//        $a=DB::table('order')->where('id',$id)->get();
//        $b=$a->first()->cancel;
//        if ($b==2)
//        {
//            $b ==1;
//        }
//        dd($b);

    }
    public function statuss(Request $request)
    {
        $data=$request->all();
//        dd($data);
        unset($data['_token']);

        $a=DB::table('order')->where('id',$data['id'])->update($data);
//        dd($a);
        if ($a)
        {
            return redirect('/information');
        }else{
            return back();
        }
    }

    public function cancels(Request $request)
    {
        $data=$request->all();
//        dd($data);
        unset($data['_token']);

        $a=DB::table('order')->where('id',$data['id'])->update($data);
//        dd($a);
        if ($a)
        {
            return redirect('/information');
        }else{
            return back();
        }
    }
}
