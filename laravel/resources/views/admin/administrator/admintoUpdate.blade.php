@extends('admin.app')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">管理员管理</a> &raquo; <a href="#">管理员列表</a> &raquo;修改权限
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_content">
            <div class="short_wrap">
                <p><i class="fa fa-plus"></i>权限</p>
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    <div class="result_wrap">
        <form action="" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>权限：</th>
                    {{--@if (count($errors) > 0)--}}
                        {{--<span>{{$errors->first('status')}}</span>--}}
                    {{--@endif--}}
                    <td>
                        <select name="status">
                            {{--<option value="">==请选择==</option>--}}
                            @if($result_sta == 0)
                                @if($adminUp->status == 0)
                                    <option value="0" selected>超级管理员</option>
                                    <option value="1">高级管理员</option>
                                    <option value="2">普通管理员</option>
                                @elseif($adminUp->status == 1)
                                    {{--<option value="0" >超级管理员</option>--}}
                                    <option value="1" selected>高级管理员</option>
                                    <option value="2" >普通管理员</option>
                                @else
                                    {{--<option value="0" >超级管理员</option>--}}
                                    <option value="1" >高级管理员</option>
                                    <option value="2" selected>普通管理员</option>
                                @endif
                            @endif
                            @if($result_sta == 1)
                                @if($adminUp->status == 1)
                                    <option value="1" selected>高级管理员</option>
                                    <option value="2" >普通管理员</option>
                                @else
                                    {{--<option value="1" >高级管理员</option>--}}
                                    <option value="2" selected>普通管理员</option>
                                @endif
                            @endif
                            @if($result_sta == 2)
                                <option value="2" selected>普通管理员</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>管理员名：</th>
                    <td>
                        <input id = "name" type="text" class="mg" name="name" value="{{$adminUp->name}}">
                        {{--@if (count($errors) > 0)--}}
                            {{--<span>{{$errors->first('name')}}</span>--}}
                        {{--@endif--}}
                        <span id="sname" style="color:red;"></span>
                    </td>
                </tr>
                <tr>
                    <th>邮箱：</th>
                    <td>
                        <input id="email" type="text" class="mg" name="email" value="{{$adminUp->email}}">
                        {{--@if (count($errors) > 0)--}}
                            {{--<span>{{$errors->first('email')}}</span>--}}
                        {{--@endif--}}
                        <span id="semail" style="color:red;"></span>
                    </td>
                </tr>
                <tr>
                    <th>更改密码：</th>
                    <td>
                        <input id="password" type="password" class="mg" name="password" value="{{$adminUp->password}}">
                        {{--@if (count($errors) > 0)--}}
                            {{--<span>{{$errors->first('password')}}</span>--}}
                        {{--@endif--}}
                        <span id="spassword" style="color:red;"></span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
        $(function () {
            $("#email").blur(function () {
                var email = $("#email").val();
                if(email == 0){
                    $("#semail").html('*邮箱不能为空');
                    return false;
                }
                $.ajax({
                    url:'/admin/emails',
                    type:'get',
                    data:{'email':email},
                    success:function (data) {
                        if(data.status == 0)
                        {
                            $("#semail").html('*邮箱可以使用');
                        }
                        if(data.status == 1)
                        {
                            $("#semail").html('*邮箱已被使用');
                            return false;
                        }
                    },
                    error:function (xhr,status,message) {
                        eval("var errors ="+ xhr.responseText);
                        if (errors.email) {
                            $("#semail").html(errors.email[0]);
                            return false;
                        }else{
                            $("#semail").html('');
                        }
                    },
                    dataType:'json',
                });
                return false;
            })
            $("#name").blur(function () {
                var name = $("#name").val();
                if(name.length == 0){
                    $("#sname").html('*用户名不能为空');
                    return false;
                }
                if(name.length < 2){
                    $("#sname").html('*用户名不能小于2');
                    return false;
                }else{
                    $("#sname").html('');
                }
            })
            $("#password").blur(function () {
                var password = $("#password").val();
                if(password == 0){
                    $("#spassword").html('*密码不能为空');
                    return false;
                }
                if(password.length < 6){
                    $("#spassword").html('*密码不能小于6');
                    return false;
                }else{
                    $("#spassword").html('');
                }
            })
        })
    </script>
@endsection