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
        <form action="{{url('/c_Add')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>分类名称</th>
                    <td>
                        <input type="text" class="mg" name="name">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>父类id</th>
                    <td>
                        <input type="text" class="mg" name="pid" value="{{$categorys->id}}" readonly>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>path</th>
                    <td>
                        <input type="text" class="mg" name="path" value="{{$categorys->path}}{{$categorys->id}},"readonly>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>display</th>
                    <td>
                        <label><input name="display" type="radio" value="1" />显示 </label>
                        <label><input name="display" type="radio" value="2" CHECKED/>隐藏 </label>
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
        <script type="text/javascript">
            $(function(){

//                //如果是必填的，则加红星标识.
//                $("form :input.required").each(function(){
//                    var $required = $("<strong class='high'> *</strong>"); //创建元素
//                    $(this).parent().append($required); //然后将它追加到文档中
//                });
                //文本框失去焦点后
                $('form :input').blur(function(){
                    var $parent = $(this).parent();
                    $parent.find(".formtips").remove();
                    //验证用户名
                    if( $(this).is('#name') ){
                        if( this.value=="" || this.value.length < 6 ){
                            var errorMsg = '请输入至少6位的用户名';
                            $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                        }else{
                            var okMsg = '输入正确.';
                            $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                        }
                    }
                    if( $(this).is('#price') ){
                        if( this.value=="" || this.value < 0 ){
                            var errorMsg = '请输入价格为大于零';
                            $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                        }else{
                            var okMsg = '输入正确.';
                            $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                        }
                    }
                    if( $(this).is('#store') ){
                        if( this.value=="" || this.value < 0 ){
                            var errorMsg = '请输入库存为大于零';
                            $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                        }else{
                            var okMsg = '输入正确.';
                            $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                        }
                    }
                    if( $(this).is('#sold') ){
                        if( this.value=="" || this.value < 0 ){
                            var errorMsg = '请输入已售为大于零';
                            $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                        }else{
                            var okMsg = '输入正确.';
                            $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                        }
                    }
                    if( $(this).is('#desc') ){
                        if( this.value=="" || this.value.length < 6 ){
                            var errorMsg = '请输入至少6位的简介';
                            $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                        }else{
                            var okMsg = '输入正确.';
                            $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                        }
                    }
                }).keyup(function(){
                    $(this).triggerHandler("blur");
                }).focus(function(){
                    $(this).triggerHandler("blur");
                });//end blur


                //提交，最终验证。
                $('#send').click(function(){
                    $("form :input.required").trigger('blur');
                    var numError = $('form .onError').length;
                    if(numError){
                        return false;
                    }
                    alert("添加成功!");
                });

            })
            //]]>
        </script>
    </div>
@endsection