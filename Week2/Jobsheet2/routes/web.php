<?php     //menandakan awal dari file PHP


//mengimpor Route untuk mendefinisikan rute, data ItemController agar bisa digunakan dalam routing
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;


Route::get('/hello', function () { 
return 'Hello World'; 
});

Route::get('/world', function () { 
        return 'World'; 
    }); 

Route::get('/Selamat', function () {
        return 'Selamat Datang';
    });

Route::get('/about', function () {
        return 'Nama: Claudya Destine Julia Handoko <br> NIM: 2341760008';
    });

Route::get('/user/{name}', function ($name) {
        return 'Nama Saya '.$name;
    });

Route::get('/post/{post}/comments/{comment}', function ($postId, $commentId) {
        return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
    });

Route::get('/articles/{articles}/comments/{comment}', function ($postId, $commentId) {
        return 'Halaman Artikel'.$postId." ID 5-: ".$commentId;
    });

Route::get('/user/{name?}', function ($name=null) {
        return 'Nama Saya '.$name;
    });

Route::get('/user/{name?}', function ($name='John'){
        return 'Nama saya '.$name;
    });
       

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [PageController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/articles/{id}', [PageController::class, 'articles']);

route::resource('photos', PhotoController::class);

Route::get('/greeting', function () {
        return view('blog.hello', ['name' => 'Claudya']);
    });
            
 
Route::get('/greeting', [WelcomeController::class, 'greeting']);
 