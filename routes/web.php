<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home.index');
});
Route::get('/sms-masuk', function () {
    return view('pages.pesan.sms-masuk');
});
Route::get('/sms-keluar', function () {
    return view('pages.pesan.sms-keluar');
});
Route::get('/sms-terkirim', function () {
    return view('pages.pesan.sms-terkirim');
});
Route::get('/email-terkirim', function () {
    return view('pages.pesan.email-terkirim');
});
Route::get('/sms-terjadwal', function () {
    return view('pages.pesan.sms-terjadwal');
});
Route::get('/list-kontak', function () {
    return view('pages.pengaturan.kontak.list-kontak');
});
Route::get('/grup-kontak', function () {
    return view('pages.pengaturan.kontak.grup-kontak');
});
Route::get('/laporan', function () {
    return view('pages.pengaturan.laporan');
});
Route::get('/auto-replay', function () {
    return view('pages.pengaturan.auto-replay');
});
Route::get('/template-sms', function () {
    return view('pages.pengaturan.template-sms');
});
Route::get('/pengaturan-modem', function () {
    return view('pages.pengaturan.pengaturan-modem.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
