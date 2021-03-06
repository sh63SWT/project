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
                        <th>商品图片</th>
                        <th>描述</th>
                        <th>作者</th>
                        <th>显示</th>
                        <th>操作</th>

                    </tr>
                    @foreach($slideshow as $slideshows)
                    <td class="tc">{{$slideshows->id}}</td>
                    <td>  <img src="{{URL::asset('img/admin/')}}/{{$slideshows->img}}" width="100px"> </td>
                    <td>{{$slideshows->desc}}</td>
                    <td>{{$slideshows->by}}</td>
                    @if($slideshows->display==2)
                    <td>是</td>
                    @else
                    <td>否</td>
                    @endif
                        <td>
                            <a href="/slideshowUpdate/{{$slideshows->id}}">修改</a>
                            <a href="/slideshow-delete/{{$slideshows->id}}">删除</a>
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