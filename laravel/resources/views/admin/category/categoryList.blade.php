@extends('admin.app')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">权限管理</a> &raquo; 权限列表
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="/permission-add"><i class="fa fa-plus"></i>新增权限</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>父类id</th>
                        <th>path</th>
                        <th>display</th>
                        <th>操作</th>
                    </tr>
                    @foreach($categorys as $category)
                    <td class="tc">{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->pid}}</td>
                    <td>{{$category->path}}</td>
                    <td>{{$category->display}}</td>
                    <td>

                    <a href="/cAdd/{{$category->id}}">添加子分类</a>
                    <a href="/category-Update/{{$category->id}}">修改</a>
                    <a href="/category-delete/{{$category->id}}">删除</a>
                    </td>
                    </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
@endsection