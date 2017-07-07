<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/end.css') }}">
</head>
<body>
<div class="end_all clear">
    <div class="end_box clear">
        <div class="end_body clear">
            <div class="end_img">
                <img src="{{ URL::asset('img/home/chenggong.jpg') }}">
            </div>
            <div class="end_font">
                <a>订单提交成功，请等待审核结果</a>
            </div>
            <div class="end_font_small">
                <a>我们将会尽快审核您的订单，请耐心等待</a></br></br>
                <a href=""></a>
                <a href="{{url('/information')}}"> <span> 查看订单</span></a>
                <a href="/"> <span> 回到首页</span></a>

            </div>
        </div>
    </div>
</div>
</body>
</html>
