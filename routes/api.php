<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UploadPostImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

    Route::post('/upload-post-image', [UploadPostImageController::class , 'store'])
        ->name('upload_post_image');


    Route::post('/posts/create', [DraftController::class , 'store'])
        ->name('draft.store');

    Route::post('/drafts/{draft }', [DraftController::class , 'show'])
        ->name('draft.show');

        Route::get('/drafts/{draft }', [DraftController::class , 'update'])
        ->name('draft.update');
});
