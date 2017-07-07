@extends('home.people.per')
@section('title', '个人文章')
@section('cat')
    <div class="nav-bottom">
        <div class="nav-bottom-span" style="display: block; left: 378px; width: 100px; opacity: 1;"></div>
    </div>
@endsection
@section('content')
    <div class="woo-swb woo-cur" style="display: block;">
        <div class="woo-tmpmasn woo-pcont articlelisit clr woo-masned" style="position:relative;height:0;overflow:hidden;margin:0;padding:0;"></div>


        {{--<div class="woo-pcont articlelisit clr woo-masned" style="height: 227px; position: relative; width: 1040px; visibility: visible;">--}}
        <div class="woo-swb woo-cur" style="width: 1060px;height: 1200px;margin: 0 auto">
            @foreach ($article as $articles)
                <div class="woo co0" data-id="463849" data-ht="227" data-idx="0" style="float: left;margin-right: 20px;margin-left: 40px;margin-bottom: 20px;">
                    <a class="article" href="{{url('home/article/article')}}/{{$articles->id}}" target="_blank">
                        <div class="article-content clr">
                            <div class="article-info">
                                <h3 class="article-title">{{$articles->headline}}</h3>
                                <p class="article-txt">
                                    {{$articles->detail}}
                                </p>
                            </div>
                            <div class="article-cover">
                                <img src="{{url('img')}}/{{$articles->icon}}" width="100" height="100">
                            </div>
                        </div>
                        <div class="article-footer">
                            <span>{{date('Y-m-d',$articles->articletime)}}</span>
                            <span class="r visit-count">2</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>





        <div class="woo-pager" style="display: block; height: auto;">
            <div class="woo-pbr woo-mpbr">
                <ul class="woo-dib">
                    <li class="woo-cur">1</li>
                </ul>
            </div>
        </div>
    </div>
@endsection