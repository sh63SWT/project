@extends('admin.app')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章分类管理</a> &raquo; 修改文章分类
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章分类</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/article/aUpdate')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <input type="hidden" name="id" value="{{$articles->id}}">
                    <tr>
                        <th><i class="require">*</i>分类名称</th>
                        <td>
                            <input type="text" required class="mg" name="name" value="{{$articles->name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>pid</th>
                        <td>
                            <input type="text" readonly class="mg" name="pid" value="{{$articles->pid}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>path</th>
                        <td>
                            <input type="text" readonly class="mg" name="path" value="{{$articles->path}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>display</th>
                        <td>
                            {{--<input type="text" readonly class="mg" name="path" value="{{$articles->path}}">--}}
                            <label><input name="display" type="radio" value="1" {{$articles->display == 1 ? 'checked' : '' }}/>显示 </label>
                            <label><input name="display" type="radio" value="2" {{$articles->display == 2 ? 'checked' : '' }} />隐藏 </label>
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