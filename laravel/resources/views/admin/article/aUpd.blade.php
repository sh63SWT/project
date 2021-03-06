@extends('admin.app')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 添加文章
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
        <form action="{{url('admin/article/aUp')}}" method="post" enctype='multipart/form-data'>
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <input type="hidden" name="id" value="{{$articles->id}}">
                <tr>
                    <th><i class="require">*</i>标题</th>
                    <td>
                        <input type="text" required class="mg" name="headline" value="{{$articles->headline}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类</th>
                    <td>
                        <select style="width: 161px;height: 28px;" name="arid">
                            @foreach ($category as $category)
                                <option value ="{{$category->id}}" {{$category->id == $articles->arid ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>图片</th>
                    <td>
                        <img src="{{url('img')}}/{{$articles->icon}}" width="70" height="60">
                        <input id="upload" class="mg" name="icon" hidefocus="true" type="file">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>内容</th>
                    <td>
                        <input type="text" class="mg" required name="detail" value="{{$articles->detail}}">
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