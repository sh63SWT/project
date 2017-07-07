@extends('home.article.per')
@section('title', '生活家之已发布文章')
@section('content')
<div class="published">
    <h3 class="hd-title">
        已发布文章<span class="ng-binding ng-scope"> ({{$publishedcount->num}})</span>
    </h3>
    <div class="article-list ng-scope">
        <ul>
            @foreach ($published as $publisheds)
                <li class="article-item ng-scope">
                    <div class="cover-img">
                        <img  alt="暂无封面图" src="{{url('/img')}}/{{$publisheds->icon}}">
                    </div>
                    <div class="ar-title">
                        <a class="ar-link ng-binding ng-scope" href="{{url('home/article/article')}}/{{$publisheds->id}}" target="_blank">{{$publisheds->headline}}</a>
                        <span class="ar-time ng-binding">编辑于{{date('Y-m-d H:i:s', $publisheds->articletime)}}</span>
                    </div>
                    <p class="ng-binding">{{$publisheds->detail}}</p>


                    <div class="opt-btns ng-hide{{$publisheds->id}}" id="ng-hide{{$publisheds->id}}">
                        <span><i class="icon arr"></i></span>
                        <div class="opt-box ng-hide">
                            <a href="" class="ng-scope">编辑</a>
                            <a>删除</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    $(function () {
        var nghide = {{$publisheds->id}};
        for (var i = 0; i < nghide; i++)
        $(".ng-hide[i]").mouseover(function () {
            $(".opt-box[i]").show();
        }).mouseout(function () {
            $("#ng-hide[i]").hide();
        })
    })
</script>
@endsection