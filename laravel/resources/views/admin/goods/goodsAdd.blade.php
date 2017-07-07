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
        <form action="{{url('/goods-Add')}}" method="post" enctype='multipart/form-data'>
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <td>

                <input type="hidden" class="mg" name="addtime" value="<?php echo date('Y-m-d h:i:s',time()); ?>">
            </td>
            <tr>
                <th><i class="require">*</i>商品名称</th>
                <td>
                    <input type="text" class="mg" name="name" id="name" >
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>商品图片</th>
                <td>
                    <input type="file" name='icon' class="mg" id="icon">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>请选择分类</th>
                <td>
                    <select name="cid" >
                        @foreach($goods as $good)
                            <option value="{{$good->id}}">{{$good->name}}</option>
                            @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>价格</th>
                <td>
                    <input type="text" class="mg" name="price" id="price">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>库存</th>
                <td>
                    <input type="text" class="mg" name="store" id="store">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>已售</th>
                <td>
                    <input type="text" class="mg" name="sold" id="sold">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新品</th>
                <td>
                    是<input type="radio" class="mg" name="new" value="1">
                    否<input type="radio" class="mg" name="new" value="2"checked>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>上架</th>
                <td>
                    是<input type="radio" class="mg" name="up" value="1" checked>
                    否<input type="radio" class="mg" name="up" value="2">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>热销</th>
                <td>
                    是<input type="radio" class="mg" name="hot" value="1">
                    否<input type="radio" class="mg" name="hot" value="2" checked>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>满减</th>
                <td>
                    是<input type="radio" class="mg" name="reduction" value="1">
                    否<input type="radio" class="mg" name="reduction" value="2"checked>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>打折</th>
                <td>
                    是<input type="radio" class="mg" name="discount" value="1">
                    否<input type="radio" class="mg" name="discount" value="2" checked>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>简介</th>
                <td>
                    <input type="text" class="mg" name="desc" id="desc">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交" id="send">
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