<?php

use App\Models\Armada;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function(){
    $armadas = Armada::where('status', 'tersedia')
                     ->orderBy('harga', 'asc')
                     ->get();
    return view('index', compact('armadas'));
})->name('home');

Route::get('/armada', function(){
    $armadas = Armada::where('status', 'tersedia')
                     ->orderBy('harga', 'asc')
                     ->get();
    return view('armada', compact('armadas'));
})->name('armada');

Route::get('/armada/{id}', function($id){
    $armada = Armada::findOrFail($id);
    return view('showarmada', compact('armada'));
});

Route::get('/about', function(){
    return view('about');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/book/{id}', [BookingController::class, 'order_booking'])->name('booking.form');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.order');
    Route::get('/booking/{id}', [BookingController::class, 'show_booking'])->name('show.booking');
    Route::get('/booking', [BookingController::class, 'index_booking'])->name('list.booking');
    Route::patch('booking/{id}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::post('/booking/{id}/pay', [BookingController::class, 'pay'])->name('booking.pay');
    Route::post('/midtrans/notification', [BookingController::class, 'notificationHandler'])->name('midtrans.notification');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Group routes under the "admin" prefix and apply the "admin" middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function (){
        return view('admin.home');
    })->name('admin.home');

    Route::resource('armada', ArmadaController::class);

    Route::resource('booking', BookingController::class);
});
