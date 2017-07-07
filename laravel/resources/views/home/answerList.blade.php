<!DOCTYPE html>
	<head>
		<title>堆糖，美好生活研究所</title>
	<link href="{{ URL::asset('css/home/lib.f0824a12.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/home/index.8ae7461d.css') }}" rel="stylesheet">
	<script type="text/javascript" src="/js/public/jquery.js"></script>
	{{--	<script type="text/javascript" src="{{ URL::asset('js/home/hm.js') }}"></script>--}}
	<script type="text/javascript">
	</script>
	{{--<script src="/public/js/home/lib.bundle.c831fe83.js"></script>--}}
	</head>
<body>
<!-- 头部 -->
	<div id="header">
	<div style="width: 100%; height: 65px;">
	<div class="pnav-header SG-posfollow" style="position: fixed; bottom: auto; z-index: 998; width: 100%; height: 65px; left: 0px; right: auto; top: 0px;">
	<div class="SG-sidecont">
	<div id="header-wrap">
@extends('home.head');
@include('home.head');
<div id="dt-header-btm"></div>
</div></div></div></div></div>
	<div id="content">
		<div class="block">
			<div class="box">
				<h2>
					<a href="">我的堆糖</a>&nbsp;&gt;&nbsp;
					<a href="javascript:;">账号设置</a>&nbsp;&gt;&nbsp;
					<a href="javascript:;" class="changename">密码找回</a>
				</h2>
			</div>
			<div class="pb8 set-mt15">
				<ul class="ctr-sw">
				</ul>
			</div>
	</div>
	<div class="info-main-area">
		<div class="hset set-info" style="display: block;">
			<div class="block">
				<div class="ps-info-img">
					<div class="ps-img-d">
						<a id="myphotoa" href="javascript:;">
						</a>
					</div>
				</div>
					<div id="set-uploadhead-holder" class="set-selectpic gray">
					<div class="clr mt8">
						<div class="l mt8 gray">
						{{--可以上传jpg,gif,png格式的图片，且文件小于2M--}}
						</div>
					</div>
				</div>
			</div>
			<div class="block brdsep">
				<form id="form-upemail" action="/home/getanswer" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="set-baseinfo">
						<table class="tableform" cellspacing="0" cellpadding="0">
							<tbody>
								@foreach($result as $v)
									<input type="hidden" name="uid" value="{{$uid}}">
									<tr>
									<td>问题:</td>
									<td>
										<input id = "answer" class="ipt" readonly="readonly" type="text" name="answer" value="{{$v->answer}}">

									</td>
									<td>(不可更改)</td>
								</tr>
								@endforeach
								<tr>
									<td>答案:</td>
									<td>
										@if(empty($problem))
											<input id = "problem" class="ipt" type="text" name="problem" value="">
										@else
											@foreach($problem as $v)
												<input id = "problem" class="ipt" type="text" name="problem" value="{{$v->problem}}">
											@endforeach
										@endif
										<div class="error"><span id="sanswer"></span></div>
									</td>
									<td>(输入答案)</td>
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
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
	<div id="footer" class="footer">
		<div class="footcont">
			<div class="footwrap">
				<div class="dt-footer-frdlk">
					<a href="">标签集</a>
					<a id="sitehelp" href="">帮助中心</a>
					<a href="">关于我们</a>
					<a href="">加入我们</a>
					<a href="">免责声明</a>
					<a href="">堆糖收集工具</a>
					<a href="" class="beian1" target="_blank"></a>
				</div>
				<span class="dt-footer-icp">©2017 duitang.com 版权所有。
					<a href="" target="_blank">沪ICP备10038086号-3</a>
				</span>
			</div>
		</div>
	</div>
<script>
    $(function () {
        $("#problem").blur(function () {
            var problem = $("#problem").val();
            if(problem == 0){
                $("#sanswer").html('*答案不能为空');
                return false;
            }else{
                $("#sanswer").html('');
            }
            return false;
        })
    })
</script>
</body>
</html>