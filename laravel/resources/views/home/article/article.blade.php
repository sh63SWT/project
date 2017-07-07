<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="wb:webmaster" content="973d669418f79e8b">
    <title>无忧的童年 - 堆糖</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/lib.f0824a12.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home/article-pc.ef3459f2.css') }}">
</head>
<body>
<div id="content">
    <div class="dt-wrap clr pg-article-content">

        <section class="wrap-container">
            <article class="article-detail">
                <h2>{{$article->headline}}</h2>
                <div class="blog-content">
                    <figure contenteditable="false" class="img-box" id="img1498559689141">
                        <div class="img-padding" style="width: 100%; padding-bottom: 56.25%; height: 0px; background-color: #f0f0f0;" contenteditable="false" data-count="1/100">
                            <img src="{{url('img')}}/{{$article->icon}}" style="display: inline;">
                        </div>
                    </figure>
                    <p><span style="font-size: 12px;">{{$article->detail}}</span></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p></div>
            </article>
            <section class="share-list">
                <span>分享至：</span>
                <a class="sina" href="http://service.weibo.com/share/share.php?appkey=1152390549&amp;title=「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;&amp;pic=http://cdn.duitang.com/uploads/item/201706/17/20170617170041_LN8WH.thumb.150_150_c.jpeg&amp;url=http%3A//www.duitang.com/life_artist/article/%3Fid%3D462166" title="分享到新浪微博" target="_blank" onmousedown="$.G.gaq('/_trc/Social/article/sina');"><i></i></a>
                <a class="txweibo" href="http://share.v.t.qq.com/index.php?c=share&amp;a=index&amp;url=http%3A//www.duitang.com/life_artist/article/%3Fid%3D462166&amp;title=+「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;&amp;appkey=dad361aadb9948278afc268bd5617307&amp;pic=http://cdn.duitang.com/uploads/item/201706/17/20170617170041_LN8WH.thumb.150_150_c.jpeg" title="分享到腾讯微博" target="_blank" onmousedown="$.G.gaq('/_trc/Social/article/qweibo');"><i></i></a>
                <a class="qzone" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A//www.duitang.com/life_artist/article/%3Fid%3D462166&amp;title=「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;&amp;pics=http://cdn.duitang.com/uploads/item/201706/17/20170617170041_LN8WH.thumb.150_150_c.jpeg&amp;summary=「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;" title="分享到QQ空间" target="_blank" onmousedown="$.G.gaq('/_trc/Social/article/koukou');"><i></i></a>
                <a class="douban" href="http://shuo.douban.com/!service/share?image=http://cdn.duitang.com/uploads/item/201706/17/20170617170041_LN8WH.thumb.150_150_c.jpeg&amp;href=http%3A//www.duitang.com/life_artist/article/%3Fid%3D462166&amp;name=堆糖&amp;text=「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;" title="分享到豆瓣" target="_blank" onmousedown="$.G.gaq('/_trc/Social/article/douban');"><i></i></a>
                <a class="renren" href="http://widget.renren.com/dialog/share?resourceUrl=http%3A//www.duitang.com/life_artist/article/%3Fid%3D462166&amp;description=「%E6%97%A0%E5%BF%A7%E7%9A%84%E7%AB%A5%E5%B9%B4」作者:敲敲木鱼打打鼓，来自堆糖文章，查看原文&gt;&gt;&gt;&amp;title=堆糖&amp;pic=http://cdn.duitang.com/uploads/item/201706/17/20170617170041_LN8WH.thumb.150_150_c.jpeg" title="分享到人人网" target="_blank" onmousedown="$.G.gaq('/_trc/Social/article/renren');"><i></i></a>
            </section>
        </section>


        <aside class="wrap-siderbar">
            <section class="author">
                <a class="link" href="##">
                    <img src="{{url('img/home/1.jpeg')}}">
                </a>
                <a class="name" href="">敲敲木鱼打打鼓</a>
                <span class="split-line"></span>
                <span class="time">{{date("m月d日 h:s", $article->articletime)}} · 146次浏览</span>
            </section>
        </aside>
        <div class="code-out" style="display: block;">
            <div id="code" style=""><canvas width="150" height="150"></canvas></div>
            <p style="">打开app参与文章互动</p>
        </div>
    </div>
</div>


</body>
</html>