<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function connter()
    {
        $db = DB::connection()->getpdo();
        dump($db);
        //dump(env('DB_USERNAME'));
        //dump(env('DB_DATABASE'));
    }

    public function selectData()
    {
        $result = DB::select("select * from swt_article_category");
        dump($result);
    }

}
