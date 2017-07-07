<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderlist()
    {
        $data=DB::table('order')->get();
        return view('admin.order.orderlist',compact('data'));

    }

    public function cancellist()
    {
        $data=DB::table('order')->where('cancel',1)->get();
        return view('admin.order.cancel',compact('data'));
    }
    public function statuslist()
    {
        $data=DB::table('order')->where('status',1)->where('cancel',2)->get();
        return view('admin.order.status',compact('data'));
    }
    public  function status1list(Request $request)
    {
        $data=DB::table('order')->where('status',2)->where('cancel',2)->get();
        return view('admin.order.status',compact('data'));
    }
    public function orderUpdate(Request $request)
    {
        $data=DB::table('order')->where('id',$request->id)->get()->first();
        return view('admin.order.orderUpdate',compact('data'));

    }

    public function oUpdate(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $res = DB::table('order')->where(['id'=>$data['id']])->update($data);
        if($res){
            return redirect('/status_list');
        }else{
            return redirect('/status_list');
        }
    }
}
