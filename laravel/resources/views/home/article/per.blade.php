<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/home/lib.f0824a12.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/layout.877ca1bb.css') }}">
    <style type="text/css">
        .sidebar{background-color:#fefefe;width:205px;float:left}
        .sidebar.hidden{width:0;overflow:hidden}
        .sidebar li{display:block;height:48px;line-height:48px;font-size:14px;padding-left:55px;color:#666;position:relative;box-sizing:border-box}
        .sidebar li:hover{background-color:#f1f1f1;cursor: pointer;}
        .sidebar li i{position:absolute;left:16px;top:9px;font-size: 17px;}
        .sidebar li.active{color:#fff;background-color:#fc8383}
        .sidebar li em{font-size:12px}
        .warp-inner .ng{display: none;}
        .warp-inner .ng.active{display: block;}
    </style>
    <style type="text/css">
        .nav-bar{position:fixed;width:100%;left:0;top:0;z-index:999;background-color:#fff;margin:0;height:65px;border-bottom:1px solid #e3e3e3;padding:0 60px;box-sizing:border-box}
        /*.nav-bar .logo{float:left;background:url("./images/20160504140920_f4MJH.png") 0 no-repeat;width:160px;height:100%}*/
        .nav-bar .userinfo{position:relative;float:right}
        .nav-bar .userinfo .avatar-v{position:absolute;width:13px;height:13px;left:25px;top:40px}
        .nav-bar .userinfo img{display:inline-block;vertical-align:middle;width:38px;height:38px;border-radius:50%;-webkit-border-radius:50%;-moz-border-radius:50%;margin-right:16px}
        .nav-bar .userinfo a{font-size:14px;color:#666;text-decoration:none;display:block;line-height:64px}
    </style>

    <script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
</head>
<body>
<div class="container ng-scope">

    <div class="ng-scope ng-isolate-scope">
        <div id="header">
            <nav class="nav-bar">
                <a class="logo" href="##"></a>
                <div class="userinfo">
                    <a href="{{ url('home/personal/index')}}/{{Auth::guard()->user()->id}}" target="_blank" class="ng-binding">
                        <img class="pg-avatar" src="{{url('/img')}}/{{$users->icon}}"> {{$users->name}}
                    </a>
                </div>
            </nav>
        </div>
    </div>


    <div id="content">
        <div class="warp">
            <navbar class="ng-isolate">
                <aside class="sidebar">
                    <ul>
                        <li class=""><a href="{{url('home/article/index')}}">写文章 <em>(发布视频)</em></a></li>
                        <li class=""><a href="{{url('home/article/published')}}">已发布文章</a></li>
                        <li class=""><a href="{{url('home/article/videolib')}}">文章素材库</a></li>
                    </ul>
                </aside>
            </navbar>

            <div class="warp-inner">

                @section('content')
                @show

            </div>
        </div>
    </div>
</div>
</body>
</html>