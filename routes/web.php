<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('foo', function () {
    return view('Hello Word');
});

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('posts/{post}/comments/{comment}', function($postId, $commentsId){
    return 'post '.$postId. ' komen '.$commentsId;
});

Route::get('/user', 'UserController@index');
Route::get('/user', [UserController::class, 'index']);

Route::match(['get', 'post'], '/', function(){
//
});

Route::any( '/', function(){
    //
});

Route::redirect('/here', '/there');
Route::redirect('/here', '/there', 301);

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route::get('user/{name?}', function($name=null){
    return $name;
});
Route::get('pengguna/{name?}', function($name='Angga'){
    return $name;
});

Route::get('user/{name}', function($name){
    //
})->where('name', '[A-Za-z]+');
Route::get('user/{id}', function($id){
    //
})->where('id', '[0-9]+');
Route::get('user/{id}/{name}', function($id,$name){
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
