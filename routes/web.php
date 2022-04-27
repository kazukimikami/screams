<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/screams', [ScreamController::class, 'index'])->name('screams');
Route::get('/screams/create', [ScreamController::class, 'create'])->name('screams.create');
Route::post('/screams/create', [ScreamController::class, 'store']);


require __DIR__.'/auth.php';
