<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('peticao', PeticaoController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/contato', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
    Route::get('/contato/novo', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
    Route::post('/contato', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/contato/{id}/editar', [App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contato/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');
    Route::get('/contato/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
    Route::delete('/contato/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');
});
