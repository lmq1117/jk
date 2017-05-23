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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test','WechatSdkTestController@test');
Route::any('/wechat/yanzheng','WechatSdkTestController@yanzheng');
Route::get('wechat/menu','WechatSdkTestController@showMenu');
Route::get('wechat/addmenu','WechatSdkTestController@addMenu');
