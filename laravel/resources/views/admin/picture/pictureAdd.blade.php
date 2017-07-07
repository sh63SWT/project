@extends('admin.app')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">图片管理</a> &raquo; 添加图片
    </div>

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增图片</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>


    <div class="result_wrap">
        <form action="{{url('admin/picture/pictureFormAdd')}}" method="post" enctype='multipart/form-data'>
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>专辑名</th>
                    <td>
                        <select style="width: 163px;height: 33px;" name="aid">
                            @foreach ($album as $album)
                                <option value ="{{$album->id}}">{{$album->album}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>标签</th>
                    <td>
                        <select style="width:163px;height: 33px;" name="label">
                            @foreach ($category as $category)
                                <option value ="{{$category->categoryName}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>用户ID</th>
                    <td>
                        <input type="text" required class="mg" name="uid">
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>图片</th>
                    <td>
                        <input type="file" required name="img">
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>图片描述</th>
                    <td>
                        <textarea name="describe" required class="mg" style="width: 261px;height: 138px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection