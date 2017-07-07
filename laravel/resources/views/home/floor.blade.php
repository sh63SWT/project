<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ URL::asset('css/home/index.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/home/index1.css') }}">
	<script src="{{ URL::asset('js/home/index.js') }}"></script>
	<script type="text/javascript">
	</script>
	<script src="{{ URL::asset('js/home/index2.js') }}"></script>
</head>
<body>
<div id="footer" class="footeridx" style="display: block;">
	<div class="dt-wrap oh">
		<div class="dt-span-list clr">
		<div class="dt-footer-span oh">
			<div class="dt-footer-span-inner">
			<div class="dt-footer-span-title">
				关于我们
			</div>
			<div class="dt-footer-span-items">
				<a target="_blank" >
				关于我们
				</a>
				<a target="_blank" >
				帮助中心
				</a>
				<a target="_blank" >
				加入我们
				</a>
				<a target="_blank" >
				堆糖收集工具
				</a>
				<a target="_blank" >
				联系我们
				</a>
				<a target="_blank" >
				标签集
				</a>
				<a target="_blank" >
				商务合作
				</a>
				<a target="_blank" >
				免责声明
				</a>
			</div>
		</div>
	</div>
	<div class="dt-footer-span oh">
		<div class="dt-footer-span-inner">
			<div class="dt-footer-span-title">
			手机应用
			</div>
			<div class="dt-footer-span-items">
				<a target="_blank">
				堆糖客户端
				</a>
				<a target="_blank">
				爱疯了壁纸
				</a>
				<a target="_blank">
				堆糖良品购
				</a>
			</div>
		</div>
	</div>
	<div class="dt-footer-span dt-footer-center oh tc">
		<div class="dt-footer-span-inner">
			<div class="dt-tcode">
				<img style="width: 100%;" src="./首页/20160506140111_ycQzR.png">
			</div>
			<p>扫描二维码</p>
			<p>下载堆糖手机客户端</p>
		</div>
	</div>
	<div class="dt-footer-span oh">
		<div class="dt-footer-span-inner">
			<div class="dt-footer-span-title">
			关注我们
			</div>
			<div class="dt-footer-span-items">
				<a href="http://weibo.com/duitang/" target="_blank">
				新浪微博
				</a>
				<a class="wxlink" href="javascript:;">
				微信
				</a>
			</div>
		</div>
	</div>
	<div class="dt-footer-span oh">
		<div class="dt-footer-span-inner">
			<div class="dt-footer-span-title">
			友情链接
			</div>
			<div class="dt-footer-span-items">
				@foreach($url as $urls)
				<a target="_blank" href="{{$urls->url}}">
				{{$urls->urlname}}
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
	<div class="dt-footer-bottom">
		<span class="dt-footer-icp">
		©2017 duitang.com 版权所有。<a target="_blank">沪ICP备10038086号-3</a>
		</span>
		<a class="zhengxin" target="_blank" ></a>
		<a class="beian1" target="_blank"></a>
		<a class="beian2" target="_blank"></a>
	</div>
</div>
	<a class="txt" href="https://www.duitang.com/mblogdetails/index.html">索引</a></div>
<div id="win-house" class="h0">
</div>
	<div id="foot-forms" class="dn">
		<form id="woo-form-hot" action="">
			<input type="hidden" value="top_comments,is_root,source_link,item,buyable,root_id,status,like_count,sender,album,like_id,favorite_blog_id" name="include_fields">
			<input type="hidden" value="24" name="limit">
			<input class="dn" type="checkbox" name="buyable" value="1">
		</form>
	</div>
<script src="./首页/index.700d5949.js.下载"></script>

	<div class="dt-side-combo" style="position: fixed; bottom: 30px; z-index: 10000; width: 48px; height: 142px; left: 50%; right: 10px; top: auto; margin-left: 612px; opacity: 1; display: block;">
		<div class="SG-sidecont">
			<div id="dt-side-combo">
				<a id="dt-backtotop" class="dt-backtotop" href="javascript:;">回到顶部</a>
				<a class="dt-app" href="https://www.duitang.com/app/duitang/">手机应用</a>
				<a class="dt-report" href="https://www.duitang.com/leave/message/">反馈意见</a>
			</div>
		</div>
	</div>
</body>
</html>