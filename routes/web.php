<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard', [MenuController::class, 'index'])->name('dashboard');
});

Route::resource("menus",MenuController::class);
Route::get('Delete/{id}',[MenuController::class, 'destroy']);
Route::get('Edit/{id}',[MenuController::class, 'edit']);

Route::post('Edit/EditMenu/{id}', [MenuController::class, 'update']);