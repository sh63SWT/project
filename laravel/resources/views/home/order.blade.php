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
    <link rel="stylesheet" href="{{ URL::asset('css/home/order.css') }}">
    <script src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
@extends('home.head');
@include('home.head');
 {{--<script type="text/javascript" src="/js/home/shopCart/cart.js"></script>--}}
    <div class="mycart w990 mt10 bc" style=" height: 3228px; width: 1160px;">
        <h2><b>我的订单</b></h2>
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
            @foreach($order as $v)
                <tr>
                    {{--<input type="hidden" value="{{$v->id}}">--}}
                    <td class="col1">
                        <a href="{{url('/goods')}}/{{$v->gid}}">
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
                                {{--<input type="hidden" id="store" value="{{$v->store}}">--}}
                                <a>{{$v->count}}</a>
                            </dd>
                        </div>
                    </td>
                    <td class="col5">￥<span>{{$v->price * $v->count}}</span></td>
                    <input type="hidden" value="{{$v->id}}">
                    <td class="col6"><a href="javascript:;">删除</a></td>
                </tr>
                {{--{{$count += $v->price * $v->count}}--}}
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" id="col6">购物金额总计￥ <strong><span id="total"></span></strong></td>
                <script>
                    var total = 0;
                    $(".col5").find("span").each(function () {
                        total += parseFloat($(this).html());
                    });
                    //                    console.log(total);
                    // 总价;
                    $("#total").html(total);
                </script>
            </tr>
            </tfoot>

        </table>

        <form >
            {{--{{csrf_field()}}--}}
            <div class="order_user">
                <table cellspacing="0" class="order_user_table">
                    <caption><h2>收货人信息</h2></caption>
                    <input type="hidden" id="total" value="">
                    <tr>
                        <th>收货人姓名:</th>
                        <td><input type="text" name='receiver' value='' placeholder="请输入正确姓名" id="receiver">(必填)</td>
                    </tr>
                    <tr>
                        <th>联系电话:</th>
                        <td><input type="text" name='phone' value=''placeholder="请输入11位电话号码"id="phone" >(必填)</td>
                    </tr>
                    <tr>
                        <th>详细地址:</th>
                        <td><input type="text" name='address' value=''placeholder="请输入详细地址，以便收货" id="address">(必填)</td>
                    </tr>
                </table>

                <div class="user_payway">

                </div>
                <div class="btnnnn">
                    <a href="/" class="continue">继续购物</a>
                    {{--<button value="提交订单" class="butt"/>--}}
                    {{--<button class="butt" value="提交订单"></button>--}}
                    <input type="button" value="提交订单" class="butt" id="button">

                    <script>
                        $(function(){
                            $("#button").click(function (){
                                var total = $("#total").html();
                                var receiver =$("#receiver").val();
                                var phone =$('#phone').val();
                                var address =$('#address').val();

                                $.ajax({
                                    url:"/orders",
                                    type:"post",
                                    data:{"_token":"{{csrf_token()}}","count":total,"receiver":receiver,"phone":phone,"address":address},
                                    success:function(data){
                                        console.log(data);
                                        window.location.href="/end";
                                    },
                                    error:function (message) {
                                        alert(message);
                                    }
                                });
                            });
                        });


                    </script>
                    <script type="text/javascript">
                        $(function(){

//                //如果是必填的，则加红星标识.
//                $("form :input.required").each(function(){
//                    var $required = $("<strong class='high'> *</strong>"); //创建元素
//                    $(this).parent().append($required); //然后将它追加到文档中
//                });
                            //文本框失去焦点后
                            $('form :input').blur(function(){
                                var $parent = $(this).parent();
                                $parent.find(".formtips").remove();
                                //验证用户名
                                if( $(this).is('#name') ){
                                    if( this.value=="" || this.value.length < 3 ){
                                        var errorMsg = '请至少3位的用户名';
                                        $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                                    }else{
                                        var okMsg = '输入正确.';
                                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                                    }
                                }
                                if( $(this).is('#phone') ){
                                    if( this.value=="" || this.length < 11 ){
                                        var errorMsg = '请输入11位手机号码';
                                        $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                                    }else{
                                        var okMsg = '输入正确.';
                                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                                    }
                                }
                                if( $(this).is('#address') ){
                                    if( this.value=="" || this.length < 10 ){
                                        var errorMsg = '请输入地址';
                                        $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                                    }else{
                                        var okMsg = '输入正确.';
                                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                                    }
                                }

                            }).keyup(function(){
                                $(this).triggerHandler("blur");
                            }).focus(function(){
                                $(this).triggerHandler("blur");
                            });//end blur


                            //提交，最终验证。
                            $('#button').click(function(){
                                $("form :input.required").trigger('blur');
                                var numError = $('form .onError').length;
                                if(numError){
                                    return false;
                                }
                                alert("成功.");
                            });

                            //重置
                            $('#res').click(function(){
                                $(".formtips").remove();
                            });
                        })
                        //]]>
                    </script>
                </div>

            </div>
        </form>
    </div>
</body>
</html>
