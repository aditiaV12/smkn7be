<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritacontroller ;
use App\Http\Controllers\kepsekcontroller ;
use App\Http\Controllers\staffcontroller ;
use App\Http\Controllers\aboutcontroller ;
use App\Http\Controllers\sarprascontroller ;
use App\Http\Controllers\kategoricontroller ;
use App\Http\Controllers\eskulcontroller ;
use App\Http\Controllers\homeController ;
use App\Http\Controllers\staff_kategoricontroller as s_kategori ;

use App\Http\Controllers\UserController ;
use App\Http\Controllers\LoginController ;
use App\Models\berita;
use GuzzleHttp\Middleware;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// guest
Route::get('/',[homeController::class,'index']);
Route::get('/berita',[beritacontroller::class,'posts']);
Route::get('/berita/{berita:slug}',[beritacontroller::class,'blog']);
Route::get('/sarana',[sarprascontroller::class,'posts']);
Route::get('/sarana/{sarpras:slug}',[sarprascontroller::class,'sarana']);
Route::get('/sambutan',[kepsekcontroller::class,'sambutan']);
Route::get('/about',[aboutcontroller::class,'about']);
Route::get('/staff',[staffcontroller::class,'staff']);





// auth
Route::get('/dashboard', function () {
    return view('admin.index',[
        'judul'=>'Dashboard',
        'berita'=>berita::orderBy('id','desc')->paginate(3)
    ]);
})->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login-post',[LoginController::class ,'authenticate']);
Route::post('/logout',[LoginController::class ,'logout']);
Route::resource('dashboard/berita',beritacontroller::class,[
    'link'=>'Berita'
])->middleware('auth');
Route::resource('dashboard/jabatan',s_kategori::class)->middleware('auth');
Route::resource('dashboard/admin',UserController::class)->middleware('auth');
Route::resource('dashboard/eskul',eskulcontroller::class)->middleware('auth');
Route::resource('dashboard/kategori',kategoricontroller::class)->middleware('auth');
Route::resource('dashboard/staff',staffcontroller::class)->middleware('auth');
Route::resource('dashboard/kepsek',kepsekcontroller::class)->middleware('auth');
Route::resource('dashboard/about',aboutcontroller::class)->middleware('auth');
Route::resource('dashboard/sarpras',sarprascontroller::class)->middleware('auth');