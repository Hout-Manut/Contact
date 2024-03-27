<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

// User
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/forgot', function () {
    return view('auth.forgot');
});
Route::get('/recover', [UserController::class, 'recoverForm']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/forgot', [UserController::class, 'forgot']);
Route::post('/recover', [UserController::class, 'recover']);

// Contact
Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacts', [ContactController::class, 'showAll'])->name('contacts.home');
Route::get('/contacts/new', [ContactController::class, 'createForm'])->name('contacts.create');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'editForm'])->name('contacts.edit');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::post('/contacts/new', [ContactController::class, 'store'])->name('contacts.store');
Route::put('/contacts/{contact}/edit', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'delete'])->name('contacts.delete');

// Tests
// Route::get('/contacts', function () {
    //     // $contacts = Contact::where('user_id', auth()->id());
    //     // return view('contacts.main', ['contacts' => $contacts]);
    //     return view('contacts.crud.create');
    // });
