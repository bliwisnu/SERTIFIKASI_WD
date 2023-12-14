    <?php

    use App\Http\Controllers\AlatController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\ProfileController;
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
            return view('user.DataPenyewaan');
        });

        // Admin & Ueer
        Route::post('/update-profile/{id}', [ProfileController::class, 'editProfile']);
        Route::put('/update-profile/{id}', [ProfileController::class, 'editProfile']);

        // Admin
        Route::get('/EditUser/{id}', [ProfileController::class, "editUserPage"]);
        // Route::post('/update-user/{id}', [ProfileController::class,'updateUser']);
        Route::put('/update-user/{id}', [ProfileController::class, 'updateUser']);

        Route::get('/tambah/user', function () {
            return view('user.TambahUser');
        });
        Route::post('/tambahUser/store', [ProfileController::class,'createUser']);
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
        Route::get('/editBarang/{id}', function ($id) {
            $detailBarang = AlatModel::find($id);
            return view('barang.editBarang', compact(['detailBarang']));
        });
        Route::get('/daftarBarang', function () {
            $semuaBarang = AlatModel::all();
            return view('barang.daftarBarang', compact(['semuaBarang']));
        });
        Route::get('/hapusBarang/{id}', [AlatController::class, 'destroy']);
        Route::post('/tambahKategori/store', [KategoriController::class, 'tambahKategori']);
        Route::get('/editKategori/{id}', [KategoriController::class, "editKategori_page"]);
        Route::get('/hapusKategori/{id}', [KategoriController::class, "destroyKategori"]);
    });
