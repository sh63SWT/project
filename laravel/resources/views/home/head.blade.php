<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ URL::asset('css/home/index.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/home/index1.css') }}">
	{{--<script src="{{ URL::asset('js/home/index.js') }}"></script>--}}
	<script type="text/javascript">
	</script>
	<script src="{{ URL::asset('js/home/index2.js') }}"></script>
	<style>
		.dt_sw{
			width: 200px;
			height: 50px;
			float: left;
		}
	</style>
</head>
<body>
<div id="header">
	<div style="width: 100%; height: 65px;">
		<div class="pnav-header SG-posfollow" style="position: fixed; bottom: auto; z-index: 998; width: 100%; height: 65px; left: 0px; right: auto; top: 0px;">
			<div class="SG-sidecont">
				<div id="header-wrap">
					<div id="dt-header">
						<div class="dt-wrap">
							<div class="dt_sw" id="w">
								<img src="{{ URL::asset('img/home/logo.jpg') }}" width="60px" height="60px" >
							</div>
							<script>
                                $.getScript('http://php.weather.sina.com.cn/iframe/index/w_cl.php?code=js&day=0&city=&dfc=1&charset=utf-8',function(a){
                                    var s="",r="",q="";for(s in window.SWther.w){
                                        q=SWther.w[s][0];
                                        r={city:s,date:SWther.add.now.split(" ")[0]||"",day_weather:q.s1,night_weather:q.s2,day_temp:q.t1,night_temp:q.t2,day_wind:q.p1,night_wind:q.p2},
//                       console.log(q.s1+" "+r.city);
                                            $("#w").html(q.s1+" "+r.city);
//                    alert(q[0])
                                    }
                                    $("#w").html(q.s1+" "+r.city);

                                });
							</script>

							<div id="dt-logo">
								<img src="{{ URL::asset('img/home/logo.jpg') }}">
							</div>

							<div id="dt-header-right">
								@if($uid)
									<div id="dt-account" class="dt-has-menu dt-head-cat">
										<a class="dt-account-btn" href="">
											@if(Auth::guard()->user()->icon)
												<img class="dt-avatar" src="{{URL::asset('img/')}}/{{Auth::guard()->user()->icon}}">
											@else
												<img class="dt-avatar" src="{{URL::asset('img/admin/default.png')}}">
											@endif
											<span>我的淮唐</span> <i></i>
										</a>
										<div class="dt-menu">
											<div class="dt-menu-inner dt-menu-mini">
												{{--<a id="mynavtools-home" href="home/personal/index/ ">--}}
												<a id="mynavtools-home" href="{{ url('home/personal/index')}}/{{Auth::guard()->user()->id}} ">

													<i></i>
													个人主页
												</a>
												<a id="mynavtools-setting" href="/home/vipUpdate">
													<i></i>
													账号设置
												</a>
												<div class="dt-menu-bottom">
													<a id="mynavtools-logout" href="/home/logout">
														<i></i>
														退出
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="dt-has-menu dt-head-cat">
										<a href="{{url('home/emails/tests')}}/{{$uid}}">生活家</a>
									</div>
								@else
									<div class="dt-vline"></div>
									<a href="/home/login" id="dt-login" class="dt-btn dt-head-cat"  data-next="/" style="margin-top: 18px">登录</a>
									<div class="dt-vline"></div>
									<a href="/home/register" id="dt-register" class="dt-btn dt-head-cat" href="">注册</a>
									<div class="dt-vline"></div>
								@endif
								<div class="dt-has-menu dt-head-cat">
								</div>
								<div id="dt-add" class="dt-has-menu dt-head-cat">
									<div class="dt-menu">
									</div>
								</div>
							</div>

						</div>
					</div>
					<div id="dt-header-btm"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>