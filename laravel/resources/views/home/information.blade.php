 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/information.css') }}">
</head>
<body>
@extends('home.head');
@include('home.head');
<div class="information_all clear">
    <div class="information_box clear">
        <div class="information_body clear">
            <div class="information_nav">
            </div>
            <div class="information_main">
                <div class="information_main_nav">
                    <a>订单信息</a>
                </div>
                <div class="information_bottom">
                    <table >
                        <thead>


                        <tr>
                            <th class="col1">订单编号</th>
                            <th class="col2">收货人</th>
                            <th class="col3">收货地址</th>
                            <th class="col4">联系方式</th>
                            <th class="col5">下单时间</th>
                            <th class="col6">发货状态</th>
                            <th class="col7">取消</th>
                            <th class="col8">收货</th>
                            {{--<th class="col9">详情</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                        <tr>
                            <td class="col1">
                                <a>{{$v->orderNum}}</a>
                            </td>
                            <td class="col2"> <p>{{$v->receiver}}</p></td>
                            <td class="col3">{{$v->address}}</td>
                            <td class="col4">{{$v->phone}}</td>
                            <td class="col5">{{$v->time}}</td>
                            @if($v->status==1)
                            <td class="col6">待发货</td>
                            @elseif($v->status==2)
                            <td class="col6">待收货</td>
                            @else
                            <td class="col6">已收货</td>
                            @endif
                            @if($v->cancel==1)
                            <td class="col7"><div class="cancel">已取消</div></td>
                            @elseif($v->status==3)
                            <td class="col7"><div class="cancel">订单完成</div></td>
                            @else
                            <td class="col7"><div class="cancel"><a href="/cancel/{{$v->id}}">未取消</a></div></td>
                            @endif
                            @if($v->status==1)
                            <td class="col8"><div class="cancel">待发货</div></td>
                            @elseif($v->status==2)
                            <td class="col8"><div class="cancel"><a href="/status/{{$v->id}}">确认收货</a></div></td>
                            @else
                            <td class="col8"><div class="cancel">已收货</div></td>
                            @endif

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
    <div class='page'>

    </div>
</div>


</body>
</html>
