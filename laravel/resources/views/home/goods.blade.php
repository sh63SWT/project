<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/home/more.css') }}">
    <script src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
@extends('home.head');
@include('home.head');
<div class="more_all clear">
    <div class="more_box clear">
        <div class="more_body">
            <div class="more_nav">
                {{--<h4>当前位置：<a href="index.php">首页</a></h4>--}}
            </div>
            <div class="more_mian">
                <!-- 大图 -->
                <form>
                @foreach($goodsdeil as $goodd)
                    <div class="more_mian_img">
                    <img src="{{URL::asset('img/admin/')}}/{{$goodd->icon}}" height="550px">
                <!-- 小图 -->
                        <input type="hidden" id="icon" value="{{$goodd->icon}}">
                    <div></div>
                    <div>
                        <div class="more_mian_simg">
                            <img src="{{URL::asset('img/admin/')}}/{{$goodd->icon}}" width="100px">
                        </div>
                    </div>
                </div>
                <div class="more_mian_right">
                    <div class="more_mian_right_font1"><a>{{$goodd->name}}</a></div>
                    <input type="hidden" id="name" value="{{$goodd->name}}" >
                    <div class="more_mian_right_font2"><a>{{$goodd->desc}}</a></div>
                    <div class="more_mian_right_pic" style="background: url('/img/home/price2.jpg')">
                        <a ><b>价格：￥{{$goodd->price}}</b></a>
                        <input type="hidden" id="price" value="{{$goodd->price}}">
                    </div>

                    <div class="more_mian_right_font3">
                        <div class="more_mian_right_font4"><a>尺码</a>
                        <div class="more_main_address">
                        <select id="size">
                            <option selected value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                        </select>
                            <input type="hidden" name="size" id="size" value="S">
                        </div>
                        </div>

                        <div class="zui_r_pic1"></div>
                    </div>
                    {{--数量--}}
                    <div class="more_num">
                            <div class="more_num_font">数量</div>
                            <div class="num_buttom">
                                <input type="hidden" name="store"value="{{$goodd->store}}" id="store">
                                <input type="hidden" name="price"value="{{$goodd->price}}" id="price">
                                <input type="hidden" name="gid"value="{{$goodd->id}}" id="gid">
                                <input type="hidden" name="desc"value="{{$goodd->desc}}" id="desc">
                                <input type="hidden" name="name"value="{{$goodd->name}}" id="name">
                                <input type="hidden" name="icon"value="{{$goodd->icon}}" id="icon">
                                <dd class="count_w">
                                    <em title="减少数量" id="count_add" value='jian' class="br">-</em>
                                    <input type="text" name="count" id='mynum' value='1' >
                                    <em title="增加数量" id="count_sub" value='jia' class="bl">+</em>
                                </dd>
                                <script>
                                    $(function () {
//                                        加
                                        $("#count_sub").click(function (){
                                            var count = parseInt($("#mynum").val());
                                            var store = parseInt($("#store").val());
                                            var count = count + 1;
//                                            console.log(count);
                                            if(count > store){
                                                $("#mynum").val(store);
                                            };
                                            if(count <= store){
                                                $("#mynum").val(count);
//                                                console.log(count);
                                            };
                                        });
//                                        减
                                        $("#count_add").click(function (){
                                            var count = parseInt($("#mynum").val());
                                            var store = parseInt($("#store").val());
                                            var count = count - 1;
                                           if(count < 1){
                                               $("#mynum").val(1);
                                           };
                                           if(count > 0){
                                               $("#mynum").val(count);
                                           };
                                        });
                                    })
                                </script>
                            </div>
                            <div class="more_stock">
                                库存:{{$goodd->store}}件
                            </div>
                            <input type="hidden" id="gid" value="{{$goodd->id}}">
                            <div class="more_buttom">
                                <div class="more_buttom_car">
                                    <input type="button" value="" id="sub">
                                </div>
                                <script>
                                    $(function (){
                                        $("#sub").click(function (){
                                            var gid = $("#gid").val();
                                            var count = parseInt($("#mynum").val());
                                            var icon = $("#icon").val();
                                            var name = $("#name").val();
                                            var price = $("#price").val();
                                            var size = $("#size").val();
                                            $.ajax({
                                                url:"/addcar",
                                                type:"get",
                                                data:{gid:gid,count:count,icon:icon,name:name,price:price,size:size},
                                                success:function (data){
                                                    console.log(data);
                                                    window.location.href="/addcar/c";
                                                },
                                                error:function (status){
                                                    console.log(status);
                                                },
                                            })
                                        })
                                    })
                                </script>
                            </div>

                        <div class="more_details">
                            <div class="goods_sweetness">
                                <div class="sweetness"><a>承诺</a></div>
                                <div class="sweetness_pic">7天无理由退货<img src="">
                                </div>
                            </div>
                            <div class="goods_num">
                                <div class="goods_num_font">商品编号</div>
                                <div class="num_font">{{$goodd->id}}</div>
                            </div>
                            <div class="more_place">
                                <div class="place">产地</div>
                                <div class="more_china">中国</div>
                            </div>
                        </div>
                    </div>
            </div>
                </form>

                </div>
                @endforeach

            </div>
            <div class="more_image">
                <ul>
                    <li>11</li>
                    <li>22</li>
                    <li>33</li>
                    <li>44</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>

