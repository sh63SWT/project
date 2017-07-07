@extends('admin.app')
@section('title', '发布的文章')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> uid </th>
                    <th> 分类id </th>
                    <th> 封面图片 </th>
                    <th> 标题 </th>
                    <th> 内容 </th>
                    <th> 添加时间 </th>
                    <th> 编辑 </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $category)
                        <tr >
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->uid}}</td>
                            <td>{{$category->arid}}</td>
                            <td>{{$category->icon}}</td>
                            <td>{{$category->headline}}</td>
                            <td>{{$category->detail}}</td>
                            <td>{{date('Y-m-d H:i:s',$category->articletime)}}</td>
                            <td>
                                <a href="{{url('admin/article/aUpd')}}/{{$category->id}}">编辑</a>
                                <a href="{{url('admin/article/aDel')}}/{{$category->id}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection