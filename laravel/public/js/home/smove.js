/**
 * 获取css样式
 * @param {Object} obj
 * @param {Object} attr
 */
function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}
/**
 * 缓冲运动动画
 * @param {Object} obj		对象
 * @param {Object} json		运动目标值
 * @param {Object} speed	速度
 * @param {Object} fn		运动完成回调函数
 */
function animator(obj,json,speed,fn){
	 var speed = speed || 5;
     clearInterval(obj.t)		//开始前关闭原有的定时器
     obj.t=setInterval(function(){
		  var endMove=true;	   //设置运动停止初始值
		  for(var attr in json){
		  		// iCur 更新运动元素当前的属性值
         		if(attr=='opacity'){	//对透明度单独处理
              		var iCur = parseInt(parseFloat(getStyle(obj, attr))*100);
			 	}else{					//普通样式
              		var iCur = parseInt(getStyle(obj, attr));
			 	}
			 	// 速度取整
		  	 	var iSpeed=(json[attr]-iCur)/speed>0?Math.ceil((json[attr]-iCur)/speed):Math.floor((json[attr]-iCur)/speed);
		  		//检测是否到目标点
		  		if(iCur!=json[attr]){
              		endMove=false;
		  		}
		  		//设置样式，对透明度单独处理
             	if(attr=='opacity'){
                   obj.style.filter='alpha(opacity='+(iCur+iSpeed)+')';
				   obj.style.opacity=(iCur+iSpeed)/100;
			 	}else{
                   obj.style[attr]=iCur+iSpeed+'px';
			 	}
		  }
		  //运动完成，关闭定时器
		  if(endMove){
             	clearInterval(obj.t)
				obj.t = null;
			 	if(fn){	//回调函数存在，调用回调函数，并把当前对象做为this
                	fn.call(obj);
				}
		  }
	 },30);
}