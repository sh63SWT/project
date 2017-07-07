<?php

namespace App\Http\Controllers\Home;

use App\Car;
use App\Models\swt_good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopCartController extends Controller
{
//    购物车
    public function cart(Request $request)
    {
        $request->session()->put("id","1");
//        dd($request->session()->get("id"));
       $cart = swt_good::select([
           "swt_car.id",
           "swt_car.gid",
           "swt_car.icon",
           "swt_car.name",
           "swt_car.price",
           "swt_car.size",
           "swt_car.count",
           "swt_goods.store"
       ])->crossJoin("swt_car","swt_car.gid","swt_goods.id")
           ->get();
//        dd($cart);
//        $order=DB::table('swt_car')->where('uid','1')->get();
//        //
//        if (isset($order['gid'])) {
//           $order['count'] += $order['count'];
//        }else{
//            $order['gid'] = $result;
//        }
//        foreach ($cart as $v)
//        {
//            dump($v->gid);
//            $oid = $v->gid;//重复id
//
//        }
//        dd();
        return view("home.shopCart", compact('cart'));
    }

    public function del(Request $request)
    {
        $cart = DB::table('car')->where('id',$request->id)->delete();

    }

}
