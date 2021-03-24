<?php

require __DIR__.'/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutboxController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SMSController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('sms.')->prefix('sms')->group(function () {
    Route::get('pulsa', [SMSController::class, 'credit'])->name('credit');
    Route::post('send', [SMSController::class, 'send'])->name('send');
    Route::post('group', [SMSController::class, 'group'])->name('group');
    Route::get('pesan-baru', [SMSController::class, 'index'])->name('index');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('kontak', CustomerController::class);
Route::resource('pesan', OutboxController::class)->except(['update', 'destroy']);
Route::resource('template', TemplateController::class);
Route::resource('grup-kontak', GroupController::class);

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
Route::get('/laporan', function () {
    return view('pages.pengaturan.laporan');
});
Route::get('/auto-replay', function () {
    return view('pages.pengaturan.auto-replay');
});
Route::get('/pengaturan-modem', function () {
    return view('pages.pengaturan.pengaturan-modem.index');
});

Route::get('api', [OutboxController::class, 'getApi'])->name('api');
Route::get('token', [OutboxController::class, 'getToken'])->name('token');
