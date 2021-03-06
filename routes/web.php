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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [ScreamController::class, 'index'])->name('screams');
Route::get('/screams/create', [ScreamController::class, 'create'])->name('screams.create');
Route::post('/screams/create', [ScreamController::class, 'store']);
Route::post('/screams/favorite', [ScreamController::class, 'add_favorite'])->name('screams.favorite');

require __DIR__.'/auth.php';
