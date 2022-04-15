<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UploadPostImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::post('/password/email', [ForgotPasswordController::class , 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/reset', [ResetPasswordController::class,'reset'])->name('password.update');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::patch('/profile', [UpdateProfileController::class,'update'])
        ->name('profile.update');

    Route::post('/upload-post-image', [UploadPostImageController::class])
        ->name('upload_post_image');
});
