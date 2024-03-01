<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BinController;
use App\Models\Bin;

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
Route::get('/', function () {
    $bins = Bin::get();
    return view('bins.index', compact('bins'));
});

Route::controller(BinController::class)->group(function(){
    Route::get('bins/index', 'index');
    Route::get('bins/create', 'create');
    Route::post('bins/store', 'store');
    Route::get('bins/{id}/edit', 'edit');
    Route::put('bins/update/{id}', 'update');
    Route::get('bins/{id}', 'show');
    Route::post('bins/destroy/{id}', 'destroy');
    Route::post('bins/search', 'search');
});