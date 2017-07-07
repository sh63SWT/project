<?php

//前台

Route::get('/', function () {
    return view('welcome');
});

Route::get('nav',function () {
    return view('home.header');
});

/////李莹莹

//前台首页
Route::get('/', 'Home\UserController@goods@category@slideshow@album');

//前台头部
Route::get('head', 'Home\UserController@head');
//前台底部
Route::get('floor', 'Home\UserController@floor@url');

/////李莹莹




/////祝雨

//前台用户注册
Route::get('/home/register', 'Home\UserController@registerForm');//注册页面
Route::get('/home/sendSms', 'Home\UserController@sendSms');//手机验证码
Route::post('/home/regval', 'Home\UserController@regval');//开始注册
//前台用户登录
Route::get('/home/login', 'Home\UserController@loginForm');//登录页面
Route::get('/home/logintel','Home\UserController@logintel');//登录时手机验证
Route::post('/home/tologin', 'Home\UserController@tologin');//开始登录过程


Route::get('/home/forgetpass','Home\ProblemController@forgetPass');//跳转忘记密码页面
//Route::get('/home/getpass/{id}','Home\AnswerController@getPass');//找回密码
Route::post('/home/getanswer','Home\ProblemController@getAnswer');//提交密码
Route::get('/home/gettel','Home\ProblemController@gettel');//提交手机验证
Route::get('/home/getproblem','Home\ProblemController@getproblem');//提交答案验证

//前台模块(防止恶意登录)
Route::group(['middleware' => 'user.login'],function () {
    Route::get('/home/getpass/{id}','Home\AnswerController@getPass');//找回密码

    Route::get('/home/logout', 'Home\UserController@logout');//退出登录
    Route::get('/home/vipUpdate','Home\UserController@vipUpdate');//个人资料修改
    Route::post('/home/vipUpdate','Home\UserController@tovipUpdate');
    Route::get('/logincap','Home\UserController@logincap');

    Route::get('/vipCare/{id}','Home\CareController@careList');
    Route::get('/vipVer/{id}','Home\VerController@verList');
    Route::get('/home/delver/{id}','Home\VerController@delver');
    Route::get('/home/addver/{id}','Home\VerController@addver');
    Route::get('/home/addcare/{id}','Home\CareController@addcare');
    Route::get('/home/delcare/{id}','Home\CareController@delcare');
    Route::get('/care/catList/{id}','Home\CatController@catList');
    Route::post('/home/sendcat','Home\CatController@catAdd');
    Route::get('/home/delcat/{id}','Home\CatController@catDel');
});
/////祝雨



//前台个人主页
Route::get('personal','Home\UserController@personal');


/////////   王霜
//生活家
Route::get('home/emails/tests/{uid}','Home\Article\ArticleController@tests');//生活家
//点击 获取验证码 判断
Route::get('home/emails/verify','Home\Article\ArticleController@verify');

//点击完成 判断
Route::get('home/emails/codelog','Home\Article\ArticleController@codelog');


//文章
//文章首页  跳转写文章
Route::get('home/article/index', 'Home\Article\ArticleController@indexFrom');
//文章首页  跳转已发布文章
Route::get('home/article/published', 'Home\Article\ArticleController@published');
//文章首页  跳转文章素材库
Route::get('home/article/videolib', 'Home\Article\ArticleController@videolib');

//写文章(index)
//+ 添加新文章(create)
Route::get('home/article/create', 'Home\Article\ArticleController@create');
////文章发布
//Route::post('home/article/check',  'Home\Article\ArticleController@check');
//Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function(){
// Route::post('home/article/createA', 'Home\Article\ArticleController@createA');
//////
//Route::post('home/article/check', 'Home\Article\ArticleController@check');
//

//Route::post('home/emails/cod', 'Home\Article\ArticleController@cod');


//发布文章
Route::post('home/article/createArticle', 'Home\Article\ArticleController@createArticle');



//别人空间
Route::get('home/people/index/{id}', 'Home\People\PeopleController@index');

Route::get('home/people/article/{id}', 'Home\People\PeopleController@article');
//收集的图片
Route::get('home/people/collect/{id}', 'Home\People\PeopleController@collect');
//发布的图片
Route::get('home/people/original/{id}', 'Home\People\PeopleController@original');


//个人空间
// 专辑
Route::get('home/personal/index/{id}', 'Home\Personal\UserController@indexFrom');
//创建专辑
Route::post('home/personal/createAlbum', 'Home\Personal\UserController@createAlbum');
//专辑编辑
Route::get('home/personal/album/{id}', 'Home\Personal\UserController@album');
//更改专辑
Route::post('home/personal/updateAlbum', 'Home\Personal\UserController@updateAlbum');

//创建图片
Route::post('home/personal/createPic', 'Home\Personal\UserController@createPic');


//文章
Route::get('home/personal/article/{id}', 'Home\Personal\UserController@article');

Route::get('home/article/article/{id}', 'Home\Article\ArticleController@separateArticle');


//收集的图片
Route::get('home/personal/collect/{id}', 'Home\Personal\UserController@collect');
//发布的图片
Route::get('home/personal/original/{id}', 'Home\Personal\UserController@original');


//图片评价界面
Route::get('home/blog/index/{id}', 'Home\Blog\BlogController@indexForm');
//图片评价
Route::post('home/blog/indexblog', 'Home\Blog\BlogController@indexblog');

Route::post('home/blog/create', 'Home\Blog\BlogController@create');
/////////   王霜





//后台


/////祝雨

//后台登录
Route::get('/admin/login', 'Admin\AdminController@loginForm');//登录
Route::any('/admin/doLogin', 'Admin\AdminController@doLogin');//去登录
Route::any('/admin/emails', 'Admin\AdminController@emails');//去登录
Route::get('/user/phones', 'Admin\UserController@phones');//ajax验证手机号码
Route::get('/user/emails', 'Admin\UserController@emails');//ajax验证手机号码
//后台模块(防止恶意登录)
Route::group(['middleware' => 'check.login'],function () {
    Route::get('/admin/logout', 'Admin\AdminController@logout');//退出登录

    //管理员管理
    Route::get('/admin-list', 'Admin\AdminController@adminList');
    Route::get('/admin-toAdd', 'Admin\AdminController@adminToAdd');
    Route::post('/admin-add', 'Admin\AdminController@adminAdd');
    Route::get('/admin-Update/{id}', 'Admin\AdminController@adminToUpdate');
    Route::post('/admin-Update/{id}', 'Admin\AdminController@adminUpdate');
    Route::get('/emails', 'Admin\AdminController@adminEmails');
//    Route::get('/emailss','Admin\AdminController@adminUser');
    Route::get('/admin-delete/{id}', 'Admin\AdminController@adminDelete');
    //用户管理
    Route::get('/user-list', 'Admin\UserController@userList');
    Route::get('/answer-list', 'Admin\AnswerController@answerList');
    Route::get('/answer-toAdd', 'Admin\AnswerController@answerAdd');
    Route::post('/answer-add', 'Admin\AnswerController@answertoAdd');
    Route::get('/answer-upd/{id}', 'Admin\AnswerController@answerUpd');
    Route::post('/answer-upd', 'Admin\AnswerController@answertoUpd');
    Route::get('/answer-del/{id}', 'Admin\AnswerController@answerDel');
    Route::get('/user-toAdd', 'Admin\UserController@userToAdd');
    Route::post('/user-add', 'Admin\UserController@userAdd');


    Route::get('/user-status/{id}/{status}', 'Admin\UserController@status');
    Route::get('/user-update/{id}', 'Admin\UserController@update');
    Route::post('/user-update/{id}', 'Admin\UserController@toUpdate');
    Route::get('/user-delete/{id}', 'Admin\UserController@userDel');
    Route::get('/user-care/{id}', 'Admin\CareController@userCare');
    Route::get('/user-delcare/{id}', 'Admin\CareController@delcare');
    Route::get('/user-ver/{id}', 'Admin\VerController@userVer');
    Route::get('/user-delver/{id}', 'Admin\VerController@delVer');
});
/////祝雨


/////李莹莹

//后台头部
Route::get('admin/index', 'Admin\AdminController@index');

//前台首页
Route::get('/', 'Home\UserController@goods@category@slideshow');

//分类管理
Route::get('/category-list', 'Admin\CategoryController@categoryList');
Route::any('/categoryAdd', 'Admin\CategoryController@categoryAdd');
Route::any('/category-Add', 'Admin\CategoryController@Add');
Route::any('/category-Update/{id}', 'Admin\CategoryController@categoryUpdate');
Route::get('/category-delete/{id}', 'Admin\CategoryController@categoryDelete');
Route::any('/categoryUpdate', 'Admin\CategoryController@Update');
Route::any('/cAdd/{id}', 'Admin\CategoryController@Cadd');
Route::any('/c_Add', 'Admin\CategoryController@cateAdd');
//商品管理
Route::get('/goods-list', 'Admin\GoodsController@goodsList');
Route::any('/goodsAdd', 'Admin\GoodsController@goodsAdd');
Route::post('/goods-Add', 'Admin\GoodsController@gAdd');
Route::any('/goodsUpdate/{id}', 'Admin\GoodsController@gUpdate');
Route::any('/goods-Update/', 'Admin\GoodsController@goodsUpdate');
Route::get('/goods-delete/{id}', 'Admin\GoodsController@goodsDelete');

//轮播管理
Route::get('/slideshow-list', 'Admin\SlideshowController@slideshowList');
Route::any('/slideshow-Add', 'Admin\SlideshowController@slideAdd');
Route::post('/slideshowAdd', 'Admin\SlideshowController@slideshowAdd');
Route::any('/slideshowUpdate/{id}', 'Admin\SlideshowController@slideUpdate');
Route::any('/slideshow-Update/', 'Admin\SlideshowController@slideshowUpdate');
Route::get('/slideshow-delete/{id}', 'Admin\SlideshowController@slideshowDelete');

Route::get('/url-list', 'Admin\UrlController@urlList');
Route::any('/url-Add', 'Admin\UrlController@urlAdd');
Route::post('/urlAdd', 'Admin\UrlController@uAdd');
Route::any('/urlUpdate/{id}', 'Admin\UrlController@urlUpdate');
Route::any('/url-Update', 'Admin\UrlController@uUpdate');
Route::get('/url-delete/{id}', 'Admin\UrlController@urlDelete');

//商品详情
Route::any('/goods/{id}','Home\UserController@gooddeil');
Route::get('/addcar/c','Home\UserController@cart');
Route::get('/addcar','Home\UserController@addcar');
//购物车
Route::get('/cart','Home\ShopCartController@cart');
Route::get('/car','Home\UserConrtoller@car');
//删除购物车
Route::get('/delcart/{id?}','Home\ShopCartController@del');
//商品订单
//Route::post('/order','Home\OrderController@order');
//商品分类
Route::any('/cgood/{id}','Home\UserController@cgoods');
//Route::any('/cgoods/','Home\UserController@cagoods');

//商品订单
Route::post('/orders','Home\OrderController@orders');
Route::get("/shop/order","Home\OrderController@order");
//Route::any('')
//完成订单
Route::get('/end','Home\OrderController@end');
//查看订单
Route::any('/information','Home\OrderController@information');
//取消订单
Route::any('/cancel/{id}','Home\OrderController@cancel');
Route::any('/cancels','Home\OrderController@cancels');

Route::any('/status/{id}','Home\OrderController@status');
Route::any('/statuss','Home\OrderController@statuss');
//后台订单管理
Route::any('/order_list','Admin\OrderController@orderlist');
Route::any('/cancel_list','Admin\OrderController@cancellist');
Route::any('/status_list','Admin\OrderController@statuslist');
Route::any('/status1_list','Admin\OrderController@status1list');
Route::any('/orderUpdate/{id}', 'Admin\OrderController@orderUpdate');
Route::any('/order-Update', 'Admin\OrderController@oUpdate');

/////李莹莹


/////////   王霜

//文章分类首页
Route::get('admin/article/index', 'Admin\ArticleController@indexForm');
//文章分类
Route::get('admin/article/articleAdd', 'Admin\ArticleController@articleAdd');
Route::post('admin/article/articleFormAdd', 'Admin\ArticleController@articleFormAdd');
//添加文章子分类
Route::get('admin/article/aAdd/{id}', 'Admin\ArticleController@aAdd');
//更改
Route::get('admin/article/articleUpdate/{id}', 'Admin\ArticleController@articleUpdate');
Route::post('admin/article/aUpdate', 'Admin\ArticleController@aUpdate');
//删除
Route::get('admin/article/articleDel/{id}', 'Admin\ArticleController@articleDel');

//文章分类
Route::get('admin/article/articleList', 'Admin\ArticleController@articleList');
//文章分类编辑
Route::get('admin/article/aUpd/{id}', 'Admin\ArticleController@aUpd');
Route::post('admin/article/aUp', 'Admin\ArticleController@aUp');
//删除文章
Route::get('admin/article/aDel/{id}', 'Admin\ArticleController@aDel');


//专辑
//专辑管理首页
Route::get('admin/personal/index', 'Admin\PersonalController@indexForm');

//专辑 get
Route::get('admin/personal/personalAdd', 'Admin\PersonalController@personalAdd');
//专辑 post
Route::post('admin/personal/personalFormAdd', 'Admin\PersonalController@personalFormAdd');

//添加专辑里的图片 get
Route::get('admin/personal/pAdd/{id}', 'Admin\PersonalController@pAdd');
//添加专辑里的图片 post
Route::post('admin/personal/pFormAdd', 'Admin\PersonalController@pFormAdd');

// 编辑专辑 右 get
Route::get('admin/personal/personalUpdate/{id}', 'Admin\PersonalController@personalUpdate');
// 编辑专辑 右 post
Route::post('admin/personal/personalUpd', 'Admin\PersonalController@personalUpd');
//删除专辑
Route::get('admin/personal/personalDel/{id}', 'Admin\PersonalController@personalDel');
//详情 连接到 图片首页
Route::get('admin/personal/personalDetail/{id}', 'Admin\PersonalController@personalDetail');

//图片首页
Route::get('admin/picture/pictureIndex', 'Admin\pictureController@pictureIndex');
//添加专辑里的图片 get
Route::get('admin/picture/pictureAdd', 'Admin\pictureController@pictureAdd');
//添加专辑里的图片 post
Route::post('admin/picture/pictureFormAdd', 'Admin\pictureController@pictureFormAdd');

//图片编辑 右 get
Route::get('admin/picture/pictureEdit/{id}', 'Admin\pictureController@pictureEdit');
//图片编辑 右 post
Route::post('admin/picture/picUpd', 'Admin\pictureController@picUpd');
//删除图片
Route::get('admin/picture/pictureDel/{id}', 'Admin\pictureController@pictureDel');


//图片评价界面
Route::get('admin/blog/index', 'Admin\blogController@index');
//评论编辑 右 get
Route::get('admin/blog/blogUpdate/{id}', 'Admin\blogController@blogUpdate');
//评论编辑 右 post
Route::post('admin/blog/blogUpd', 'Admin\blogController@blogUpd');
//删除评论
Route::get('admin/blog/blogDel/{id}', 'Admin\blogController@blogDel');

//图片评价回复界面
Route::get('admin/blog/revert', 'Admin\blogController@revert');
//评论回复编辑 右 get
Route::get('admin/blog/revertUpdate/{id}', 'Admin\blogController@revertUpdate');
//评论回复编辑 右 post
Route::post('admin/blog/revertUpd', 'Admin\blogController@revertUpd');
//删除回复
Route::get('admin/blog/revertDel/{id}', 'Admin\blogController@revertDel');


//标签界面
Route::get('/label/index', 'Admin\labelController@index');
//标签编辑 右 get
Route::get('/label/labelUpdate/{id}', 'Admin\labelController@labelUpdate');
//标签编辑 右 post
Route::post('/label/labelUpd', 'Admin\labelController@labelUpd');
//删除标签
Route::get('/label/labelDel/{id}', 'Admin\labelController@labelDel');

//添加标签 get
Route::get('/labelAdd', 'Admin\labelController@labelAdd');
//添加标签 post
Route::post('/labelFormAdd', 'Admin\labelController@labelFormAdd');

/////////   王霜

//});