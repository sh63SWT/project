<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生活家</title>
    <link rel="stylesheet" href="{{ URL('css/home/lib.f0824a12.css') }}">
    <link rel="stylesheet" href="{{ URL('css/home/layout.877ca1bb.css') }}">

    <style id="mceDefaultStyles" type="text/css">
        .mce-content-body div.mce-resizehandle {position: absolute;border: 1px solid black;box-sizing: box-sizing;background: #FFF;width: 7px;height: 7px;z-index: 10000}
        .mce-content-body .mce-resizehandle:hover {background: #000}
        .mce-content-body img[data-mce-selected],.mce-content-body hr[data-mce-selected] {outline: 1px solid black;resize: none}
        .mce-content-body .mce-clonedresizable {position: absolute;outline: 1px dashed black;opacity: .5;filter: alpha(opacity=50);z-index: 10000}
        .mce-content-body .mce-resize-helper {background: #555;background: rgba(0,0,0,0.75);border-radius: 3px;border: 1px;color: white;display: none;font-family: sans-serif;font-size: 12px;white-space: nowrap;line-height: 14px;margin: 5px 10px;padding: 5px;position: absolute;z-index: 10001}
        .mce-visual-caret {position: absolute;background-color: black;background-color: currentcolor;}
        .mce-visual-caret-hidden {display: none;}*[data-mce-caret] {position: absolute;left: -1000px;right: auto;top: 0;margin: 0;padding: 0;}
        .mce-content-body .mce-offscreen-selection {position: absolute;left: -9999999999px;}
        .mce-content-body *[contentEditable=false] {cursor: default;}
        .mce-content-body *[contentEditable=true] {cursor: text;}
    </style>
    <style type="text/css">
        @charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}
        .ng-animate-shim{visibility:hidden;}
        .ng-anchor{position:absolute;}
    </style>
    <script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
    <script>
        $(function () {
            $(".save").click(function () {
                $(".publist-box").show();
            })
        })
    </script>
</head>



<body>
<div class="container ng-scope" ng-view="">
    <div class="article ng-scope">
        <form action="{{url('home/article/createArticle')}}" method="post" enctype='multipart/form-data'>
            <div class="article-nav">
                <a class="logo" href="#/"></a>
                <div class="nav-btns">
                    <div class="opt-btns">
                        <button class="a-btn ng-binding ng-scope" onclick="saveDarft()"><i class="icon icon_save"></i>保存</button>
                        <a class="a-btn qcode-p" ng-click="article.preview()"><i class="icon icon_preview"></i>预览</a>
                        <div class="a-btn save ng-binding" ng-click="checkInfo">发布
                            <div class="publist-box ng-scope" ng-if="article.publishPreparation" style="display: none">
                                {{csrf_field()}}
                                <div class="form-control">
                                    <label>选择文章类型：</label>
                                    <div class="control">
                                        <div class="select-box">

                                            <select style="width: 341px;height: 38px;" name="arid">
                                                @foreach ($users as $category)
                                                    <option value ="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-control" style="line-height: 1;margin-bottom: 0;margin-top: 24px;">
                                    <div class="control">
                                        <label class="check-inlne"><input type="checkbox" name="original">开启原创声明<a href="http://www.duitang.com/guide/duitang/original_statement/" target="_blank">了解更多</a></label>
                                    </div>
                                </div>
                                <input type="submit" class="submit-btn ng-scope" value="确认发布">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="article-content">

                {{--图片--}}
                <div class="article-cover">
                    <div>
                        <canvas id="cvs" width="700px" height="300px"></canvas>
                        <div class="upload ">
                            {{--<input type="file" name="img" class="upload_pic" id="upload">--}}
                            <input id="upload" class="upload_pic" name="icon" hidefocus="true" type="file" style="left: 33.5px; top: 14.5px;">
                        </div>
                        <p ng-if="!article.cover.photo_path" class="ng-scope">建议尺寸 900*500 像素，且图片小于1M</p>
                    </div>
                </div>

                {{--标题--}}
                <textarea class="art-tit" name="headline" placeholder="在此输入标题" style="height:42px;"></textarea>

                <div class="art-inner">
                    <div class="tool-bar" id="mce-tools">
                        <div id="mceu_18" class="mce-panel" hidefocus="1" tabindex="-1" role="application">
                            <div id="mceu_18-body" class="mce-container-body mce-abs-layout">

                                <div id="mceu_19" class="mce-toolbar-grp mce-panel">
                                    <div id="mceu_19-body" class="mce-container-body">
                                        <div id="mceu_20" class="mce-container" role="toolbar">
                                            <div id="mceu_20-body" class="mce-container-body">

                                                <div id="mceu_21" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
                                                    <div id="mceu_21-body">
                                                        <div id="mceu_0" class="mce-widget mce-btn mce-menubtn mce-fixed-width mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_0" role="button" aria-label="Font Sizes" aria-haspopup="true">
                                                            <button id="mceu_0-open" type="button"><span class="mce-txt">15px</span> <i class="mce-caret"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="mceu_22" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
                                                    <div id="mceu_22-body">

                                                        <div id="mceu_1" class="mce-widget mce-btn mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_1" role="button" aria-label="小标题H3">
                                                            <button role="presentation" type="button" tabindex="-1"><span class="mce-txt">H3</span></button>
                                                        </div>

                                                        <div id="mceu_2" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_2" role="button" aria-label="Bold">
                                                            <button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold">B</i></button>
                                                        </div>

                                                        <div id="mceu_3" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_3" role="button" aria-label="Italic">
                                                            <button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic">I</i></button>
                                                        </div>

                                                        <div id="mceu_4" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_4" role="button" aria-label="Underline"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline">U</i></button>
                                                        </div>

                                                        <div id="mceu_5" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_5" role="button" aria-label="Strikethrough"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-strikethrough">S</i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="mceu_23" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
                                                    <div id="mceu_23-body">
                                                        <div id="mceu_6" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-labelledby="mceu_6" role="button" aria-label="Bullet list"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bullist">L</i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="mceu_24" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
                                                    <div id="mceu_24-body">
                                                        <div id="mceu_7" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_7" role="button" aria-label="Align left"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft">Z</i></button>
                                                        </div>

                                                        <div id="mceu_8" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_8" role="button" aria-label="Align center"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter">Z</i></button>
                                                        </div>

                                                        <div id="mceu_9" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_9" role="button" aria-label="Align right"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright">Y</i></button>
                                                        </div>

                                                        <div id="mceu_10" class="mce-widget mce-btn mce-colorbutton mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Text color">
                                                            <button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-forecolor">A</i><span id="mceu_10-preview" class="mce-preview"></span></button>
                                                            <button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret">X</i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="mceu_25" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
                                                    <div id="mceu_25-body">
                                                        <div id="mceu_11" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_11" role="button" aria-label="Horizontal line"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-hr">H</i></button>
                                                        </div>

                                                        <div id="mceu_12" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_12" role="button" aria-label="Insert/edit link"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link">L</i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="mceu_26" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group">
                                                    <div id="mceu_26-body">
                                                        <div id="mceu_13" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_13" role="button" aria-label="名片"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-icon_card"></i></button>
                                                        </div>
                                                        <div id="mceu_14" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_14" role="button" aria-label="插入图片"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-icon_image"></i></button>
                                                        </div>
                                                        <div id="mceu_15" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_15" role="button" aria-label="插入音乐"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-icon_music"></i></button>
                                                        </div>
                                                        <div id="mceu_16" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_16" role="button" aria-label="投票"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-icon_vote"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="mceu_27" class="mce-container mce-toolbar mce-stack-layout-item mce-last" role="toolbar">
                                            <div id="mceu_27-body" class="mce-container-body mce-flow-layout">
                                                <div id="mceu_28" class="mce-container mce-flow-layout-item mce-first mce-last mce-btn-group" role="group">
                                                    <div id="mceu_28-body">
                                                        <div id="mceu_17" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-labelledby="mceu_17" role="button"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-icon_video"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--文字输入--}}
                    <div>
                        <textarea name="detail" class="txa" id="sgcoll-txa" data-optional="1" style="width: 691px;height: 568px;"></textarea>
                    </div>


                </div>

            </div>
        </form>
    </div>
</div>

<script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
<script>
    //获取上传按钮
    var input1 = document.getElementById("upload");

    if(typeof FileReader==='undefined'){
        //result.innerHTML = "抱歉，你的浏览器不支持 FileReader";
        input1.setAttribute('disabled','disabled');
    }else{
        input1.addEventListener('change',readFile,false);
    }
    function readFile(){
        var file = this.files[0];//获取上传文件列表中第一个文件
//        console.log(file);
        if(!/image\/\w+/.test(file.type)){
            //图片文件的type值为image/png或image/jpg
            alert("文件必须为图片！");
            return false;
        }
        var reader = new FileReader();//实例一个文件对象
        reader.readAsDataURL(file);//把上传的文件转换成url
        //当文件读取成功便可以调取上传的接口
        reader.onload = function(e){
            var image = new Image();
            // 设置src属性
            image.src = e.target.result;
            var max=200;
            // 绑定load事件处理器，加载完成后执行，避免同步问题
            image.onload = function(){
                // 获取 canvas DOM 对象
                var canvas = document.getElementById("cvs");
                // 如果高度超标 宽度等比例缩放 *=
                if(image.height > max) {
                    image.width *= max / image.height;
                    image.height = max;
                }
                // 获取 canvas的 2d 环境对象,
                var ctx = canvas.getContext("2d");
                // canvas清屏
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                // 重置canvas宽高
                ctx.drawImage(image, 0, 0, 700, 380);
                // 注意，此时image没有加入到dom之中
            }
        }
    };
</script>

<script type="text/javascript">

</script>

<script>
    //    $(function () {
    //        $(".submit-btn").mouseover(function () {
    //            console.log("111");
    //
    //        });
    //    })
    function saveDarft()
    {
        console.log("aa");
    }
</script>
</body>
</html>