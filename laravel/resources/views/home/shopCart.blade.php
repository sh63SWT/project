<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/home/shopCart.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/shopCartBase.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/shopCartGlobal.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/shopList.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home/more.css') }}">

    <script src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
@extends('home.head');
@include('home.head');


    {{--<script type="text/javascript" src="/js/home/shopCart/cart.js"></script>--}}
    <div class="mycart w990 mt10 bc" style=" height: 3228px; width: 1160px;">
        <h2><b>我的购物车</b></h2>
        <form>
            {{csrf_field()}}
        <table>
            <thead>
            <tr>
                <th class="col1">商品名称</th>
                <th class="col2">商品信息</th>
                <th class="col3">单价</th>
                <th class="col4">数量</th>
                <th class="col5">小计</th>
                <th class="col6">操作</th>
            </tr>
            </thead>

            <tbody>
            @foreach($cart as $v)
                <tr>
                    {{--<input type="hidden" value="{{$v->id}}">--}}
                    <td class="col1">
                        <a href="{{url('/goods')}}/{{$v->gid}}">
                            <input type="hidden" value="{{$v->name}}">
                            <input type="hidden" value="{{$v->icon}}">
                            <input type="hidden" value="{{$v->size}}">
                            <input type="hidden" value="{{$v->price}}">
                            <img src="/img/admin/{{$v->icon}}"/>
                        </a>
                        <strong> <a href="{{url('/goods')}}/{{$v->gid}}">{{$v->name}}</a>
                        </strong>
                    </td>
                    <td class="col2">{{$v->size}}</td>
                    <input type="hidden" value="{{$v->size}}">
                    <td class="col3">￥<span>{{$v->price}}</span></td>
                    <td class="col4">
                        <div class="num_buttom">
                            <dd class="count_w">

                                    <input type="hidden" id="store" value="1122">

                                <em class="br">-</em>
                                <input type="text" name="count" id='mynum' value='{{$v->count}}' class="mynum">
                                <em class="bl">+</em>
                                {{--<input type="text" id="mynuma">--}}
                            </dd>
                        </div>
                    </td>
                    <td class="col5">￥<span>{{$v->price * $v->count}}</span></td>
                    <input type="hidden" value="{{$v->id}}">
                    <td class="col6"><a href="javascript:;">删除</a></td>
                        @endforeach
                </tr>
            <script>
                    $(function () {
//                    减
                    $(".br").click(function () {
                        var store = $(this).parent().find("input").eq(0).val();
                        var danjia = parseFloat($(this).parent().parent().parent().parent().find(".col3 span").html());
                        var num = parseInt($(this).next().val());
                        var num = num - 1;
                        if (num < store) {
                            $(this).parent().find(".mynum").val(num);
                        };
                        if (num < 1) {
                            $(this).parent().find(".mynum").val(1);
                            xiaoji.html((danjia).toFixed(2));

                        };
                        var xiaoji = $(this).parent().parent().parent().parent().find(".col5 span");
                        //获取单价
                        var danjia = parseFloat($(this).parent().parent().parent().parent().find(".col3 span").html());
                        //计算小计
                        xiaoji.html((danjia * num).toFixed(2));
                        //声明一个总价
                        var total = 0;
                        //得到所有的小计
                        $(".col5 span").each(function () {
                            total += parseFloat($(this).html());
                        });
                        //写到html标签
                        $("#total").html(total.toFixed(2));

                    });
//                    加
                    $(".bl").click(function () {
                        var num = parseInt($(this).prev().val());
                        var store = $(this).parent().find("input").eq(0).val();
                        var num = num + 1;
                        if (num >= store) {
                            $(this).parent().find(".mynum").val(store);
                        };
                        if (num < store) {
                            $(this).parent().find(".mynum").val(num);
                        }
                        //获取小计的标签
                        var xiaoji = $(this).parent().parent().parent().parent().find(".col5 span");
                        //获取单价
                        var danjia = parseFloat($(this).parent().parent().parent().parent().find(".col3 span").html());
                        //计算小计
                        xiaoji.html((danjia * num).toFixed(2));
                        //声明一个总价
                        var total = 0;
                        //得到所有的小计
                        $(".col5 span").each(function () {
                            total += parseFloat($(this).html());
                        });
                        //写到html标签
                        $("#total").html(total.toFixed(2));
                    });
                    //声明一个总价
                    var total = 0;
                    $(".col5 span").each(function () {
                        total += parseFloat($(this).html());
                    });
                    // 总价
                    $("#total").html(total);
                    //  删除
                    $(".col6 a").click(function () {
                        var id = $(this).parent().prev().val();
                        $.ajax({
                            url: "/delcart/",
                            type: "get",
                            data:{id:id},
                            success: function (respone, status, xhr) {
                                alert("商品删除成功");
                                window.location.href = "";
                            },
                            error: function (message) {
                                console.log(message);
                            }
                        });
                    });
                });


            </script>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">购物金额总计： <strong>￥ <span id="total"> </span></strong></td>
            </tr>
            </tfoot>
            <input type="hidden" id="total">
        </table>
        <div class="cart_btn w990 bc mt10">
            <a href="/" class="continue" style="background-color: black">继续购物</a>
            <br/>
            <br/>

            <a href="/shop/order" id="button">结 算</a>


            {{--<script>--}}
                {{--$(function(){--}}
                    {{--$("#button").click(function (){--}}
                        {{--var count = $("#total").html();--}}
                        {{--$.ajax({--}}
                            {{--url:"/order",--}}
                            {{--type:"post",--}}
                            {{--data:{"_token":"{{csrf_token()}}","count":count},--}}
                            {{--success:function(data){--}}
                                {{--console.log(data);--}}
{{--//                                    window.location.href="付款完成路由";--}}
                            {{--},--}}
                            {{--error:function (message) {--}}
                                {{--console.log(message);--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                {{--});--}}
            {{--</script>--}}
            {{--<a href="" class="checkout" >结 算</a>--}}
        </div></form>
    </div>
</body>
</html>
