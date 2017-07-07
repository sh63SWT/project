@extends('admin.app')
@section('title', '图片')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">图片管理</a> &raquo; 图片列表
    </div>
    <!--面包屑导航 结束-->
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <thead>
                <tr>
                    <th> 图片ID </th>
                    <th> 专辑ID </th>
                    <th> 商品描述 </th>
                    <th> 标签 </th>
                    <th> 图片 </th>
                    <th> 编辑 </th>
                </tr>
                </thead>
                <tbody>
                @if(empty($users))
                    <tr>
                        <td colspan="6">该专辑没有图片哎，添加一下才出来偶！</td>
                    </tr>
                @else
                    @foreach ($users as $picture)
                        <tr >
                            <th scope="row">{{$picture->id}}</th>
                            <td>{{$picture->aid}}</td>
                            <td>{{$picture->describe}}</td>
                            <td>{{$picture->label}}</td>
                            <td>{{$picture->img}}</td>
                            <td>
                                <a href="{{url('admin/picture/pictureEdit')}}/{{$picture->id}}">编辑</a>
                                <a href="{{url('admin/picture/pictureDel')}}/{{$picture->id}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection