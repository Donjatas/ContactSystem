<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('auth/login');
})->name('root');

Route::get('login', function () {
    return view('auth/login');
})->name('login');

Route::get('register', function () {
    return view('auth/register');
})->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('pradzia.index');
    })->name('dashboard');
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');
    
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::get('/pradzia', [ContactController::class, 'index'])->name('pradzia.index');
    Route::post('/pradzia', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/pradzia/create', [ContactController::class, 'create'])->name('pradzia.create');
    Route::get('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.edit');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contact/{contact}', [ContactController::class, 'updatecontact'])->name('contacts.edit');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroycontact'])->name('contacts.destroy');

    Route::get('/show-contacts', [ContactController::class, 'index2'])->name('show-contacts');
});

