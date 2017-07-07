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
                        <th>商品名称</th>
                        <th>商品图片</th>
                        <th>分类id</th>
                        <th>价格</th>
                        <th>库存</th>
                        <th>已售</th>
                        <th>新品</th>
                        <th>上架</th>
                        <th>热销</th>
                        <th>满减</th>
                        <th>打折</th>
                        <th>简介</th>
                        <th>操作</th>

                    </tr>
                    @foreach($goods as $good)
                    <td class="tc">{{$good->id}}</td>
                    <td>{{$good->name}}</td>
                    <td>  <img src="{{URL::asset('img/admin/')}}/{{$good->icon}}" width="100px"> </td>
                    <td>{{$good->cid}}</td>
                    <td>{{$good->price}}</td>
                    <td>{{$good->store}}</td>
                    <td>{{$good->sold}}</td>
                    @if($good->new==1)
                    <td>是</td>
                    @else
                    <td>否</td>
                    @endif
                    @if($good->up==1)
                        <td>是</td>
                    @else
                        <td>否</td>
                    @endif
                    @if($good->hot==1)
                        <td>是</td>
                    @else
                        <td>否</td>
                    @endif
                    @if($good->reduction==1)
                        <td>是</td>
                    @else
                        <td>否</td>
                    @endif
                    @if($good->discount==1)
                        <td>是</td>
                    @else
                        <td>否</td>
                    @endif
                    <td>{{$good->desc}}</td>
                        <td>
                            <a href="/goodsUpdate/{{$good->id}}">修改</a>
                            <a href="/goods-delete/{{$good->id}}">删除</a>
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