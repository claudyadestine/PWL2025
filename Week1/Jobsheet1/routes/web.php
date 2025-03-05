<?php //untuk menandakan awal dari kode PHP

use Illuminate\Support\Facades\Route; //Menggunakan Route untuk mendefinisikan rute dalam aplikasi
use App\Http\Controllers\ItemController; //Menggunakan ItemController agar dapat dipanggil dalam rute

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

Route::get('/', function () { //Mendefinisikan rute utama (/)
    return view('welcome'); //Saat diakses, akan menampilkan halaman welcome
});

Route::resource('/items', ItemController::class);//Membuat rute otomatis untuk items menggunakan ItemController
