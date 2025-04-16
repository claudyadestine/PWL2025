<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;


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

Route::get('/', [WelcomeController::class, 'index']);

/*Route::group(['prefix' => 'user'], function () {
    Route::get('/',[UserController::class, 'index']);
    Route::post('/list',[UserController::class, 'list']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/',[LevelController::class, 'index']);
    Route::post('/list',[LevelController::class, 'list']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/',[KategoriController::class, 'index']);
    Route::post('/list',[KategoriController::class, 'list']);
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/',[SupplierController::class, 'index']);
    Route::post('/list',[SupplierController::class, 'list']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/',[BarangController::class, 'index']);
    Route::post('/list',[BarangController::class, 'list']);
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/',[StokController::class, 'index']);
    Route::post('/list',[StokController::class, 'list']);
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/',[PenjualanController::class, 'index']);
    Route::post('/list',[PenjualanController::class, 'list']);
});

Route::group(['prefix' => 'detailPenjualan'], function () {
    Route::get('/',[PenjualanDetailController::class, 'index']);
    Route::post('/list',[PenjualanDetailController::class, 'list']);
}); */

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'PostRegister']);


Route::middleware(['auth'])->group(function () : void { // artinya semua route di dalam group ini harus login dulu
    Route::get('/', [WelcomeController::class, 'index']); // route level

    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function () : void {
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']); // untuk list json datatables
        Route::get('/level/create', [LevelController::class, 'create']);
        Route::post('/level', [LevelController::class, 'store']);
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']); // untuk tampilkan form edit
        Route::put('/level/{id}', [LevelController::class, 'update']); // untuk proses update data
        Route::delete('/level/{id}', [LevelController::class, 'destroy']); // untuk proses hapus data
    });

    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function () : void {
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']); // untuk list json datatables
        Route::get('/level/create', [LevelController::class, 'create']);
        Route::post('/level', [LevelController::class, 'store']);
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']); // untuk tampilkan form edit
        Route::put('/level/{id}', [LevelController::class, 'update']); // untuk proses update data
        Route::delete('/level/{id}', [LevelController::class, 'destroy']); // untuk proses hapus data
    });

    
    Route::group(['prefix' => 'user'], function () {
        Route::middleware(['authorize:ADM'])->group(function() {
            Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru ajax
            Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
            Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
            Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); // menampilkan halaman detail user ajax
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit user ajax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // menampilkan halaman konfirmasi delete user ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus data user ajax
            Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
        });
    });

    Route::group(['prefix' => 'level'], function () {
        Route::middleware(['authorize:ADM'])->group(function (){
            Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
            Route::post('/list', [LevelController::class, 'list']);      // menampilkan data level dalam bentuk json untuk datatables
            Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
            Route::post('/', [LevelController::class, 'store']);         // menyimpan data level baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']); // menyimpan data level baru ajax
            Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail level
            Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
            Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']); // menampilkan halaman detail level ajax
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit level ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data level ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // menampilkan halaman konfirmasi delete level ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level ajax
            Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
        });
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            Route::get('/', [KategoriController::class, 'index']);  // menampilkan halaman awal kategori
            Route::post('/list', [KategoriController::class, 'list']);      // menampilkan data kategori dalam bentuk json untuk datatables
            Route::get('/create', [KategoriController::class, 'create']);   // menampilkan halaman form tambah kategori
            Route::post('/', [KategoriController::class, 'store']);         // menyimpan data kategori baru
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori ajax
            Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru ajax
            Route::get('/{id}', [KategoriController::class, 'show']);       // menampilkan detail kategori
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // menampilkan halaman form edit kategori
            Route::put('/{id}', [KategoriController::class, 'update']);     // menyimpan perubahan data kategori
            Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']); // menampilkan halaman detail kategori ajax
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit kategori ajax
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data kategori ajax
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // menampilkan halaman konfirmasi delete kategori ajax
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data kategori ajax
            Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori
        });
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::middleware(['authorize:ADM,MNG'])->group(function () {
            Route::get('/', [SupplierController::class, 'index']);   // menampilkan halaman awal supplier
            Route::post('/list', [SupplierController::class, 'list']);      // menampilkan data supplier dalam bentuk json untuk datatables
            Route::get('/create', [SupplierController::class, 'create']);   // menampilkan halaman form tambah supplier
            Route::post('/', [SupplierController::class, 'store']);         // menyimpan data supplier baru
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah supplier ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data supplier baru ajax
            Route::get('/{id}', [SupplierController::class, 'show']);       // menampilkan detail supplier
            Route::get('/{id}/edit', [SupplierController::class, 'edit']);  // menampilkan halaman form edit supplier
            Route::put('/{id}', [SupplierController::class, 'update']);     // menyimpan perubahan data supplier
            Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']); // menampilkan halaman detail supplier ajax
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit supplier ajax
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // menyimpan perubahan data supplier ajax
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // menampilkan halaman konfirmasi delete supplier ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // menghapus data supplier ajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data supplier
        });
    });

    Route::group(['prefix' => 'barang'], function () {
        Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            Route::get('/', [BarangController::class, 'index']);      // menampilkan halaman awal barang
            Route::post('/list', [BarangController::class, 'list']);      // menampilkan data barang dalam bentuk json untuk datatables
            Route::get('/create', [BarangController::class, 'create']);   // menampilkan halaman form tambah barang
            Route::post('/', [BarangController::class, 'store']);         // menyimpan data barang baru
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru ajax
            Route::get('/{id}', [BarangController::class, 'show']);       // menampilkan detail barang
            Route::get('/{id}/edit', [BarangController::class, 'edit']);  // menampilkan halaman form edit barang
            Route::put('/{id}', [BarangController::class, 'update']);     // menyimpan perubahan data barang
            Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']); // menampilkan halaman detail barang ajax
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // menampilkan halaman form edit barang ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data barang ajax
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // menampilkan halaman konfirmasi delete barang ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // menghapus data barang ajax
            Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang
        });
    });
});


Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // Menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // Menyimpan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']); // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // Menyimpan perubahan data user
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/',[LevelController::class, 'index']);
    Route::post('/list',[LevelController::class, 'list']);
    Route::get('/create',[LevelController::class, 'create']);
    Route::post('/',[LevelController::class, 'store']);
    Route::get('/create_ajax',[LevelController::class, 'create_ajax']);
    Route::post('/ajax',[LevelController::class, 'store_ajax']);
    Route::get('/{id}',[LevelController::class, 'show']);
    Route::get('/{id}/edit',[LevelController::class, 'edit']);
    Route::put('/{id}',[LevelController::class, 'update']);
    Route::get('/{id}/edit_ajax',[LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[LevelController::class, 'update_ajax']);
    Route::delete('/{id}',[LevelController::class, 'destroy']);
    Route::get('/{id}/delete_ajax',[LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[LevelController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/',[KategoriController::class, 'index']);
    Route::post('/list',[KategoriController::class, 'list']);
    Route::get('/create',[KategoriController::class, 'create']);
    Route::post('/',[KategoriController::class, 'store']);
    Route::get('/create_ajax',[KategoriController::class, 'create_ajax']);
    Route::post('/ajax',[KategoriController::class, 'store_ajax']);
    Route::get('/{id}',[KategoriController::class, 'show']);
    Route::get('/{id}/edit',[KategoriController::class, 'edit']);
    Route::put('/{id}',[KategoriController::class, 'update']);
    Route::get('/{id}/edit_ajax',[KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[KategoriController::class, 'update_ajax']);
    Route::delete('/{id}',[KategoriController::class, 'destroy']);
    Route::get('/{id}/delete_ajax',[KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[KategoriController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/',[SupplierController::class, 'index']);
    Route::post('/list',[SupplierController::class, 'list']);
    Route::get('/create',[SupplierController::class, 'create']);
    Route::post('/',[SupplierController::class, 'store']);
    Route::get('/create_ajax',[SupplierController::class, 'create_ajax']);
    Route::post('/ajax',[SupplierController::class, 'store_ajax']);
    Route::get('/{id}',[SupplierController::class, 'show']);
    Route::get('/{id}/edit',[SupplierController::class, 'edit']);
    Route::put('/{id}',[SupplierController::class, 'update']);
    Route::get('/{id}/edit_ajax',[SupplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[SupplierController::class, 'update_ajax']);
    Route::delete('/{id}',[SupplierController::class, 'destroy']);
    Route::get('/{id}/delete_ajax',[SupplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[SupplierController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/',[BarangController::class, 'index']);
    Route::post('/list',[BarangController::class, 'list']);
    Route::get('/create',[BarangController::class, 'create']);
    Route::post('/',[BarangController::class, 'store']);
    Route::get('/create_ajax',[BarangController::class, 'create_ajax']);
    Route::post('/ajax',[BarangController::class, 'store_ajax']);
    Route::get('/{id}',[BarangController::class, 'show']);
    Route::get('/{id}/edit',[BarangController::class, 'edit']);
    Route::put('/{id}',[BarangController::class, 'update']);
    Route::get('/{id}/edit_ajax',[BarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[BarangController::class, 'update_ajax']);
    Route::delete('/{id}',[BarangController::class, 'destroy']);
    Route::get('/{id}/delete_ajax',[BarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[BarangController::class, 'delete_ajax']);
}); 


Route::group(['prefix' => 'Stok'], function () {
    Route::get('/',[StokController::class, 'index']);
    Route::post('/list',[StokController::class, 'list']);
    Route::get('/create',[StokController::class, 'create']);
    Route::post('/',[StokController::class, 'store']);
    Route::get('/create_ajax',[StokController::class, 'create_ajax']);
    Route::post('/ajax',[StokController::class, 'store_ajax']);
    Route::get('/{id}',[StokController::class, 'show']);
    Route::get('/{id}/edit',[StokController::class, 'edit']);
    Route::put('/{id}',[StokController::class, 'update']);
    Route::get('/{id}/edit_ajax',[StokController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[StokController::class, 'update_ajax']);
    Route::delete('/{id}',[StokController::class, 'destroy']);
    Route::get('/{id}/delete_ajax',[StokController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[StokController::class, 'delete_ajax']);
}); 





Route::middleware(['authorize:ADM'])->group(function(){
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/create_ajax',[BarangController::class, 'create_ajax']);
        Route::post('/ajax',[BarangController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[BarangController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[BarangController::class, 'delete_ajax']);
        Route::get('/import', [BarangController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [BarangController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
    });
    
    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[UserController::class, 'index']);
        Route::post('/list',[UserController::class, 'list']);
        Route::get('/create_ajax',[UserController::class, 'create_ajax']);
        Route::post('/ajax',[UserController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[UserController::class, 'delete_ajax']);
        Route::get('/import', [UserController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [UserController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [UserController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [UserController::class, 'export_pdf']); // export pdf
    });
    
    Route::group(['prefix' => 'level'], function () {
        Route::get('/',[LevelController::class, 'index']);
        Route::post('/list',[LevelController::class, 'list']);
        Route::get('/create_ajax',[LevelController::class, 'create_ajax']);
        Route::post('/ajax',[LevelController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[LevelController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[LevelController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[LevelController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[LevelController::class, 'delete_ajax']);
        Route::get('/import', [LevelController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [LevelController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [LevelController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [LevelController::class, 'export_pdf']); // export pdf
    });
    
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/create_ajax',[SupplierController::class, 'create_ajax']);
        Route::post('/ajax',[SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[SupplierController::class, 'delete_ajax']);
        Route::get('/import', [SupplierController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [SupplierController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [SupplierController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [SupplierController::class, 'export_pdf']); // export pdf
    });
    
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/create_ajax',[KategoriController::class, 'create_ajax']);
        Route::post('/ajax',[KategoriController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[KategoriController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[KategoriController::class, 'delete_ajax']);
        Route::get('/import', [KategoriController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [KategoriController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [KategoriController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [KategoriController::class, 'export_pdf']); // export pdf
    });
});


Route::middleware(['authorize:ADM'])->group(function(){
    Route::group(['prefix' => 'stok'], function () {
        Route::get('/create_ajax',[StokController::class, 'create_ajax']);
        Route::post('/ajax',[StokController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax',[StokController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax',[StokController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax',[StokController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax',[StokController::class, 'delete_ajax']);
        Route::get('/import', [StokController::class, 'import']); // ajax form upload excel
        Route::post('/import_ajax', [StokController::class, 'import_ajax']); // ajax import excel
        Route::get('/export_excel', [StokController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [StokController::class, 'export_pdf']); // export pdf
    });



Route::middleware(['authorize:ADM,MNG'])->group(function(){
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/',[SupplierController::class, 'index']);
        Route::post('/list',[SupplierController::class, 'list']);
        Route::get('/{id}',[SupplierController::class, 'show']);
    });
});


Route::middleware(['authorize:ADM,MNG'])->group(function(){
    Route::group(['prefix' => 'stok'], function () {
        Route::get('/',[StokController::class, 'index']);
        Route::post('/list',[StokController::class, 'list']);
        Route::get('/{id}',[StokController::class, 'show']);
    });
});

Route::middleware(['authorize:ADM,MNG,STF'])->group(function(){
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/',[BarangController::class, 'index']);
        Route::post('/list',[BarangController::class, 'list']);
        Route::get('/{id}',[BarangController::class, 'show']);
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/',[KategoriController::class, 'index']);
        Route::post('/list',[KategoriController::class, 'list']);
        Route::get('/{id}',[KategoriController::class, 'show']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', [UserController::class, 'profile_page']);
        Route::post('/update_picture', [UserController::class, 'update_picture']);
    });
});

    // Route Data Penjualan (Admin, Manajer, Staf)
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'detail_penjualan'], function () {
            Route::get('/', [DetailPenjualanController::class, 'index'])->name('detail_penjualan.index');       // Halaman utama penjualan
            Route::post('/list', [DetailPenjualanController::class, 'list'])->name('detail_penjualan.list');    // Data untuk DataTables
            // AJAX
            Route::get('/create_ajax', [DetailPenjualanController::class, 'create_ajax'])->name('penjualan.create_ajax'); // Form tambah penjualan via AJAX
            Route::post('/ajax', [DetailPenjualanController::class, 'store_ajax'])->name('penjualan.store_ajax');        // Simpan penjualan via AJAX
            Route::get('/{id}/show_ajax', [DetailPenjualanController::class, 'show_ajax'])->name('penjualan.show_ajax'); // Detail penjualan via AJAX
            Route::get('/{id}/edit_ajax', [DetailPenjualanController::class, 'edit_ajax'])->name('penjualan.edit_ajax'); // Form edit penjualan via AJAX
            Route::put('/{id}/update_ajax', [DetailPenjualanController::class, 'update_ajax'])->name('penjualan.update_ajax'); // Update penjualan via AJAX
            Route::get('/{id}/delete_ajax', [DetailPenjualanController::class, 'confirm_ajax'])->name('penjualan.delete_ajax'); // Konfirmasi hapus penjualan via AJAX
            Route::delete('/{id}/delete_ajax', [DetailPenjualanController::class, 'delete_ajax'])->name('penjualan.delete_ajax_post'); // Hapus penjualan via AJAX
            // Impor dan Ekspor
            Route::get('/import', [DetailPenjualanController::class, 'import'])->name('penjualan.import');          // Form upload Excel
            Route::post('/import_ajax', [DetailPenjualanController::class, 'import_ajax'])->name('penjualan.import_ajax'); // Impor penjualan via AJAX
            Route::get('/export_excel', [DetailPenjualanController::class, 'export_excel'])->name('penjualan.export_excel'); // Ekspor ke Excel
            Route::get('/export_pdf', [DetailPenjualanController::class, 'export_pdf'])->name('penjualan.export_pdf');    // Ekspor ke PDF
        });
    });
});