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
                            <th class="col1">取消订单</th>
                        </tr>
                        </thead>
                        <form action="/statuss" method="post">
                            {{csrf_field()}}
                            <tbody>
                            @foreach($a as $v)
                                <tr>
                                    <td class="col1" >
                                        <input type="hidden" name="id" value="{{$v->id}}">
                                        @if($v->status ==2)
                                            确认收货<input type="radio" class="mg" name="status" value="3">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <td>
                                <input type="submit" value="确认修改">
                            </td>
                            </tbody>
                        </form>
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
