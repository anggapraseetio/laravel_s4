<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Acontroller;
use Illuminate\Support\Facades\Route;

//route dasar menampilkan view
Route::get('/', function () {
    return view('welcome');
});   

Route::get('/foo', function () {
    return view('word');
});

Route::get('/blog', function () {
    //ambil data dari database
    $profil = "aku seorang programmer";
    return view('word', ['data'=> $profil ]);
});

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//route parameter
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('posts/{post}/comments/{comment}', function($postId, $commentsId){
    return 'post '.$postId. ' komen '.$commentsId;
});

Route::get('/blog/{$id}', function(Request $request){
    return 'ini adalah blog '.$request->id;
});

//named route
//redirect ke halaman lain
Route::get('/blog', function () {
    $profil = "aku seorang programmer";
    return view('word', ['data'=> $profil ]);
})->name('redir');

Route::get('/blog/{$id}', function(Request $request){
    Route::redirect()->route('redir');
});

//controlller
Route::get('/a', [Acontroller::class, 'index']);

///
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
