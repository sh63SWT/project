@extends('home.people.per')
@section('title', '发布的图片')
@section('cat')
    <div class="nav-bottom">
        <div class="nav-bottom-span" style="display: block; left: 793px; width: 100px; opacity: 1;"></div>
    </div>
@endsection
@section('content')
    <div class="woo-pcont stpics clr" style=" width: 1200px;">
        @foreach ($picture as $pictures)
            <div class="woo co1" style="overflow:hidden;float: left;margin-left: 8px;margin-right: 8px;margin-bottom: 15px;">

                <div class="j">
                    <div class="mbpho">
                        <a target="_blank" class="a" href="{{url('home/blog/index')}}/{{$pictures->id}}" style="height: 200px">
                            <img src="{{url('/img')}}/{{$pictures->img}}">
                        </a>
                        <div class="collbtn" style="position: absolute; left: 0px; top: 0px; display: none;">
                            <a class="y" href="#">
                                <i></i>
                                <em>收集  118</em>
                            </a>
                            <a class="x btn-white" href="#"><i></i></a>
                            <a class="z re-zan btn-white" href="/blog/?id=771983841">
                                <i class="z-done"> 0</i>
                            </a>
                        </div>
                    </div>
                    <div class="wooscr">
                        <div class="g">{{$pictures->describe}}</div>
                        <div class="d">
                            <span class="d1">118</span>
                            <span class="d2 dn">0 </span>
                            <span class="d3 dn"></span>
                        </div>
                        <ul>
                            <li class="f">
                                {{--<a target="_blank" href="{{url('home/blog/index')}}/{{$pictures->id}}">--}}
                                <a target="_blank" href="#">
                                    <img src="{{url('/img/home/zi1.jpeg')}}" width="24" height="24">
                                </a>
                                <p>
                                    <a class="p" href="#">
                                        敲敲木鱼打打鼓
                                    </a>&nbsp;<br>
                                    <span>收集到<a target="" href="#">{{$pictures->album}}</a></span>
                                </p>
                            </li>
                            <!--评论部分-->
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection