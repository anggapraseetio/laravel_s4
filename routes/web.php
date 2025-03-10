<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Acontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\HomeController;  
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;
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

Route::get('/hom', function () {
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

Route::get('/acara7', function() {
    return view('frontend.home');
});

Route::resource('/acara8', DashboardController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['namespace' => 'App\Http\Controllers\Backend'], function(){
//     Route::resource('dashboard', 'DashboardController');
//     Route::resource('pendidikan', 'PendidikanController');
//     Route::resource('pengalaman_kerja', 'PengalamanKerjaController');
// });
    //ACARA 13-16
    Route::group(['namespace' => 'App\Http\Controllers\Backend'], function()  
{  
    Route::resource('dash', DashboardController::class);  
    Route::resource('/pendidikan', PendidikanController::class);  
    Route::resource('/pengalaman_kerja', PengalamanKerjaController::class);  
});

//acara 17 dan 18
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
//Route::get('/cobaerror', [CobaController::class, 'index']);
Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);

//acara 19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

//acara 20
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');