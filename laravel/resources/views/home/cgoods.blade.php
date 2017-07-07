
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品分类</title>
    <link rel="stylesheet" href="{{ URL::asset('css/home/1.css') }}">

</head>
<body>
@extends('home.head');
@include('home.head');
<div class="goods_all">
    <div class="goods_box">
        <div class="body">
            <div class="main clear">


                    <div class="goods">
                        <div class="goods_list">
                            <ul class='clear'>
                                @foreach($g as $good)
                                    <li class='list'>
                                        <a href="/goods/{{$good->id}}" ><img src="{{URL::asset('img/admin/')}}/{{$good->icon}}" width='235' height="226px"></a>
                                        <div class="more">
                                            <p class='name'><a href="">{{$good->name}}</a></p>
                                            <p class='price'><b>￥{{$good->price}}</b></p>
                                            <p class="sold">已售件{{$good->sold}}件</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>