<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TagController;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;

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

Route::post('/register', function (Request $request) {
    return (new CreateNewUser())->create($request->all());
});

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
    Route::get('assign_group_tag', function () {
        return view('assign_group_tag');
    })->name('assign_group_tag');
    Route::get('export', function () {
        return view('export');
    })->name('export');
    Route::get('import', function () {
        return view('import');
    })->name('import');
    Route::get('communicate', function () {
        return view('communicate');
    })->name('communicate');
    
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::get('/pradzia', [ContactController::class, 'index'])->name('pradzia.index');
    Route::post('/pradzia', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/pradzia/create', [ContactController::class, 'create'])->name('pradzia.create');
    Route::get('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.edit');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contact/{contact}', [ContactController::class, 'updatecontact'])->name('contacts.edit');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroycontact'])->name('contacts.destroy');

    Route::get('/show-contacts', [ContactController::class, 'index2'])->name('show-contacts');


    Route::get('/assign_group_tag', [GroupController::class, 'index'])->name('assign_group_tag');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.create');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::post('/assign_group_tag', [ContactController::class, 'assignGroupTag'])->name('assign_group_tag.post');

    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

    Route::get('/contacts/import', [ContactController::class, 'import'])->name('contacts.import');
    Route::post('/contacts/import', [ContactController::class, 'import'])->name('contacts.import');

    Route::get('/contacts/export', [ContactController::class, 'export'])->name('contacts.export');
    Route::post('/contacts/export', [ContactController::class, 'export'])->name('contacts.export');
    

    

    Route::post('/communicate', [CommunicationController::class, 'store'])->name('communications.store');
    Route::get('/communicate', [CommunicationController::class, 'create'])->name('communicate');

});

