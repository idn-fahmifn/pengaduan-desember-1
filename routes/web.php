<?php


use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// untuk mengaksesnya, perlu akun admin

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tanggapan', TanggapanController::class);

});

// grouping khusus untuk route 
Route::prefix('user-area')->group(function () {
    // jika bukan admin, indexnya akan diarahkan ke route berikut : 
    Route::get('/home', [HomeController::class, 'home'])->name('halaman-user');
    // route menyimpan data biodata.
    Route::post('biodata-simpan', [HomeController::class, 'store'])->name('biodata.store');

    // route untuk pengaduan
    Route::resource('pengaduan', PengaduanController::class);

})->middleware('auth');



// Route divisi
Route::resource('divisi', DivisiController::class);





require __DIR__ . '/auth.php';
