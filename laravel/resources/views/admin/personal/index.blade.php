@extends('admin.app')
@section('title', '专辑')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">专辑管理</a> &raquo; 专辑列表
    </div>
    <!--面包屑导航 结束-->
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> 用户ID </th>
                    <th> 专辑名称 </th>
                    <th> 描述 </th>
                    <th> 标签 </th>
                    <th> 编辑 </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $category)
                    <tr >
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->uid}}</td>
                        <td>{{$category->album}}</td>
                        <td>{{$category->describe}}</td>
                        <td>{{$category->label}}</td>
                        <td>
                            <a href="{{url('admin/personal/personalDetail')}}/{{$category->id}}">详情</a>
                            <a href="{{url('admin/personal/personalUpdate')}}/{{$category->id}}">编辑</a>
                            <a href="{{url('admin/personal/personalDel')}}/{{$category->id}}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection