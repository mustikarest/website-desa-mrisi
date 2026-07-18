<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return redirect('/admin/index');
})->middleware(['auth', 'verified']);

Route::get('/admin/{page}', function ($page) {
    $view = 'admin.' . $page;
    abort_unless(View::exists($view), 404);
    return view($view);
})->where('page', '[A-Za-z0-9\-]+')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/profil-desa', [ProfilDesaController::class, 'index'])->name('profil-desa.index');
Route::get('/profil-desa/{profilDesa}', [ProfilDesaController::class, 'show'])->name('profil-desa.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profil-desa/create', [ProfilDesaController::class, 'create'])->name('profil-desa.create');
    Route::post('/admin/profil-desa', [ProfilDesaController::class, 'store'])->name('profil-desa.store');
    Route::get('/admin/profil-desa/{profilDesa}/edit', [ProfilDesaController::class, 'edit'])->name('profil-desa.edit');
    Route::put('/admin/profil-desa/{profilDesa}', [ProfilDesaController::class, 'update'])->name('profil-desa.update');
    Route::delete('/admin/profil-desa/{profilDesa}', [ProfilDesaController::class, 'destroy'])->name('profil-desa.destroy');
});

//Dusun
Route::get('/dusun', [DusunController::class, 'index'])->name('dusun.index');
Route::get('/dusun/{dusun}', [DusunController::class, 'show'])->name('dusun.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dusun/create', [DusunController::class, 'create'])->name('dusun.create');
    Route::post('/admin/dusun', [DusunController::class, 'store'])->name('dusun.store');
    Route::get('/admin/dusun/{dusun}/edit', [DusunController::class, 'edit'])->name('dusun.edit');
    Route::put('/admin/dusun/{dusun}', [DusunController::class, 'update'])->name('dusun.update');
    Route::delete('/admin/dusun/{dusun}', [DusunController::class, 'destroy'])->name('dusun.destroy');
});

//Peta
Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
Route::get('/peta/data', [PetaController::class, 'apiData'])->name('peta.data'); // buat dipanggil JS/Leaflet
Route::get('/peta/{peta}', [PetaController::class, 'show'])->name('peta.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/peta/create', [PetaController::class, 'create'])->name('peta.create');
    Route::post('/admin/peta', [PetaController::class, 'store'])->name('peta.store');
    Route::get('/admin/peta/{peta}/edit', [PetaController::class, 'edit'])->name('peta.edit');
    Route::put('/admin/peta/{peta}', [PetaController::class, 'update'])->name('peta.update');
    Route::delete('/admin/peta/{peta}', [PetaController::class, 'destroy'])->name('peta.destroy');
});

//Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{pengumuman}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/admin/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
});

//Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{beritum}', [BeritaController::class, 'show'])->name('berita.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/admin/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/admin/berita/{beritum}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/admin/berita/{beritum}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/admin/berita/{beritum}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

//Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{layanan}', [LayananController::class, 'show'])->name('layanan.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/admin/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/admin/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/admin/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/admin/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
});

//Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/kontak/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/admin/kontak', [KontakController::class, 'update'])->name('kontak.update');
});

require __DIR__.'/auth.php';
