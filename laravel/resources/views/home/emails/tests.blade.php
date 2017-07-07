<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="wb:webmaster" content="973d669418f79e8b">
    <title>生活家</title>
    <meta name="description" content="ddd">
    <link href="http://www.duitang.com/favicon.ico" rel="SHORTCUT ICON">
    <link rel="stylesheet" href="{{ URL::asset('css/home/lib.f0824a12.css') }}">
    <style type="text/css">
        /*改状态*/
        /*.pg-cnt-2{
        display: block;
        }
        .pg-cnt-1{
        display: none;
        }*/
        /*原来的*/
        .pg-cnt-2{
            display: none;
        }
        /*改状态end*/
        html,body,#content{height: 100%;overflow: hidden;}
        #content{
            width:100%;
            background:#fff;
            padding-bottom: 0;
        }
        .pg-header{
            width:100%;
            height:0;
            padding-bottom: 11.285%;
            background: url(https://b-ssl.duitang.com/uploads/people/201608/21/20160821224921_jsWvE.png) no-repeat;
            background-size: 100% 100%;
        }
        .pg-catnav-mask {
            background:#000;
            opacity:0.3;
            filter: alpha(opacity=30);
            -moz-opacity: 0.3;
            height: 350px;
            width: 100%;
            position: absolute;
            top: 0;
        }
        .pg-header-b-inner{
            width: 1169px;
            margin:0 auto;
            height: 345px;
            position:relative;
        }
        .pg-title{
            height: 40px;
            color: #fff;
            margin-top:20px;
        }
        .pg-desc,.pg-desc1{
            font-size: 15px;
            color: #fff;
            width:777px;
        }
        .pg-desc1{
            margin-top:16px;
        }
        .pg-cnt{
            position: relative;
            top: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            width: 100%;
        }
        .pg-banner{
            position: absolute;
            left: 327px;
            top: 85px;
        }
        .pg-banner-item{
            font-size:16px;
        }
        .pg-banner-item.on{
            color: rgba(253,130,132,1);
        }
        .pg-banner-item.on .pg-circle{
            background: rgba(253,130,132,1);
        }
        .pg-banner-item.off{
            color: #999;
        }
        .pg-banner-item.off .pg-circle{
            background: #fff;
            color: #999;
            line-height: 32px;
            width: 32px;
            height: 32px;
            border: 2px solid #999;
        }
        .pg-op{
            width: 100%;
            height: 60%;
        }
        .pg-op-in{
            width: 440px;
            height: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .pg-op .pg-op-title{
            color:#333;
            font-size: 24px;
            text-align: center;
            margin-bottom:16px;
        }
        .pg-op p{
            font-size: 14px;
            color: #999;
            margin-bottom:41px;
            text-align: center;
        }
        .pg-gender{
            width: 330px;
            margin: 0 auto;
        }
        .pg-gender-item{
            width:165px;
            float: left;
            height: 43px;
            line-height: 43px;
        }
        .pg-gender img{
            width: 38px;
            height: 38px;
            margin-top:3px;
        }
        .pg-gender-i{
            height: 43px;
            line-height: 43px;
        }
        .pg-gender-item .pg-gender-icon{
            width: 42px;
            height: 42px;
            margin: 2px 0 0 22px;
            cursor: pointer;
        }
        .pg-gender-item1 .pg-gender-icon{
            background:url('https://b-ssl.duitang.com/uploads/people/201604/21/20160421175053_HiCJr.png');
        }
        .pg-gender-item1 .pg-gender-icon.on{
            background:url('https://b-ssl.duitang.com/uploads/people/201604/21/20160421175226_rsCcZ.png');
        }
        .pg-gender-item2 .pg-gender-icon{
            background:url('https://b-ssl.duitang.com/uploads/people/201604/21/20160421175133_SEhQK.png');
        }
        .pg-gender-item2 .pg-gender-icon.on{
            background:url('https://b-ssl.duitang.com/uploads/people/201604/21/20160421175325_BEeRX.png');
        }
        .pg-gender-item .pg-gender-val{
            font-size:16px;
            color:#999;
            cursor: pointer;
        }
        .pg-t-1{
            width:456px;
            margin-left:54px;
            height:42px;
            margin-bottom: 8px;
        }
        .pg-t-1 input{
            width:298px;
            height:22px;
            padding:10px 16px;
            border:1px solid #ebebeb;
            color:#666;
        }
        .pg-token{
            width:110px;
            height:42px;
            line-height:42px;
            text-align:center;
            background:#65d19b;
            font-size: 15px;
            color:#ffffff;
            border-radius:4px;
            cursor:pointer;
        }
        .pg-t-2{
            width:330px;
            height:42px;
            margin: 0 auto 8px;
        }
        .pg-t-2 input{
            width:298px;
            height:22px;
            padding:10px 16px;
            border:1px solid #ebebeb;
            color:#666;
        }
        .pg-cnt1-error,.pg-cnt2-error{
            color:#fc8383;
            font-size:15px;
            text-align:center;
            width:330px;
            margin:24px auto 0;
            height:20px;
        }
        .pg-next,.pg-finish{
            width: 330px;
            height: 48px;
            text-align: center;
            line-height:48px;
            background-color:#fc8383;
            font-size:16px;
            color:#fff;
            margin:0 auto;
            border-radius:100px;
            cursor:pointer;
        }
        .pg-next:hover,.pg-finish:hover{
            background-color:#FA9697;
        }
        #triangle-right {
            position:absolute;
            width: 0;
            height: 0;
            left: 584.5px;
            border-top: 24px solid transparent;
            border-left: 24px solid #fc8383;
            border-bottom: 24px solid transparent;
        }
        #triangle-right.on {
            border-left: 24px solid #ebebeb;
        }
        .pg-sidebar {width: 279px;padding: 86px 26px 0 27px;
            background-image: url(https://b-ssl.duitang.com/uploads/people/201605/04/20160504182557_VAdCx.png);
            background-size: cover;
            background-position: center;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;height: 100%;}
        .pg-sidebar p {width: 100%;}
        .pg-step-txt {
            display: inline-block;
            line-height: 36px;
            vertical-align: top;
        }
        .pg-circle {width: 36px;height: 36px;border-radius: 50%;background: rgba(253,130,132,0.80);display: inline-block;color:#fff;text-align: center;line-height: 36px;}
        .pg-cnt{height: 100%;}
    </style>
</head>
<body>
<div id="content">
    {{--<div style="position: relative;text-align: center;">--}}
        {{--<div class="pg-header">--}}
        {{--</div>--}}
        {{--<img style="position: absolute;top: 40.09%;height: 19.815%;margin-left: -6.6%;" class="pg-logo" src="">--}}
    {{--</div>--}}
    <div style="margin-top: 30px;width: 100%;height: 3px;background: #aaaaaa;"></div>
    <div class="pg-cnt pg-cnt-1">
        <div class="pg-op" style="position: relative;">
            <div class="pg-op-in">
                <h3 class="pg-op-title">邮箱验证</h3>
                <p>为保证发布内容的的真实性以及您的账户安全，您需要进行邮箱绑定</p>
                <div class="pg-t-1 pg-telephone">
                    <input placeholder="邮箱" id="email" name="email">
                    <div href="javascript:;" class="pg-token r">
                        <span class="pg-token-time"></span><span class="pg-token-text">获取验证码</span>
                    </div>
                </div>
                <div class="pg-t-2 pg-ccode">
                    <input placeholder="验证码" id="code" name="code">
                </div>
                <div class="pg-cnt1-error"></div>
                {{--@if (count($errors) > 0)--}}
                    {{--<p>{{$errors->first('email')}}</p>--}}
                {{--@endif--}}
            </div>
        </div>
        <div class="pg-next">完成</div>
    </div>
</div>

<div id="win-house" class="h0">
</div>
<div id="foot-forms" class="dn">
</div>
<script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
<script>
    $(function (){
        $(".pg-token").click(function (){
            var email = $('#email').val();

            $.ajax({
                url: '/home/emails/verify',
                dataType: 'json',
                type: 'get',
//                date：data,
                data: {'email': email},
                success:function(data,status){
                    if(data.status == 0)
                    {
                        $(".pg-cnt1-error").html(data.msg);
                    }
                    if(data.status == 1)
                    {
                        $(".pg-cnt1-error").html(data.msg);
                    }
                },
                error:function (xhr,status,message) {
                    eval("var errors ="+ xhr.responseText);
                    if (errors.email) {
                        $(".pg-cnt1-error").html(errors.email[0]);
                        return false;
                    }else{
                        $(".pg-cnt1-error").html('');
                    }
                },
            })
        })
    });
</script>
<script>
    $(function () {
        $(".pg-next").click(function () {
            var email = $('#email').val();
            var code = $('#code').val();

            $.ajax({
                url: '/home/emails/codelog',
                dataType: 'json',
                type: 'get',
                data: {
                    'email': email,
                    'code': code,
                },
                success:function(data,status){
                    if(data.status == 0)
                    {
                        window.location.href = "/home/article/index";
                    }
                },
                error:function (xhr,status,message) {
                    eval("var errors ="+ xhr.responseText);
                    if (errors.email) {
                        $(".pg-cnt1-error").html(errors.email[0]);
                        return false;
                    }else{
                        $(".pg-cnt1-error").html('');
                    }
                    if (errors.code) {
                        $(".pg-cnt1-error").html(errors.code[0]);
                        return false;
                    }else{
                        $(".pg-cnt1-error").html('');
                    }
                },
            })
        })
    })
</script>

</body>
</html>