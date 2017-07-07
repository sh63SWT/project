@extends('admin.app')
@section('title', '评论')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">评论管理</a> &raquo; 评论列表
    </div>
    <!--面包屑导航 结束-->
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> UID </th>
                    <th> PID </th>
                    <th> replay </th>
                    <th> reptime </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $replays)
                    <tr >
                        <th scope="row">{{$replays->id}}</th>
                        <td>{{$replays->uid}}</td>
                        <td>{{$replays->pid}}</td>
                        <td>{{$replays->replay}}</td>
                        <td>{{date('Y-m-d H:i:s', $replays->reptime)}}</td>
                        <td>
                            <a href="{{url('admin/blog/blogUpdate')}}/{{$replays->id}}">编辑</a>
                            <a href="{{url('admin/blog/blogDel')}}/{{$replays->id}}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<div class="page_list">--}}
            {{--<ul>--}}
            {{--<li class="disabled"><a href="#">&laquo;</a></li>--}}
            {{--<li class="active"><a href="#">1</a></li>--}}
            {{--<li><a href="#">2</a></li>--}}
            {{--<li><a href="#">3</a></li>--}}
            {{--<li><a href="#">4</a></li>--}}
            {{--<li><a href="#">5</a></li>--}}
            {{--<li><a href="#">&raquo;</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection