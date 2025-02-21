<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Acontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\HomeController;  
use Illuminate\Support\Facades\Route;

//route dasar menampilkan view
Route::get('/', function () {
    return view('welcome');
});   

// Route::get('/foo', function () {
//     return view('word');
// });

// Route::get('/blog', function () {
//     //ambil data dari database
//     $profil = "aku seorang programmer";
//     return view('word', ['data'=> $profil ]);
// });

// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// //route parameter
// Route::get('/user/{id}', function ($id) {
//     return 'User '.$id;
// });

// Route::get('posts/{post}/comments/{comment}', function($postId, $commentsId){
//     return 'post '.$postId. ' komen '.$commentsId;
// });

// Route::get('/blog/{$id}', function(Request $request){
//     return 'ini adalah blog '.$request->id;
// });

// //named route
// //redirect ke halaman lain
// Route::get('/blog', function () {
//     $profil = "aku seorang programmer";
//     return view('word', ['data'=> $profil ]);
// })->name('redir');

// Route::get('/blog/{$id}', function(Request $request){
//     Route::redirect()->route('redir');
// });

// //controlller
// Route::get('/a', [Acontroller::class, 'index']);

// ///
// Route::get('user/{name?}', function($name=null){
//     return $name;
// });
// Route::get('pengguna/{name?}', function($name='Angga'){
//     return $name;
// });

// Route::get('user/{name}', function($name){
//     //
// })->where('name', '[A-Za-z]+');
// Route::get('user/{id}', function($id){
//     //
// })->where('id', '[0-9]+');
// Route::get('user/{id}/{name}', function($id,$name){
//     //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//===ROUTE GROUP CARA PERTAMA===
Route::prefix('/user')->group(function(){

    Route::get('/pendaftaran',function(){
        return 'HALAMAN PENDAFTARAN';
    })->name('mhs.pendaftaran');

    Route::get('/profile',function(){
        return 'HALAMAN PROFILE';
    })->name('mhs.profile');

    Route::get('/nilai',function(){
        return 'HALAMAN NILAI';
    })->name('mhs.nilai');
});

//===ROUTE GROUP CARA KEDUA===
Route::group(['prefix' => '/mahasiswa', 'as' => 'mhs.', 'middleware'=>"auth"],function(){

    Route::get('/pendaftaran',function(){
        return 'HALAMAN PENDAFTARAN';
    })->name('pendaftaran');

    Route::get('/profile',function(){
        return 'HALAMAN PROFILE';
    })->name('profile');

    Route::get('/nilai',function(){
        return 'HALAMAN NILAI';
    })->name('nilai');
});

Route::get('/home', function () {
    return view('home');
}); 

Route::get('/login', function () {
    return 'ANDA BELUM LOGIN';
})->name('login');

//Controller
Route::get('/profil', [ProfileController::class, 'index']);

//acara 6
Route::get('/dashboard', [ProfileController::class, 'index']);
// Route::get("/dashboard", function(){
//     return view('dashboard');
// });

Route::resource('/acara7', HomeController::class);

Route::get('/cobalagi', function() {
    return view('frontend.home');
});