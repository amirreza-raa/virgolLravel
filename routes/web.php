<?php

use App\Http\Controllers\UploadPostImageController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('users/{id}',[ UploadPostImageController::class , 'index'])
// ->middleware('auth:sanctume')
->name('upload_post_image');



Route::get('/login', function () {
    return view('home');
})->name('login');

Route::post('/login', [LoginController::class ,'login']);
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');
Route::post('/register', [RegisterController::class , 'register'])->name('register');
Route::get('email/verify/{id}/{hash}', [VerificationController::class ,'verify'])->name('verification.verify');
Route::get('/reset/password/{token}', function () {
    return view('home');
})->name('password.reset');

