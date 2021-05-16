<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/anasayfa', 'App\Http\Controllers\front\HomeController@index');
Route::get('/admin', 'App\Http\Controllers\admin\HomeController@index');
Route::get('/urun/{id}', 'App\Http\Controllers\front\HomeController@urun');

Route::get('/admin/urunler', 'App\Http\Controllers\admin\UrunController@index');
Route::get('/admin/urun/edit/{id}', 'App\Http\Controllers\admin\UrunController@edit');
Route::get('/admin/urun/delete/{id}', 'App\Http\Controllers\admin\UrunController@destroy');
Route::get('/admin/urun/show/{id}', 'App\Http\Controllers\admin\UrunController@show');
Route::post('/admin/urun/kaydet', 'App\Http\Controllers\admin\UrunController@store');
Route::get('/admin/urun/ekle', 'App\Http\Controllers\admin\UrunController@create');
Route::post('/admin/urun/update/{id}', 'App\Http\Controllers\admin\UrunController@update');

Route::get('/admin/urun/resimler/{id}', 'App\Http\Controllers\admin\UrunController@resimlerform');
Route::post('/admin/urun/resimler/{id}', 'App\Http\Controllers\admin\UrunController@resim_ekle');
Route::get('/admin/urun/resim_sil/{id}/{tshirt_id}', 'App\Http\Controllers\admin\UrunController@resim_sil');
Route::get('/urun/yorumgonder/{id}', 'App\Http\Controllers\front\HomeController@yorumekle');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin login tarafı
Route::get('/admin/login', 'App\Http\Controllers\admin\LoginController@index')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\admin\LoginController@login')->name('admin.login');
Route::get('/admin/logout', 'App\Http\Controllers\admin\LoginController@logout')->name('admin.logout');
Route::get('/admin/register', 'App\Http\Controllers\admin\LoginController@register')->name('admin.register');
Route::post('/admin/register', 'App\Http\Controllers\admin\LoginController@register_save')->name('admin.register');

//user login
Route::get('/user/login', 'App\Http\Controllers\front\LoginController@index')->name('login');
Route::post('/user/login', 'App\Http\Controllers\front\LoginController@login')->name('login');

Route::get('/user/register', 'App\Http\Controllers\front\LoginController@register')->name('register');
Route::post('/user/register', 'App\Http\Controllers\front\LoginController@register_save')->name('register');

Route::get('/user/logout', 'App\Http\Controllers\front\LoginController@logout')->name('logout');


Route::get('/user/profile', 'App\Http\Controllers\front\UserController@index')->name('user');

Route::post('/user/kisisel/save', 'App\Http\Controllers\front\UserController@kisisel_save');
Route::post('/user/adres/save', 'App\Http\Controllers\front\UserController@adres_save');
Route::post('/user/kart/save', 'App\Http\Controllers\front\UserController@kart_save');


Route::get('/user/favorilerim', 'App\Http\Controllers\front\UserController@favorindex');
Route::get('/user/siparislerim', 'App\Http\Controllers\front\UserController@siparisindex');
Route::get('/user/mesajlarim', 'App\Http\Controllers\front\UserController@mesajindex');
Route::get('/user/yorumlarim', 'App\Http\Controllers\front\UserController@yorumindex');
Route::get('/yorum-sil/{id}', 'App\Http\Controllers\front\UserController@yorumsil');
Route::get('/user/kart', 'App\Http\Controllers\front\UserController@kartindex');

Route::get('/favori-ekle/{id}', 'App\Http\Controllers\front\HomeController@favori_ekle');
Route::get('/favori-sil/{id}', 'App\Http\Controllers\front\HomeController@favori_sil');

Route::get('/user/sepetim', 'App\Http\Controllers\front\UserController@sepetindex');
Route::post('/urun/sepete-ekle/{id}', 'App\Http\Controllers\front\UserController@sepete_ekle');
Route::get('/sepet-sil/{id}', 'App\Http\Controllers\front\UserController@sepet_sil');

Route::post('/siparis-ekle', 'App\Http\Controllers\front\UserController@siparis_ekle');
Route::post('/mesaj-gonder', 'App\Http\Controllers\front\UserController@mesaj_ekle');
Route::get('/mesaj-sil/{id}', 'App\Http\Controllers\front\UserController@mesaj_sil');

//reset password
Route::post('reset_password_without_token', 'App\Http\Controllers\AccountController@validatePasswordRequest');
Route::post('reset_password_with_token', 'App\Http\Controllers\AccountController@resetPassword');


Route::get('/kategoriler/{id}', 'App\Http\Controllers\front\HomeController@get_kategori');
Route::get('/markalar/{id}', 'App\Http\Controllers\front\HomeController@get_marka');


//admin panel controller
Route::get('/admin/siparisler', 'App\Http\Controllers\admin\PanelController@siparisindex');
Route::get('/admin/siparis/detay/{id}', 'App\Http\Controllers\admin\PanelController@siparis_detay');
Route::get('/admin/siparis-onayla/{id}', 'App\Http\Controllers\admin\PanelController@siparis_onayla');
Route::get('/admin/mesajlar', 'App\Http\Controllers\admin\PanelController@mesajindex');
Route::get('/mesaj-detay/{id}', 'App\Http\Controllers\admin\PanelController@mesaj_detay');
Route::post('/mesajyanitla', 'App\Http\Controllers\admin\PanelController@mesaj_yanitla');
Route::get('/admin/uyeler', 'App\Http\Controllers\admin\PanelController@uyelerindex');
Route::get('/user/{id}', 'App\Http\Controllers\admin\PanelController@get_user');
Route::post('/profil-guncelle', 'App\Http\Controllers\admin\PanelController@profil_guncelle');
Route::get('/admin/yorumlar', 'App\Http\Controllers\admin\PanelController@yorumlarindex');
Route::get('/user/delete/{id}', 'App\Http\Controllers\admin\PanelController@user_delete');