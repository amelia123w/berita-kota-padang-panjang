<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OPDController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PadangpanjangtvController;
use App\Http\Controllers\Admin\KlipingController;
use App\Http\Controllers\Admin\MajalahController;
use App\Http\Controllers\Admin\BulletinController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\LandingPageController;
use App\Models\Berita;



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

//Clear All:
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Berhasil dibersihkan</h1>';
});

Route::get('/', function () {
    return view('welcome');
});

//landingpage berita
Route::get('/', [LandingPageController::class, 'index']);

Route::get('/berita', function () {
    $berita = Berita::all();
    return view('berita.index', compact('berita'));
});

// Authentication
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/keluar', [HomeController::class, 'keluar']);
Route::get('/admin/home', [HomeController::class, 'index']);
Route::get('/admin/home/filter/{id}', [HomeController::class, 'index_filter']);
Route::get('/admin/change', [HomeController::class, 'change']);
Route::post('/admin/change_password', [HomeController::class, 'change_password']);
Route::get('/invoice/{id}', [HomepageController::class, 'invoice']);
Route::get('/cetak/{id}', [HomepageController::class, 'cetak']);

///OPD
Route::prefix('admin/opd')->name('admin.opd.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [OPDController::class, 'read'])->name('read');
    Route::get('/add', [OPDController::class, 'add'])->name('add');
    Route::post('/create', [OPDController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [OPDController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [OPDController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [OPDController::class, 'delete'])->name('delete');
});

///Berita
Route::prefix('admin/berita')->name('admin.berita.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [BeritaController::class, 'read'])->name('read');
    Route::get('/add', [BeritaController::class, 'add'])->name('add');
    Route::post('/create', [BeritaController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [BeritaController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [BeritaController::class, 'delete'])->name('delete');
});

//Padangpanjangtv
Route::prefix('admin/padangpanjangtv')->name('admin.padangpanjangtv.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [PadangpanjangtvController::class, 'read'])->name('read');
    Route::get('/add', [PadangpanjangtvController::class, 'add'])->name('add');
    Route::post('/create', [PadangpanjangtvController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [PadangpanjangtvController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [PadangpanjangtvController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [PadangpanjangtvController::class, 'delete'])->name('delete');
});

//Kliping
Route::prefix('admin/kliping')->name('admin.kliping.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [KlipingController::class, 'read'])->name('read');
    Route::get('/add', [KlipingController::class, 'add'])->name('add');
    Route::post('/create', [KlipingController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [KlipingController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KlipingController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [KlipingController::class, 'delete'])->name('delete');
});

//Majalah
Route::prefix('admin/majalah')->name('admin.majalah.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [MajalahController::class, 'read'])->name('read');
    Route::get('/add', [MajalahController::class, 'add'])->name('add');
    Route::post('/create', [MajalahController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [MajalahController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [MajalahController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [MajalahController::class, 'delete'])->name('delete');
});


//bulletin
Route::prefix('admin/bulletin')->name('admin.bulletin.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [BulletinController::class, 'read'])->name('read');
    Route::get('/add', [BulletinController::class, 'add'])->name('add');
    Route::post('/create', [BulletinController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [BulletinController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [BulletinController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [BulletinController::class, 'delete'])->name('delete');
});


///Account
Route::prefix('admin/account')->name('admin.account.')->middleware('cekLevel:1 2 3')->group(function () {
    Route::get('/', [AccountController::class, 'read'])->name('read');
    Route::get('/add', [AccountController::class, 'add'])->name('add');
    Route::post('/create', [AccountController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AccountController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [AccountController::class, 'reset'])->name('reset');
});
