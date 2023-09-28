<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Pages\Createsurat;
use App\Http\Livewire\Pages\Detailsurat;
use App\Http\Livewire\Pages\Dokumentasi;
use App\Http\Livewire\Pages\Editsurat;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Profile;
use App\Http\Livewire\Pages\Setting\Kategori;
use App\Http\Livewire\Pages\Setting\Unit;
use App\Http\Livewire\Pages\Setting\User;
use App\Http\Livewire\Pages\Surat;
use App\Http\Livewire\Setting\Role;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/surat', Surat::class)->name('surat');
    Route::get('/surat/{surat}', Detailsurat::class)->name('detailsurat');
    Route::get('/surat/{surat}/edit', Editsurat::class)->name('editsurat');
    Route::get('/dokumentasi', \App\Http\Livewire\Pages\Dokumentasi\Index::class)->name('dokumentasi.index');
    Route::get('/createsurat', Createsurat::class)->name('createsurat');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/setting/kategori', Kategori::class)->name('setting.kategori');
    Route::get('/setting/unit', Unit::class)->name('setting.unit');
    Route::get('/setting/user', User::class)->name('setting.user');
    Route::get('/setting/role', Role::class)->name('setting.role');
});