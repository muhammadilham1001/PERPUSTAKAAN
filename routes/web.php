<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Login2Controller;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\BukuuserController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\GenreuserController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\HistoryuserController;


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

Route::middleware('hakAdmin')->group(function () {
    Route::get('/','App\Http\Controllers\DashboardController@index')->name('/');
    Route::get('/halaman-buku','App\Http\Controllers\BukuController@index')->name('halaman-buku');
    Route::get('/halaman-pengarang','App\Http\Controllers\PengarangController@index')->name('halaman-pengarang');
    Route::get('/halaman-penerbit','App\Http\Controllers\PenerbitController@index')->name('halaman-penerbit');
    Route::get('/halaman-anggota','App\Http\Controllers\AnggotaController@index')->name('halaman-anggota');
    Route::get('/halaman-peminjam','App\Http\Controllers\PeminjammController@index')->name('halaman-peminjam');
    Route::get('/history-peminjam','App\Http\Controllers\PeminjammController@history')->name('history-peminjam');
    Route::get('/halaman-petugas','App\Http\Controllers\PetugasController@index')->name('halaman-petugas');
    Route::get('/halaman-genre','App\Http\Controllers\GenreController@index')->name('halaman-genre');

    // tambah
    Route::get('/tambah-buku','App\Http\Controllers\BukuController@create')->name('tambah-buku');
    Route::get('/tambah-pengarang','App\Http\Controllers\PengarangController@create')->name('tambah-pengarang');
    Route::get('/tambah-penerbit','App\Http\Controllers\PenerbitController@create')->name('tambah-penerbit');
    Route::get('/tambah-peminjam','App\Http\Controllers\PeminjammController@create')->name('tambah-peminjam');
    Route::get('/tambah-anggota','App\Http\Controllers\AnggotaController@create')->name('tambah-anggota');
    Route::get('/tambah-genre','App\Http\Controllers\GenreController@create')->name('tambah-genre');

    // edit
    Route::get('/edit-buku/{id}','App\Http\Controllers\BukuController@edit')->name('edit-buku');
    Route::get('/edit-pengarang/{id}','App\Http\Controllers\PengarangController@edit')->name('edit-pengarang');
    Route::get('/edit-penerbit/{id}','App\Http\Controllers\PenerbitController@edit')->name('edit-penerbit');
    Route::get('/edit-peminjam/{id}','App\Http\Controllers\PeminjammController@edit')->name('edit-peminjam');
    Route::get('/edit-anggota/{id}','App\Http\Controllers\AnggotaController@edit')->name('edit-anggota');
    Route::get('/edit-genre/{id}','App\Http\Controllers\GenreController@edit')->name('edit-genre');
});

Route::middleware('hakAkses')->group(function () {
    Route::get('/dashboard-client','App\Http\Controllers\Dashboard2Controller@index')->name('/dashboard-client');
    Route::get('/buku','App\Http\Controllers\BukuuserController@index')->name('buku');
    Route::get('/genre','App\Http\Controllers\GenreuserController@index')->name('genre');
    Route::get('/history','App\Http\Controllers\HistoryuserController@index')->name('history');
});
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/single-katalog', [Katalog2Controller::class, 'index'])->name('single-katalog');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/hubungi', [HubungiController::class, 'index'])->name('hubungi');


Route::get('/login2', [Login2Controller::class, 'login'])->name('login2');
// Controller buku



Route::post('/simpan-buku','App\Http\Controllers\BukuController@store')->name('simpan-buku');



Route::put('/update-buku/{id}','App\Http\Controllers\BukuController@update')->name('update-buku');

Route::delete('/delete-buku/{id}','App\Http\Controllers\BukuController@destroy')->name('delete-buku');


// Controller pengarang



Route::post('/simpan-pengarang','App\Http\Controllers\PengarangController@store')->name('simpan-pengarang');


Route::put('/update-pengarang/{id}','App\Http\Controllers\PengarangController@update')->name('update-pengarang');

Route::delete('/delete-pengarang/{id}','App\Http\Controllers\PengarangController@destroy')->name('delete-pengarang');


// controller karya pengarang
Route::get('/halaman-karya-pengarang','App\Http\Controllers\KaryaController@index')->name('halaman-karya-pengarang');

Route::get('/tambah-karya-pengarang','App\Http\Controllers\KaryaController@create')->name('tambah-karya-pengarang');

Route::post('/simpan-karya-pengarang','App\Http\Controllers\KaryaController@store')->name('simpan-karya-pengarang');

Route::get('/edit-karya-pengarang/{id}','App\Http\Controllers\KaryaController@edit')->name('edit-karya-pengarang');

Route::post('/update-karya-pengarang/{id}','App\Http\Controllers\KaryaController@update')->name('update-karya-pengarang');


// controller penerbit


Route::post('/simpan-penerbit','App\Http\Controllers\PenerbitController@store')->name('simpan-penerbit');



Route::put('/update-penerbit/{id}','App\Http\Controllers\PenerbitController@update')->name('update-penerbit');

Route::delete('/delete-penerbit/{id}','App\Http\Controllers\PenerbitController@destroy')->name('delete-penerbit');


// controller anggota



Route::post('/simpan-anggota','App\Http\Controllers\AnggotaController@store')->name('simpan-anggota');



Route::put('/update-anggota/{id}','App\Http\Controllers\AnggotaController@update')->name('update-anggota');

Route::delete('/delete-anggota/{id}','App\Http\Controllers\AnggotaController@destroy')->name('delete-anggota');

Route::resource('/anggota', App\Http\Controllers\AnggotaController::class);



// controller peminjam


Route::post('/simpan-peminjam','App\Http\Controllers\PeminjammController@store')->name('simpan-peminjam');

Route::put('/update-peminjam/{id}','lo\Http\Controllers\PeminjammController@update')->name('update-peminjam');

Route::put('/selesai-peminjam/{id}','App\Http\Controllers\PeminjammController@done')->name('selesai-peminjam');

Route::delete('/delete-peminjam/{id}','App\Http\Controllers\PeminjammController@destroy')->name('delete-peminjam');

Route::resource('/peminjam', PeminjamController::class);



// controller login and register
Route::get('/log', [LoginController::class, 'login'])->name('login');

Route::post('/loginUser', [LoginController::class, 'loginUser'])->name('loginUser');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset', [LoginController::class, 'reset'])->name('reset');

Route::post('/resetUser', [LoginController::class, 'resetUser'])->name('resetUser');



// controller petugas

Route::delete('/delete-petugas/{id}','App\Http\Controllers\PetugasController@destroy')->name('delete-petugas');



// controller genre



Route::post('/simpan-genre','App\Http\Controllers\GenreController@store')->name('simpan-genre');


Route::put('/update-genre/{id}','App\Http\Controllers\GenreController@update')->name('update-genre');

Route::delete('/delete-genre/{id}','App\Http\Controllers\GenreController@destroy')->name('delete-genre');



