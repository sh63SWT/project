@extends('home.article.per')
@section('title', '生活家之写文章')
@section('content')
<div class="ng draft active">
    <h4 class="hd-title">添加新文章</h4>
    <p class="has-none">
        <a class="addnew-btn" href="{{ url('home/article/create')}}" target="_blank">+ 添加新文章</a>
    </p>
</div>
@endsection