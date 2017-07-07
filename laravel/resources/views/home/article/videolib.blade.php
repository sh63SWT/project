@extends('home.article.per')
@section('title', '生活家之文章素材库')
@section('content')
<div class="video">
    <h3 class="hd-title">
        视频素材
        <a class="addnew-btn" href="https://www.duitang.com/life_artist/index/#/videolib/create/">+ 添加新视频</a>
    </h3>
    <p class="has-none ng-scope" ng-if="videolib.videoList.length&lt;1">
        您还没有添加任何视频，您可以立即<a href="">新建视频</a>
    </p>
</div>
@endsection