<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="description" content="敲敲木鱼打打鼓的堆糖空间,共有2个专辑,7个收集,7个发布,了解敲敲木鱼打打鼓的喜好,同敲敲木鱼打打鼓分享生活发现从堆糖开始!">
    <meta name="keywords" content="敲敲木鱼打打鼓的兴趣爱好">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/lib.f0824a12.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/other.css') }}">
</head>
<body>
<div id="content">
    <div class="layer layer-full oh">
        <div class="tube">
            <div class="block blockmb">
                <div class="people-header">
                    <div class="people-header-left">
                        <img class="header-bg" src="{{url('/img/home/ban.jpeg-0_1_0.445')}}">
                        <div class="header-bg-mask"></div>
                        <table>
                            <tbody>
                            <tr>
                                <td class="people-info">
                                    <a class="people-avatar" href="/people/?user_id=15050675">
                                        @if($user->icon)
                                            <img src="{{url('/img')}}/{{$user->icon}}">
                                        @else
                                            <img src="{{URL::asset('img/admin/default.png')}}">
                                        @endif
                                    </a>
                                    <div class="people-name">
                                        <a href="/people/?user_id=15050675">

                                        </a>
                                    </div>
                                    <div class="people-meta">
                                        <span>★ {{$user->name}}</span>
                                    </div>
                                    <div class="people-funs">
                                        <a href="/vipCare/{{$user->id}}" target="_blank" href="/people/followed/list/?user_id=815670">关注<u>  </u></a>
                                        <a href="/vipVer/{{$user->id}}" target="_blank" href="/people/follower/list/?user_id=815670">粉丝<u>  </u></a>
                                    </div>
                                    <div class="people-desc"></div>
                                    <div class="people-social"></div>
                                    <div class="people-action">
                                        <div class="people-edit">
                                            <div class="people-edit-bg"></div>
                                            {{--@if($status == 1)--}}
                                                {{--<a class="follow" href="javascript:;" data-follow="{&quot;rel&quot;:0,&quot;id&quot;:&quot;815670&quot;}" title="已关注"><i></i>已关注</a>--}}
                                            {{--@else--}}
                                                {{--<a href="/home/addcare/{{$user->id}}" class="follow" href="javascript:;" data-follow="{&quot;rel&quot;:0,&quot;id&quot;:&quot;815670&quot;}" title="未关注"><i></i>未关注</a>--}}
                                            {{--@endif--}}
                                            <a target="_blank" class="people-edit-btn" href="/home/vipUpdate"><i></i>编辑</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="people-header-right">
                        <img class="header-bg" src="{{url('/img/home/xia.jpeg-0_1_0.445')}}">
                        <div class="header-bg-mask"></div>
                    </div>

                    <div class="reply-addpic header-bg-change">
                        <div class="header-bg-change-bg"></div>
                        <a class="abtn-up dib header-bg-change-btn" href="javascript:;" id="reply-addpic-btn">修改封面
                            <form class="form-reply-uppic" target="alupifr" enctype="multipart/form-data" method="POST" action="/upload/photo/">
                                <input name="img" hidefocus="true" type="file">
                                <input type="hidden" name="tid" value="">
                                <input type="hidden" name="callback" value="$.fn.uploadpic.upPicCallBack">
                                <iframe name="alupifr" src="about:blank" class="dn" scrolling="no" frameborder="0" height="0" width="0"></iframe>
                                <input type="hidden" name="type" value="reply">
                            </form>
                        </a>
                        <div class="reply-normal dib gray ml8 l20"></div>
                        <div class="reply-uploading dib loading3 dn"></div>
                        <div class="reply-uperror dib ml8 l20 red dn"></div>
                        <div class="reply-uploaded dib ml8 l20 dn"></div>
                    </div>
                </div>
            </div>

            <div id="woo-holder">
                <a name="woo-anchor"></a>
                <div class="preview-action clr">
                    <div class="preview-slider-wrap">
                        <a class="preview-min" href="javascript:;"></a>
                        <div class="preview-slider">
                            <a href="javascript:;"></a>
                        </div>
                        <a class="preview-max" href="javascript:;"></a>
                    </div>
                    <a class="preview-ok btn-blue" href="javascript:;">确定</a>
                    <a class="preview-cancel btn-gray" href="javascript:;">取消</a>
                </div>

                <div id="dymnav" class="nav-wrap people-nav-wrap">
                    <ul class="people-nav clr dymswitch-0">
                        <li class="woo-swa woo-cur"><a href="{{url('home/personal/index')}}/{{$id}}">专辑<u> 2 </u></a></li>

                        <li class="woo-swa"><a href="{{url('home/personal/article')}}/{{$id}}">文章<u> 1 </u></a></li>

                        <li class="woo-swa"><a href="{{url('information')}}">查看订单<u> 0</u></a></li>

                        <li class="woo-swa"><a href="{{url('home/personal/collect')}}/{{$id}}">收集的图片<u> 7 </u></a></li>

                        <li class="woo-swa"><a href="{{url('home/personal/original')}}/{{$id}}">发布的图片<u> 7</u></a></li>
                    </ul>
                    {{--<ul class="people-nav clr dymswitch-0">--}}
                        {{--<li class="woo-swa woo-cur"><a href="{{url('home/personal/index')}}">专辑<u> 2 </u></a></li>--}}

                        {{--<li class="woo-swa"><a href="{{url('home/personal/article')}}">文章<u> 1 </u></a></li>--}}

                        {{--<li class="woo-swa"><a href="javascript:;">收藏的专辑<u> 0</u></a></li>--}}

                        {{--<li class="woo-swa"><a href="{{url('home/personal/collect')}}">收集的图片<u> 7 </u></a></li>--}}

                        {{--<li class="woo-swa"><a href="{{url('home/personal/original')}}">发布的图片<u> 7</u></a></li>--}}
                    {{--</ul>--}}
                    @section('cat')
                    @show
                </div>

                @section('content')
                @show

            </div>
        </div>
    </div>
</div>

@section('create')
@show
</body>
</html>