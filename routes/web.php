<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','IndexController@index');

//文件上传路由
//Route::any('upload','CommonController@upload') ;
Route::any('upload','CommonController@myUpload') ;
Route::match(['get','post'],'admin/login','Admin\LoginController@login') ;
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'],function (){
    Route::get('index','LoginController@index') ;
    Route::get('welcome','LoginController@welcome') ;
    Route::get('logout','LoginController@logout') ;
    Route::get('flush','LoginController@flush');//清除缓存

    //图片管理
    Route::resource('slider','SliderController') ;

    //产品管理
    Route::resource('product','ProductController') ;

    //产品分类管理
    Route::resource('category','CategoryController') ;

    //订单管理
    Route::get('orders','OrdersController@index') ;
    Route::get('ordersDetail','OrdersController@ordersDetail') ;
    Route::get('ordersAddress','OrdersController@ordersAddress') ;
    Route::any('ordersEdit','OrdersController@ordersEdit') ;


    //评论管理
    Route::resource('comment','CommentController') ;

    //会员管理
    Route::group(['prefix'=>'user'],function (){
        Route::get('userStop/{id}','UserController@userStop') ;
        Route::get('userStart/{id}','UserController@userStart') ;
        Route::get('userDelList','UserController@userDelList') ;
        Route::get('userDeleteDo/{id}','UserController@userDeleteDo') ;
        Route::get('userRestore/{id}','UserController@userRestore') ;
        Route::get('changePwd/{id}','UserController@changePwd') ;
        Route::post('changePwd/{id}','UserController@changePwdDo') ;
    }) ;
    Route::resource('user','UserController') ;

    //管理员管理
    Route::group(['prefix'=>'manager'],function (){
        Route::get('adminRole','ManagerController@adminRole') ;
        Route::get('adminPermission','ManagerController@adminPermission') ;
        Route::get('adminList','ManagerController@adminList') ;
    }) ;

    //系统管理
    Route::group(['prefix'=>'system'],function (){
        Route::resource('config','ConfigController') ;
    }) ;
}) ;



Route::group(['prefix'=>'home','namespace'=>'Home'],function (){
    Route::get('/','LoginController@index') ;
    Route::match(['get','post'],'login','LoginController@login') ;
    Route::get('register','LoginController@register') ;
    Route::get('send','LoginController@send') ;
    Route::get('lookforward','LoginController@lookforward') ;
    Route::get('logout','LoginController@logout') ;
    Route::get('cart','CartController@index') ;
    Route::get('addCart','CartController@addCart') ;
    Route::get('changeCartNum','CartController@changeCartNum') ;
    Route::get('delCartItem','CartController@delCartItem') ;//删除当前行
    Route::get('delCartItems','CartController@delCartItems') ;//删除选中行

    Route::group(['middleware'=>'home.login'],function (){
        Route::get('orderConfirm','CartController@orderConfirm') ;//结算
        Route::get('myOrder','CartController@myOrder') ;

        Route::get('address','CartController@address') ;
        Route::get('addressUpdate','CartController@addressUpdate') ;
        Route::post('addressSave','CartController@addressSave') ;
        Route::post('payment','CartController@payment') ;
        Route::post('paySuccess','CartController@paySuccess') ;
    }) ;

    Route::group(['prefix'=>'study'],function(){
        Route::get('studyarticle','StudyController@index');
        Route::get('studyarticle-list-{id}','StudyController@list') ;
        Route::get('studyarticle-details-{id}','StudyController@show') ;
    }) ;

    Route::group(['prefix'=>'food'],function(){
        Route::get('foodarticle','FoodController@index') ;
    }) ;
}) ;





