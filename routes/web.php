<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\VerifController;
use App\Models\User;
use App\Models\VerifModel;
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
    $countUsers = VerifModel::count();
    $allUsers = VerifModel::all();
    return view('dashboard', compact(['countUsers','allUsers']));
});

Route::get('/login', function () {
    return view('verif.login');
});

Route::get('/forgetPassword', function () {
    return view('verif.forgetPassword');
});

Route::get('/tambahKategori', function () {
    return view('kategori.tambahKategori');
});

Route::get('/register', [VerifController::class,'registerPage']);
Route::post('/register/store', [VerifController::class, 'registerStore']);
Route::post('/login/store', [VerifController::class, 'loginStore']);

Route::post('/tambahKategori/store', [KategoriController::class,'tambahKategori']);
