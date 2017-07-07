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
                        <th>订单编号</th>
                        <th>用户id</th>
                        <th>收件人姓名</th>
                        <th>电话号码</th>
                        <th>address</th>
                        <th>总价</th>
                        <th>下单时间</th>
                        <th>订单状态</th>
                        <th>支付状态</th>
                        <th>支付状态</th>
                        <th>操作</th>

                    </tr>
                    @foreach($data as $v)
                        <td class="tc">{{$v->id}}</td>
                        <td>{{$v->orderNum}}</td>
                        <td>{{$v->uid}}</td>
                        <td>{{$v->receiver}}</td>
                        <td>{{$v->phone}}</td>
                        <td>{{$v->address}}</td>
                        <td>{{$v->count}}</td>
                        <td>{{$v->time}}</td>
                        @if($v->status==1)
                            <td>待发货</td>
                        @elseif($v->status==2)
                            <td>待收货</td>
                        @else
                            <td>已收货</td>
                        @endif
                        @if($v->isPay==1)
                            <td>已支付</td>
                        @else
                            <td>未支付</td>
                        @endif
                        @if($v->cancel==1)
                            <td>已取消订单</td>
                        @else
                            <td>未取消订单</td>
                        @endif
                        <td>
                            <a href="/orderUpdate/{{$v->id}}">修改</a>
                            <a href="/order-delete/{{$v->id}}">删除</a>
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