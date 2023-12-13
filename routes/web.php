<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\VerifController;
use App\Models\AlatModel;
use App\Models\Kategori;
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
    return view('dashboard', compact(['countUsers', 'allUsers']));
});

Route::get('/delete/{id}', [VerifController::class, 'delete_user']);

Route::get('/login', function () {
    return view('verif.login');
});

Route::get('/forgetPassword', function () {
    return view('verif.forgetPassword');
});

Route::post('/forget/store', [VerifController::class,'forget']);

Route::get('/tambahKategori', function () {
    return view('kategori.tambahKategori');
});

Route::get('/daftarKategori', function () {
    $semuaKategori = Kategori::all();
    return view('kategori.daftarKategori', compact(['semuaKategori']));
});

Route::get('/tambahBarang', function () {
    return view('barang.tambahBarang');
});
Route::post('/tambahBarang/store', [AlatController::class, 'tambahBarangStore']);
Route::post('/tambahBarang/store', [AlatController::class, 'tambahBarangStore']);

Route::get('/editBarang/{id}', function ($id) {
    $detailBarang = AlatModel::find($id);
    return view('barang.editBarang', compact(['detailBarang']));
});

Route::get('/daftarBarang', function () {
    $semuaBarang = AlatModel::all();
    return view('barang.daftarBarang', compact(['semuaBarang']));
});
Route::get('/hapusBarang/{id}', [AlatController::class, 'destroy']);

Route::get('/register', [VerifController::class, 'registerPage']);
Route::post('/register/store', [VerifController::class, 'registerStore']);
Route::post('/login/store', [VerifController::class, 'loginStore']);

Route::post('/tambahKategori/store', [KategoriController::class, 'tambahKategori']);
Route::get('/editKategori/{id}', [KategoriController::class, "editKategori_page"]);
Route::get('/hapusKategori/{id}', [KategoriController::class, "destroyKategori"]);
