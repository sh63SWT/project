@extends('admin.app')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">权限管理</a> &raquo; 添加权限
    </div>

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>


    <div class="result_wrap">
        <form action="{{url('admin/blog/blogUpd')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="id" value="{{$blogup->id}}">
                <tr>
                    <th><i class="require">*</i>uid</th>
                    <td>
                        <input type="text" class="mg" required name="uid" value="{{$blogup->uid}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>PID</th>
                    <td>
                        <input type="text" class="mg" required name="pid" value="{{$blogup->pid}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>replay</th>
                    <td>
                        {{--<input type="text" class="mg" name="describe" value="{{$album->describe}}">--}}
                        <textarea name="replay" class="mg" required style="width: 261px;height: 138px;">{{$blogup->replay}}</textarea>
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

@endsection