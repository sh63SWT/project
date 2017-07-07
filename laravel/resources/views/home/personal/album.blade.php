<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="wb:webmaster" content="973d669418f79e8b">
    <title>夏天－堆糖，美好生活研究所</title>
    <meta name="keywords" content="夏天,敲敲木鱼打打鼓图片专辑">
    <meta name="description" content="敲敲木鱼打打鼓创建专辑-夏天,共3个收集,0人喜欢,了解敲敲木鱼打打鼓的爱好,查看夏天图片专辑.">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/album-detail.78d578eb.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/dazlib.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/detail.css') }}">--}}

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/other.css') }}">
</head>
<body>

    <div id="content">
        <div class="album-header">
            <img class="album-header-bg ohmyblured" src="{{url('img/home/ban.jpeg-0_1_0.445')}}" height="280">
            <div class="album-header-bg-mask"></div>
            <table class="album-header-info tc">
                <tbody>
                <tr>
                    <td>
                        <h1 class="album-title">{{$alb->album}}</h1>
                        <p class="album-info">
                            <span class="album-count">3张图片</span>
                            &nbsp;<b>·</b>&nbsp;
                            <span class="like-count"><i>0</i>人收藏</span>
                        </p>
                        <p class="album-desc">{{$alb->describe}}</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="album-header-attr-mask"></div>

            <div class="album-header-attr tc">
                <a target="_blank" class="album-account" href="/people/?user_id=15050675">
                    <img class="avatar" src="{{url('/img/home/zi.jpeg')}}">
                    <span class="name">敲敲木鱼打打鼓</span>
                </a>

                <div class="album-action dib">
                    <a title="发布" id="album-post" class="album-post" href="javascript:;"><i></i><span>发布</span></a>
                    <div id="album-share" class="album-share" href="javascript:;">
                        <i></i>
                        <span id="album-share-list" class="album-share-list clr" style="display: none; width: 0px;">
                            <span>分享：</span>
                            <a class="sina" href="" title="分享到新浪微博" target="_blank"></a>
                            <a class="txweibo" href="" target="_blank"></a>
                            <a class="qzone" href="" title="分享到QQ空间" target="_blank"></a>
                            <a class="douban" href="" title="分享到豆瓣" target="_blank"></a>
                            <a class="renren" href="" title="分享到人人网" target="_blank"></a>
                        </span>
                    </div>
                </div>

                <div class="album-tags">
                    <span class="tag-legend">标签：</span>
                    <span class="tag-area">
                        <a target="_blank" href="">#{{$alb->label}}</a>
                        </span>
                </div>

                <div id="album-edit" class="album-edit">
                    <a href="javascript:;"><i></i>编辑</a>
                </div>
            </div>

            <div class="album-header-mask dn"></div>
        </div>

        <div class="album-content">
            <div id="woo-holder">
                <a name="woo-anchor"></a>
                <div class="albumshowstyle clr dymswitch-0" style="opacity: 1;">
                    <a title="列表显示" class="woo-swa woo-cur cur" href="javascript:;">列表展示</a>
                    <a title="幻灯片显示" id="albumentr" href="javascript:;"  class="">幻灯播放</a>
                </div>

                <div class="woo-swb woo-cur" style="display: block;">
                    @if(!empty($filetrue->filetrue))
                        <div class="empty-tips tc">
                            <div class="" style="top:20px;left:0px;">
                                <p class="gray">还未添加内容，你可以上传本地图片或者使用收集工具进行图片发布。<br>也可以在站内进行收集。</p>
                            </div>
                        </div>
                    @else

                        <div class="woo-pcont stpics clr">
                            {{--<div class="woo-pcont stpics clr woo-masned">--}}
                            @foreach ($picture as $pic)
                                <div class="woo co0">
                                    <div class="j">

                                        <div class="mbpho">
                                            <a class="a" href="{{url('home/blog/index')}}/{{$pic->id}}">
                                                <img src="{{url('/img')}}/{{$pic->img}}" data-rootid="15050675" data-iid="">
                                                <u class=""></u>
                                            </a>
                                            <div class="collbtn" style="position: absolute; left: 0px; top: 0px; display: none;">
                                                <a class="y" href="#"><i></i><em>收集  118</em></a>
                                                <a class="x btn-white" href="#"><i>0</i></a>
                                                <a class="z re-zan btn-white" href="/blog/?id=771983841"><i class="z-done">0</i></a>
                                            </div>
                                        </div>

                                        <div class="wooscr">
                                            <div class="g">{{$pic->describe}}</div>
                                            <div class="d">
                                                <span class="d1">118</span>
                                                <span class="d2 dn">0 </span>
                                                <span class="d3 dn">0</span>
                                            </div>
                                            <ul>
                                                <li class="f">
                                                    <a target="_blank" href="/people/?user_id=15050675">
                                                        <img src="https://b-ssl.duitang.com/uploads/people/201706/16/20170616095728_zjSvn.thumb.24_24_c.jpeg" width="24" height="24">
                                                    </a>
                                                    <p>
                                                        <a class="p" target="_blank" href="/people/?user_id=15050675">敲敲木鱼打打鼓</a>&nbsp;<br>
                                                        <span>收集到<a target="_blank" href="/album/people/15050675/">默认专辑</a></span>
                                                    </p>
                                                </li>
                                                <!--评论部分-->
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="woo-pager">
                            <div class="woo-pbr woo-mpbr">
                                <ul class="woo-dib"><li class="woo-cur">1</li></ul>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <div class="album-reply-list dn"></div>
    </div>

    {{--编辑专辑--}}
    <div class="blockMsgock"></div>
    <div class="blockMsg blach">
        <div class="mask-body" style="width: 660px;">
            <div class="tt-s">
                <span>编辑专辑</span>
                <a class="mask-close" target="_self" href="javascript:;">关闭</a>
            </div>
            <div class="mask-cont">
                <div id="popalbumedit" class="win-wraper popalbumedit">
                    <form id="form-albumedit" method="post" action="{{url('home/personal/updateAlbum')}}">
                        <div class="form-line">
                            <div class="form-legend">专辑名*</div>
                            <input id="editname" class="ipt" required type="text" name="name" maxlength="40" value="{{$alb->album}}">
                        </div>
                        <div class="form-line">
                            <div class="form-legend">描述</div>
                            <textarea class="txa" name="desc" required maxlength="600" data-optional="1">{{$alb->describe}}</textarea>
                        </div>
                        <div class="form-action dn">
                            <a class="abtn l" href="javascript:;" target="_self"><button type="submit"><u>确定</u></button></a>
                        </div>
                    </form>

                    <div id="contaddarea" class="form-line">
                        <div class="clr">
                            <div class="form-legend">
                                标签
                            </div>
                            <div class="form-content">
                                <form id="form-albumaddtag" method="post" action="/album/tag/add/" onsubmit="return false;">
                                    <div class="da tag-sel-cnt tag-use-cnt clr">
                                        <input id="mbaddtagipt" class="tag-edt-ipt" required autocomplete="off" type="text" value="{{$alb->label}}" maxlength="100" data-optional="true">
                                    </div>
                                </form>
                                <div class="tag-use-cnt tag-def-cnt da" id="mbaddtagsel">
                                    @foreach ($users as $category)
                                        <a class="def-tags" href="javascript:;"><i>{{$category->categoryName}}</i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pop-album-action clr">
                        <a id="albumdelbtn" class="album-delete" href="javascript:;" title="84570462">删除专辑</a>
                        <a class="album-edit-ok" href="javascript:;">确定</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="aat"></div>
    <div class="blockMsg2 blach">
        <div class="mask-body" style="width: 484px;">
            <div class="tt-s">
                <span>上传图片</span>
                <a class="mask-close" target="_self" href="javascript:;" onclick="SUGAR.PopOut.closeMask();">关闭</a>
            </div>
            <div class="mask-cont">
                <div id="sgcoll-up">

                    <div id="sgcoll-uploaded" class="">
                        <div id="sgcoll-uploaded" class="" style="">
                            <form id="form-sgcoll-poststatus" action="{{url('home/personal/createPic')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- 图片区域 -->
                                <div id="sgcoll-pics" style="width: 485px;height: 162px;">
                                    <canvas id="cvs" width="100px" height="100px" style="float: left;border: 1px solid #1b6d85;margin-left: 20px;margin-top: 30px"></canvas>
                                    <div class="upload " style="float: left;margin-top: 100px;margin-left: 30px;">
                                        <input id="doc" class="upload_pic" name="img" hidefocus="true" type="file" style="left: 33.5px; top: 14.5px;">
                                    </div>
                                </div>

                                <div id="sgcoll-panel">
                                    <!-- 专辑区域 -->
                                    <div class="sgcoll-album">
                                        <div id="sgcoll-albumsel" class="sgcoll-albumsel">
                                            {{--<input id="sgcoll-albumsel-v" type="text" name="album" value="夏天" data-optional="1">--}}
                                            {{--<a class="sgcoll-shw" href="javascript:;"></a>--}}
                                            <select style="width: 400px;height: 30px;" name="option">
                                                @foreach ($albs as $albums)
                                                    <option value ="{{$albums->id}}">{{$albums->album}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- 输入框 -->
                                    <div class="sgcoll-cxa">
                                        <textarea name="describe" required class="txa" id="sgcoll-txa" data-optional="1"></textarea>
                                        <span class="sgcoll-wremain dn"><b id="sgcoll-rmn">300</b> 字</span>
                                        <label for="sgcoll-txa" id="sgcoll-txa-lb">写点介绍，让更多人喜欢ta</label>
                                    </div>

                                    <!-- 标签区域 -->
                                    <div class="sgcoll-tags-wrp">
                                        <div id="sgcoll-tags-add" class="da tag-sel-cnt tag-use-cnt clr">
                                            <input id="sgcoll-tags-inp" name="lab" class="tag-edt-ipt" autocomplete="off" type="text" value="" maxlength="20">
                                        </div>
                                        <label for="gcoll-tags-inpi" id="sgcoll-tags-lb"><i>&nbsp;</i>添加适合的标签，方便大家找到</label>
                                        <div class="tag-use-cnt tag-def-cnt da" id="sgcoll-tags-sel" style="top: auto; bottom: 40px;">
                                            <span id="sgcoll-tags-cls"><span>关闭</span></span>
                                            <span class="tag-use-desc">热门标签：</span>
                                            @foreach ($users as $category)
                                                <a class="def-tags" href="javascript:;"><i>{{$category->categoryName}}</i></a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- 发布按钮 -->
                                    <div id="sgcoll-subarea" class="u-chk clr">
                                        <a class="abtn l" href="javascript:;" target="_self">
                                            <button id="sgcoll-abtnpost" type="submit"><u>发布</u></button>
                                        </a>
                                        <div id="sgcoll-poststat"></div>
                                    </div>
                                </div>
                            </form>

                            <div id="myalbums-wrap" class="dn">
                                <div id="myalbums-albs" class="">
                                    @foreach ($albs as $albums)
                                        <a class="def-tags" href="javascript:;">{{$albums->album}}</a>
                                    @endforeach
                                </div>

                                <div class="clr">
                                    <form action="/napi/album/create/" method="post">
                                        <input type="text" value="" name="name" class="ipt l" maxlength="40">
                                        <a target="_self" href="javascript:;" class="abtn l">
                                            <button type="submit"><u>创建</u></button>
                                        </a>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
    <script>
        $(function() {
            // 绑定编辑单击事件
            $("#album-edit").click(function () {
                $(".blockMsgock").addClass('blockOverlay');
                $(".blockMsg").addClass('blockPage');
                $(".blockMsg").removeClass('blach');
            });
            $(".mask-close").click(function () {
                $(".blockMsg").removeClass('blockUI')
                $(".blockMsgock").removeClass('blockOverlay');
                $(".blockMsg").addClass('blach');
            });
            $("#mbaddtagsel i").click(function () {
                $("#mbaddtagipt").attr("value", $(this).html());
            });

            //删除
            $(".album-edit-ok").clcik(function () {
                console.log("aaa");
            })
        })
    </script>

    <script>
//        function setImagePreviews(avalue) {
//            var docObj = document.getElementById("doc");
//            var fileList = docObj.files;
//            for (var i = 0; i < fileList.length; i++) {
//                if (docObj.files && docObj.files[i]) {
//                    $('#sgcoll-upimg').attr('src',window.URL.createObjectURL(docObj.files[i]))
//                }
//            }
//            return true;
//        }
    </script>

    <script>
        //    发布
        $("#album-post").click(function () {
            $(".aat").addClass('blockOverlay');
            $(".blockMsg2").addClass('blockPage');
            $(".blockMsg2").removeClass('blach');
        })
        //    标签
        $(".sgcoll-cxa").click(function () {
            $("#sgcoll-txa-lb").addClass('dn');
        });
        $("#sgcoll-tags-lb").click(function () {
            $("#sgcoll-tags-lb").addClass('dn');
            $("#sgcoll-tags-sel").show();
        });
        $(".def-tags i").click(function () {
            $("#sgcoll-tags-inp").attr("value", $(this).html());
        });
        $("#sgcoll-tags-cls").click(function () {
            $("#sgcoll-tags-sel").addClass('dn');
        })
        //    标签结束
    </script>
    <script>
        //获取上传按钮
        var input1 = document.getElementById("doc");

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
                    ctx.drawImage(image, 0, 0, 100, 100);
                    // 注意，此时image没有加入到dom之中
                }
            }
        };
    </script>

</body>
</html>