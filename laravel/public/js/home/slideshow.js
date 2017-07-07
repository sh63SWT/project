/**
 * Created by Administrator on 2017/6/30.
 */
window.onload = function () {
    //获取所有的小圆点
    var oIco = document.getElementById('ico');
    var aBtn = oIco.getElementsByTagName('a');
    //console.log(aBtn);

    //获取ul区域
    var oUl = document.getElementById('banner');

    //获取左右箭头
    var leftBtn = document.getElementById('btnLeft');
    var rightBtn = document.getElementById('btnRight');

    //获取所有的li
    var oLis = oUl.getElementsByTagName('li');

    //获取最大的区域div
    var oSlide = document.getElementById('slide');

    //图片的下标
    var iBtn = 0;

    //绑定左右箭头的事件
    leftBtn.onclick = function () {
        iBtn --;
        move(iBtn);
    }

    rightBtn.onclick = function () {
        iBtn ++;
        move(iBtn);
    }

    //圆点绑定事件
    for (var i = 0; i < aBtn.length ;i++ )
    {
        aBtn[i].index = i;
        aBtn[i].onclick = function () {
            move(this.index);
        }
    }

    //定时器
    function time(){
        timer = setInterval(function () {
            iBtn ++;
            move(iBtn);
        }, 5000);
    }
    time();

    //绑定属于移入事件
    oSlide.onmouseover = function () {
            clearInterval(timer);
    }

    //绑定鼠标移出事件
    oSlide.onmouseout = function () {
        time();
    }
    //ul区域移动函数
    function move(index)
    {
        // document.title = index;
        //判断index的值
        if (index < 0)
        {
            //index = 0; //停住了
            oUl.style.left = -(oLis.length - 1) * 1200 + 'px';
            index = oLis.length - 2;
        }

        if (index > oLis.length - 1)
        {
            //index = oLis.length - 1; //停住了
            oUl.style.left = 0 + 'px';
            index = 1;
        }

        for (var i = 0; i < aBtn.length ; i ++ )
        {
            aBtn[i].className = '';
        }
        if (index == oLis.length - 1)
        {
            aBtn[0].className = 'active';
        } else {
            aBtn[index].className = 'active';
        }

        iBtn = index;
        //oUl.style.left = -index * 790 + 'px';
        animator(oUl,{left:-index * 1200}, 8);
    }
}