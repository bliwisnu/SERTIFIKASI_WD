    <?php

    use App\Http\Controllers\AlatController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\SewaController;
    use App\Http\Controllers\UpdateUserController;
    use App\Http\Controllers\VerifController;
    use App\Models\AlatModel;
    use App\Models\Kategori;
    use App\Models\PeminjamanModel;
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

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/', function () {
            return redirect('login');
        });
        Route::get('/login', function () {
            return view('verif.login');
        })->name('login');
        Route::get('/forgetPassword', function () {
            return view('verif.forgetPassword');
        });
        Route::post('/forget/store', [VerifController::class, 'forget']);
        Route::get('/register', [VerifController::class, 'registerPage']);
        Route::post('/register/store', [VerifController::class, 'registerStore']);
        Route::post('/login/store', [VerifController::class, 'loginStore']);
    });

    Route::group(['middleware' => 'auth'], function () {

        // General
        Route::get('/delete/{id}', [VerifController::class, 'delete_user']);
        Route::get('/logout', [VerifController::class, 'logout']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/dataPenyewaan', function () {
            $peminjaman = PeminjamanModel::all();
            return view('user.DataPenyewaan', compact('peminjaman'));
        });
        Route::get('/sewaAlat/{id}', function ($id) {
            $detailAlat = AlatModel::find($id);
            return view('user.SewaAlat', compact('detailAlat'));
        });
        Route::get('/listOrder', function () {
            $peminjaman = PeminjamanModel::all();
            return view('user.listOrder', compact('peminjaman'));
        });


        // Admin & User
        // Route::post('/update-user/{id}', [ProfileController::class,'updateUser']);
        Route::post('/update-profile/{id}', [ProfileController::class, 'editProfile']);
        Route::put('/update-profile/{id}', [ProfileController::class, 'editProfile']);


        // Admin
        Route::get('/EditUser/{id}', [UpdateUserController::class, "editUserPage"]);
        Route::put('/update-user/{id}', [UpdateUserController::class, 'updateUser']);
        Route::get('/tambah/user', function () {
            return view('user.TambahUser');
        });
        Route::post('/tambahUser/store', [ProfileController::class, 'createUser']);


        // Kategori
        Route::get('/daftarKategori', function () {
            $semuaKategori = Kategori::all();
            return view('kategori.daftarKategori', compact(['semuaKategori']));
        });
        Route::get('/tambahKategori', function () {
            return view('kategori.tambahKategori');
        });
        Route::put('/update-kategori/{id}', [KategoriController::class, 'editKategoriStore']);
        Route::post('/tambahKategori/store', [KategoriController::class, 'tambahKategori']);
        Route::get('/editKategori/{id}', [KategoriController::class, "editKategori_page"]);
        Route::get('/hapusKategori/{id}', [KategoriController::class, "destroyKategori"]);

        // Barang
        Route::get('/tambahBarang', function () {
            $semuaKategori = Kategori::all();
            return view('barang.tambahBarang', compact(['semuaKategori']));
        });
        Route::get('/daftarBarang', function () {
            $semuaBarang = AlatModel::all();
            return view('barang.daftarBarang', compact(['semuaBarang']));
        });
        Route::get('/editBarang/{id}', function ($id) {
            $detailBarang = AlatModel::find($id);
            return view('barang.editBarang', compact(['detailBarang']));
        });
        Route::post('/tambahBarang/store', [AlatController::class, 'tambahBarangStore']);
        Route::get('/hapusBarang/{id}', [AlatController::class, 'destroy']);

        Route::get('/dataPeminjaman', [SewaController::class, 'showPeminjamanPage']);
        Route::post('/peminjaman/{id}', [SewaController::class, 'sentPeminjaman']);

        Route::post('/ubahStatus/{id}', [SewaController::class, 'mengubahStatusStore']);
    });
