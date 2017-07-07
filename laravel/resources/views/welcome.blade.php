<!DOCTYPE html>
<html>
<head>
    <title>一个半</title>
    <link rel="stylesheet" href="{{ URL::asset('css/home/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/index1.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/1.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/slideshow.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/slideshow.css') }}">
    <script rel="stylesheet" src="{{URL::asset('js/home/slideshow.js')}}"></script>
    <script rel="stylesheet" src="{{URL::asset('js/home/smove.js')}}"></script>
</head>
<body>
<!-- 头部 -->
@extends('home.head');
@include('home.head');
<!-- 主体 -->
<div id="content">
    <div class="dt-wrap">
        <div id="dt-top" class="clr">
            <div id="dt-top-inner">
                <div class="l pg-fscleft">
                    <!-- 图片 -->
                    <div id="dt-carousel">
                        <div id="slide">
                            <a id="btnLeft" href="javascript:void(0);"> </a>
                            <a id="btnRight" href="javascript:void(0);"> </a>
                            <ul style="left:0px;" id="banner">
                                @foreach($slideshow as $slideshows)
                                    <li><a href="javascript:void(0);"><img src="{{URL::asset('img/admin/')}}/{{$slideshows->img}}" width="1200px;"/></a>

                                    </li>

                                @endforeach
                            </ul>
                            <div id="ico" class="ico">
                                <a class='active' href="javascript:void(0);"> </a>
                                <a href="javascript:void(0);"> </a>
                                <a href="javascript:void(0);"> </a>
                                <a href="javascript:void(0);"> </a>
                                <a href="javascript:void(0);"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 中间内容 -->
    <div id="dt-center" class="clr">
        <!-- 专辑精选框 -->
        <div class="dt-block">
            <!-- 右边按钮 -->
            <div class="pg-ttentry r">
                <a target="_blank" class="pg-blue-btn" href=" ">往期回顾 &gt;</a>
            </div>
            <h2>专辑精选</h2>
            <!-- 内容框 -->
            <div class="dt-album oh">
                <!-- 每一个小框 -->
                @foreach($album as $albums)
                    <div class="section" data-id="84382417">
                        <a href="{{url('home/people/index')}}/{{$albums->uid}}">
                            <div class="section-img">
                                <img src="{{URL::asset('img')}}/{{$albums->img}}">
                                {{--<a target="_blank" class="dt-img-cover" href="https://www.duitang.com/album/?id=84382417"></a>--}}
                            </div>
                        </a>
                        <div class="section-desc">
                            <a target="_blank" class="section-title" href="##">
                                {{$albums->describe}}
                            </a>
                            <div class="section-attr">
                                <p>
                                    67张图片 <b>·</b> 641人收藏
                                </p>

                                <p>
                                    by <a class="dt-username" href="">{{$albums->name}}</a>
                                </p>
                            </div>
                            <div class="section-bottom-a"></div>
                            <div class="section-bottom-b"></div>
                        </div>
                    </div>
            @endforeach
            <!-- 每一个小框 -->
            </div>
        </div>
        <!-- 单品推荐大框 -->
        <div class="dt-block">
            <!-- 右边导航栏 -->
            @if($uid)
                {{Auth::guard()->user()->id}}
            @endif
            <div class="pg-tmentry r pg-gray-link">
                <span>良品购：</span>
                <a href="{{url('/cgood')}}">全部</a>
                @foreach($category as $categorys)
                    <a  href="{{url('/cgood')}}/{{$categorys->id}}">{{$categorys->name}}</a>
                @endforeach

            </div>
            <h2>单品推荐<a target="_blank" class="dt-sblnk"></a></h2>
            <!-- 内容大框 -->
        </div>
        <!-- 达人大框 -->
        <!-- 大家都在逛框 -->
    </div>
</div>
<!-- 内容大框 -->
<div class="goods_list">
    <div class="goods">
        <div class="goods_list">
            <ul class='clear'>
                @foreach($goods as $good)
                    <li class='list'>
                        <a href="/goods/{{$good->id}}" ><img src="{{URL::asset('img/admin/')}}/{{$good->icon}}" width='235' height="226px"></a>
                        <div class="more">
                            <p class='name'><a href="">{{$good->name}}</a></p>
                            <p class='price'><b>￥{{$good->price}}</b></p>
                            <p class="sold">已售件{{$good->sold}}件</p>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
</div>
<!-- 内容框 -->

<div id="dt-woomore"></div>
</div>
<div id="footer" class="footeridx" style="display: block;">
    <script src="{{ URL::asset('js/home/index3.js') }}"></script>
    @extends('home.floor');
    @include('home.floor');

    <div class="dt-side-combo" style="position: fixed; bottom: 30px; z-index: 10000; width: 48px; height: 142px; left: 50%; right: 10px; top: auto; margin-left: 612px; opacity: 1; display: block;">
        <div class="SG-sidecont">
            <div id="dt-side-combo">
                <a id="dt-backtotop" class="dt-backtotop" href="javascript:;">回到顶部</a>
                <a class="dt-app" href="https://www.duitang.com/app/duitang/">手机应用</a>
                <a class="dt-report" href="https://www.duitang.com/leave/message/">反馈意见</a>
            </div>
        </div>
    </div>
</body>
</html>
