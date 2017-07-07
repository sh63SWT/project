<?php

namespace App\Http\Controllers\Home\article;

use App\Models\Home\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ArticleController extends Controller
{
    //进入生活家
    public function tests($uid)
    {
        dump($uid);
        $users= DB::table('users')->select('email')->where('id', $uid)->get()->first();
        dump($users);
        return view('home.emails.tests', compact('$users', 'id'));
    }

    public function verify(Request $request)
    {
        $rules = array(
            'email' => 'required|email|exists:users,email',
        );
        $mess = array(
            'email.required' => '邮箱为空！！',
            'email.email' => '邮箱格式不正确！！',
            'email.exists' => '很抱歉，您绑定的邮箱和您注册时填写的邮箱不一致，请重新填写！！'
        );
        $this->validate($request, $rules, $mess);

        $code = $this->getCode();
        $email = $request->email;
        $this->email = $email;

        $flag = Mail::send('home.emails.test', ['name' => $code], function ($message) {
            $to = $this->email;
            $message->to($to)->subject('生活家邮箱验证');
        });
//        var_dump($flag);
        if(!$flag){
            $emadb= DB::table('email')->where(['email'=>$request['email']])->get()->first();
            if(!$emadb){
                $result = DB::table('email')->insert(['email' => $email, 'code' => $code]);
            } else {
                $res = DB::table('email')->where(['email'=>$request['email']])->update(['email' => $email,'code' => $code]);
            }
            return json_encode(array('status' => 0, 'msg' => '邮箱发送成功，请注意查收'));
        } else {
            return json_encode(array('status' => 1, 'msg' => '邮箱发送失败，请重新发送'));
        }
    }
    //验证码
    public function getCode()
    {
        $charset='0123456789';
        $pos = strlen($charset) - 1;
        $code = '';
        for ($i = 0; $i < 4; $i ++) {
            $code .= $charset[mt_rand(0,$pos)];
        }
        return $code;
    }

    //
    public function codelog(Request $request)
    {
        $rules = array(
            'email' => 'required|email|exists:users,email',
            'code' => 'required|exists:email,code'
        );
        $mess = array(
            'email.required' => '邮箱为空！！',
            'email.email' => '邮箱格式不正确！！',
            'email.exists' => '很抱歉，您绑定的邮箱和您注册时填写的邮箱不一致，请重新填写！！',
            'code.required' => '验证码为空！！',
            'code.exists' => '验证码错误，请重新填写！！'
        );
        $this->validate($request, $rules, $mess);
        return json_encode(array('status' => 0));
    }
    // 邮箱验证结束


    //文章首页  跳转写文章
    public function indexFrom()
    {
        $uid = Auth::guard()->user()->id;
        $users = DB::table('users')->select('name','icon')->where('id', $uid)->get()->first();
        return view('home.article.index', compact('$uid','users'));
    }

    //生活家之已发布文章
    public function published()
    {
        $uid = Auth::guard()->user()->id;
        $users = DB::table('users')->select('name','icon')->where('id', $uid)->get()->first();
        $published= DB::table('article')->where('uid',$uid)->get();
//        dump($published);
        $publishedcount= DB::table('article')->select(DB::raw('count(id) as num'))->get()->first();
        return view('home/article/published', compact('published', 'publishedcount','users'));
    }

    //生活家之文章素材库
    public function videolib()
    {
        $uid = Auth::guard()->user()->id;
        $users = DB::table('users')->select('name','icon')->where('id', $uid)->get()->first();
        return view('home.article.videolib',compact('users'));
    }


    //添加新文章
    public function create()
    {
        $users = DB::table('article_category')->get()->toArray();
        return view('home.article.create', compact('users'));
    }

    // 发布文章
    public function createArticle(Request $request)
    {
        $uid = Auth::guard()->user()->id;
        $upload = ($request->icon);//获取图片信息
        $info = $upload->store('uploads');//上传路径
        $time = date(time());
        $result = DB::table('article')->insert(
            [
                'arid' => $request->arid,
                'uid' => $uid,
                'icon' => $info,
                'headline' => $request->headline,
                'detail' => $request->detail,
                'articletime' => $time
            ]
        );
        if($result){
            $uid = Auth::guard()->user()->id;
            $users = DB::table('users')->select('name','icon')->where('id', $uid)->get()->first();
            $published= DB::table('article')->get();
            $publishedcount= DB::table('article')->select(DB::raw('count(id) as num'))->get()->first();
            return view('home/article/published', compact('published', 'publishedcount','users'));
        }else{
            echo '添加失败，请重新添加';
        }
    }

    //点击文章进入详情
    public function separateArticle($id)
    {
        $article = DB::table('article')->where(['id'=>$id])->get()->first();
        return view('home/article/article', compact('article'));
    }


}
