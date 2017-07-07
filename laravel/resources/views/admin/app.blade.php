<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/admin/ch-ui.admin.css">
    <link rel="stylesheet" href="/css/admin/font/css/font-awesome.min.css">
    <script type="text/javascript" src="/js/public/jquery.js"></script>
    <script type="text/javascript" src="/js/admin/ch-ui.admin.js"></script>
    <link rel="stylesheet" href="/css/public/bootstrap.css">
    @yield('my-css')
</head>
<body>
<!--头部 开始-->
<div class="top_box">
    <div class="top_left">
        <div class="logo">后台管理</div>
        <ul>
            <li><a href="/admin/index" class="active">首页</a></li>
            {{--<li><a href="#">管理页</a></li>--}}
        </ul>
    </div>
    <div class="top_right">
        <ul>
            <li>管理员：{{Auth::guard('admin')->user()->name}}</li>
            {{-- <li>管理员：{{ Session::get('admin') }}</li>--}}
            {{--<li><a href="/admin/pass" target="main">修改密码</a></li>--}}
            <li><a href="/admin/logout">退出</a></li>
        </ul>
    </div>
</div>
<!--头部 结束-->
<!--左侧导航 开始-->
<div class="menu_box">
    <ul>

        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>商品管理</h3>
            <ul class="sub_menu">
                <li><a href="/goods-list"><i class="fa fa-fw fa-list-ul"></i>商品列表管理</a></li>
                <li><a href="/goodsAdd"><i class="fa fa-fw fa-list-alt"></i>添加商品管理</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>分类管理</h3>
            <ul class="sub_menu">
                <li><a href="/category-list"><i class="fa fa-fw fa-list-ul"></i>分类列表管理</a></li>
                <li><a href="/category-Add"><i class="fa fa-fw fa-list-alt"></i>添加分类名管理</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>轮播管理</h3>
            <ul class="sub_menu">
                <li><a href="/slideshow-list"><i class="fa fa-fw fa-list-ul"></i>轮播列表管理</a></li>
                <li><a href="/slideshow-Add"><i class="fa fa-fw fa-list-alt"></i>添加轮播管理</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>友情链接管理</h3>
            <ul class="sub_menu">
                <li><a href="/url-list"><i class="fa fa-fw fa-list-ul"></i>友情链接列表管理</a></li>
                <li><a href="/url-Add"><i class="fa fa-fw fa-list-alt"></i>添加友情链接管理</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>订单管理</h3>
            <ul class="sub_menu">
                <li><a href="/order_list"><i class="fa fa-fw fa-list-ul"></i>订单列表管理</a></li>
                <li><a href="/cancel_list"><i class="fa fa-fw fa-list-alt"></i>已取消订单</a></li>
                <li><a href="/status_list"><i class="fa fa-fw fa-list-alt"></i>未处理订单</a></li>
                <li><a href="/status1_list"><i class="fa fa-fw fa-list-alt"></i>已发货订单</a></li>

            </ul>
        </li>

        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>标签管理</h3>
            <ul class="sub_menu">
                <li><a href="{{url('/label/index')}}"><i class="fa fa-fw fa-list-ul"></i>标签列表</a></li>
                <li><a href="{{url('/labelAdd')}}"><i class="fa fa-fw fa-list-ul"></i>添加标签</a></li>
            </ul>
        </li>


        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>管理员管理</h3>
            <ul class="sub_menu">
                <li><a href="/admin-list"><i class="fa fa-fw fa-list-ul"></i>管理员列表</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>用户管理</h3>
            <ul class="sub_menu">
                <li><a href="/user-list"><i class="fa fa-fw fa-list-ul"></i>用户列表</a></li>
                <li><a href="/answer-list"><i class="fa fa-fw fa-list-ul"></i>密码提问</a></li>
            </ul>
        </li>
        {{--<li>--}}
            {{--<h3><i class="fa fa-fw fa-clipboard"></i>权限管理</h3>--}}
            {{--<ul class="sub_menu">--}}
                {{--<li><a href="/permission-list"><i class="fa fa-fw fa-list-ul"></i>权限列表管理</a></li>--}}
                {{--<li><a href="/permission-Add"><i class="fa fa-fw fa-list-alt"></i>添加权限管理</a></li>--}}
                {{--<li><a href="/permission-Update"><i class="fa fa-fw fa-plus-square"></i>修改权限管理</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<h3><i class="fa fa-fw fa-clipboard"></i>商品管理</h3>--}}
            {{--<ul class="sub_menu">--}}
                {{--<li><a href="/role-list"><i class="fa fa-fw fa-list-ul"></i>商品列表管理</a></li>--}}
                {{--<li><a href="/role-Add"><i class="fa fa-fw fa-list-alt"></i>添加商品管理</a></li>--}}
                {{--<li><a href="/role-Update"><i class="fa fa-fw fa-plus-square"></i>修改商品管理</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>普通图片评论管理</h3>
            <ul class="sub_menu">
                <li><a href="{{url('admin/blog/index')}}"><i class="fa fa-fw fa-list-ul"></i>评论管理</a></li>
                <li><a href="{{url('admin/blog/revert')}}"><i class="fa fa-fw fa-list-ul"></i>回复管理</a></li>
                <li><a href="{{url('admin/blog/blogAdd')}}"><i class="fa fa-fw fa-list-ul"></i>评论</a></li>
            </ul>
        </li>


        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>专辑管理</h3>
            <ul class="sub_menu">
                <li><a href="{{url('admin/personal/index')}}"><i class="fa fa-fw fa-list-ul"></i>专辑列表</a></li>
                <li><a href="{{url('admin/personal/personalAdd')}}"><i class="fa fa-fw fa-list-ul"></i>添加专辑</a></li>
            </ul>
        </li>

        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>图片管理</h3>
            <ul class="sub_menu">
                <li><a href="{{url('admin/picture/pictureIndex')}}"><i class="fa fa-fw fa-list-ul"></i>图片列表</a></li>
                <li><a href="{{url('admin/picture/pictureAdd')}}"><i class="fa fa-fw fa-list-ul"></i>添加图片</a></li>
            </ul>
        </li>

        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>文章管理</h3>
            <ul class="sub_menu">
                <li><a href="{{url('admin/article/index')}}"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                <li><a href="{{url('admin/article/articleAdd')}}"><i class="fa fa-fw fa-list-ul"></i>添加分类</a></li>
                <li><a href="{{url('admin/article/articleList')}}"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--左侧导航 结束-->
<!--主体部分 开始-->
<div class="main_box">
   @yield('content')
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
    CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
</div>
<!--底部 结束-->
@yield('my-js')
</body>
</html>