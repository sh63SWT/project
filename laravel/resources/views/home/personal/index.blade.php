@extends('home.personal.per')
@section('title', '个人专辑')
@section('cat')
    <div class="nav-bottom">
    <div class="nav-bottom-span" style="display: block; left: 286px; width: 100px; opacity: 1;"></div>
    </div>
@endsection
@section('content')

    <div class="woo-swb woo-cur" style="background: pink; width: 1200px;">
        {{--<div class="">--}}

            <div class="" data-ht="358" style="height: 308px;overflow:hidden;width:224px;float: left;margin-right: 10px;">
                <a class="createalbum-pp tc add-album" id="createalbum-pp" href="javascript:;">
                    <div class="smbg"></div>
                    <span>创建专辑</span>
                </a>
            </div>

            {{--各式专辑--}}
            @foreach ($special2 as $specials)
                <div class="woo co1" style="overflow:hidden;width:224px;float: left;margin-right: 10px;margin-bottom: 10px;">
                    <div class="dt-xitem-img">
                        <img  src="">
                        <a href="{{url('home/personal/album')}}/{{$specials->id}}" class="dt-xitem-icv" target="_blank"></a>
                    </div>

                    <div class="dt-xitem-desc">
                        <div class="dt-xitem-title">
                            <a target="_blank" href="{{url('home/personal/album')}}/{{$specials->id}}">{{$specials->album}}</a>
                        </div>
                        <div class="dt-xitem-attr">
                            <p>7张图片 <b>·</b> 0人收藏</p>
                        </div>
                    </div>

                    <div class="dt-xitem-bt1"></div>
                    <div class="dt-xitem-bt2"></div>
                </div>
            @endforeach

            {{--<div class="woo co2" style="overflow:hidden;width:224px;float: left;">--}}
                {{--<div class="dt-xitem-img">--}}
                    {{--<img alt="默认专辑" src="{{url('img/home/mr.png')}}">--}}
                    {{--<a href="/album/?id=84483588" class="dt-xitem-icv" target="_blank"></a>--}}
                {{--</div>--}}
                {{--<div class="dt-xitem-desc">--}}
                    {{--<div class="dt-xitem-title">--}}
                        {{--<a target="_blank" href="/album/?id=84483588">默认专辑</a>--}}
                    {{--</div>--}}
                    {{--<div class="dt-xitem-attr">--}}
                        {{--<p>0张图片 <b>·</b> 0人收藏</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="dt-xitem-bt1"></div>--}}
                {{--<div class="dt-xitem-bt2"></div>--}}
            {{--</div>--}}

        {{--</div>--}}
    </div>
@endsection

@section('create')
    <div class="blockMsgock" ></div>
    <div class="blockMsg blach">
        <div class="mask-body" style="width: 660px;">
            <div class="tt-s">
                <span>创建专辑</span>
                <a class="mask-close" target="_self" href="javascript:;">关闭</a>
            </div>
            <div class="mask-cont">
                <div id="popcreatealbum" class="popcreatealbum">
                    <form id="form-popcreatealbum" method="post" action="{{url('home/personal/createAlbum')}}">
                        {{csrf_field()}}
                        <table cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td width="60" align="right">专辑名</td>
                                <td><input class="ipt" type="text" name="album" value="" maxlength="40" required=""></td>
                                <td rowspan="4">
                                    <h6>常用标签</h6>
                                    <div class="usetag da" id="popal-mbaddtagsel">
                                        @foreach ($users as $category)
                                            <a href="javascript:;">{{$category->categoryName}}</a>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">描述</td>
                                <td><textarea class="txa" name="describe" maxlength="600" data-optional="1"></textarea></td>
                            </tr>
                            <tr>
                                <td align="right">标签</td>
                                <td>
                                    <div class="divipt clr">
                                        <input id="popal-mbaddtagipt" class="l ipt mr8" autocomplete="off" type="text" name="label" value="" maxlength="100" data-optional="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a class="abtn l" href="javascript:;" target="_target">
                                        <button type="submit"><u>创建</u></button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
    <script>
        $(function() {
            // 绑定单击事件
            $("#createalbum-pp").click(function () {
                $(".blockMsg").addClass('blockUI')
                $(".blockMsgock").addClass('blockOverlay');
                $(".blockMsg").removeClass('blach');
            });

            $(".mask-close").click(function () {
                $(".blockMsg").removeClass('blockUI')
                $(".blockMsgock").removeClass('blockOverlay');
                $(".blockMsg").addClass('blach');
            });

            $("#popal-mbaddtagsel a").click(function () {
                $("#popal-mbaddtag-lb").css('display', 'none');
                $("#popal-mbaddtagipt").attr("value", $(this).html());
            });

        })
    </script>
@endsection
