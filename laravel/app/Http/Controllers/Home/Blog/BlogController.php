<?php

namespace App\Http\Controllers\Home\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //璇勪环
    public function indexForm(Request $request)
    {
        $blog = DB::table('picture as pic')
            ->select('pic.*', 'a.album')
            ->join('album as a', 'a.id' , 'pic.aid')
            ->where('pic.id',$request->id)
            ->get()
            ->first();
        $uid = Auth::guard()->user()->id;
        $users = DB::table('users')->select('name','icon','id')->where('id', $uid)->get()->first();
        $picnum = DB::table('picture')->select(DB::raw('count(*) as num'))->where('aid',$blog->aid)->get()->first();
        $replay = DB::table('picture_replay')->where('pid',$request->id)->orderBy('reptime', 'desc')->get()->toArray();
        $revert = DB::table('revert')->where('pid',$request->id)->orderBy('revtime', 'desc')->get();
        return view('home.blog.index',compact('blog','picnum', 'replay','revert','users'));
    }

    public function indexblog(Request $request)
    {
        $time = time();
        $uid = $request->uid;
        $result = DB::table('picture_replay')->insert(
            [
                'pid' => $request->id,
                'uid' => $request->uid,
                'replay' => $request->replay,
                'reptime' => $time,
            ]
        );

        if($result){
            $blog = DB::table('picture as pic')
                ->select('pic.*', 'a.album')
                ->join('album as a', 'a.id' , 'pic.aid')
                ->where('pic.id',$request->id)
                ->get()
                ->first();
            $users = DB::table('users')->select('name','icon','id')->where('id', $request->uid)->get()->first();
            $revert = DB::table('revert')->where('pid',$request->id)->orderBy('revtime', 'desc')->get();
            $replay = DB::table('picture_replay')->where('pid',$request->id)->orderBy('reptime', 'desc')->get()->toArray();
            $picnum = DB::table('picture')->select(DB::raw('count(*) as num'))->where('aid',$blog->aid)->get()->first();
            return view('home.blog.index',compact('blog','picnum','replay','revert','users'));
        }else{
            return redirect('home.blog.index');
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $revtime= time();
        $uid = Auth::guard()->user()->id;
        $result = DB::table('revert')->insert(
            [
                'uid' => $uid,
                'rid' => $request->id,
                'pid' => $request->pid,
                'revert' => $request->create,
                'revtime' => $revtime,
            ]
        );
        if($result){
            $blog = DB::table('picture as pic')
                ->select('pic.*', 'a.album')
                ->join('album as a', 'a.id' , 'pic.aid')
                ->where('pic.id',$request->pid)
                ->get()
                ->first();
            $revert = DB::table('revert as r')
                ->select('r.*', 'u.name')
                ->join('users as u', 'r.uid', 'u.id')
                ->where('pid',$request->pid)
                ->orderBy('revtime', 'desc')
                ->get();
//            $revert = DB::table('revert')->where('pid',$request->pid)->orderBy('revtime', 'desc')->get();
            $replay = DB::table('picture_replay')->where('pid',$request->pid)->orderBy('reptime', 'desc')->get()->toArray();
            $users = DB::table('users')->select('name','icon','id')->where('id', $uid)->get()->first();
            $picnum = DB::table('picture')->select(DB::raw('count(*) as num'))->where('aid',$blog->aid)->get()->first();
            return view('home.blog.index',compact('revert','blog','picnum','replay','users'));
        }else{
            return redirect('home.blog.index');
        }
    }
}
