<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

//Auth
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/recuperar-senha', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password');
Route::post('/recuperar-senha-post', [ForgotPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/resetar-senha/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/resetar-senha', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::get('/conta', [UserController::class, 'editAccount'])->name('edit.account');
    Route::post('/update-account', [UserController::class, 'updateAccount'])->name('update.account');

    Route::get('/perfil', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update.profile');

    Route::get('/endereco', [UserController::class, 'editAddress'])->name('edit.address');
    Route::post('/update-address', [UserController::class, 'updateAddress'])->name('update.address');

    Route::get('/formacao', [UserController::class, 'editFormation'])->name('edit.formation');
    Route::post('/update-formation', [UserController::class, 'updateFormation'])->name('update.formation');

    Route::get('/experiencias', [UserController::class, 'editExperience'])->name('edit.experience');
    Route::post('/update-experience', [UserController::class, 'updateExperience'])->name('update.experience');

    Route::get('/social', [UserController::class, 'editSocial'])->name('edit.social');
    Route::post('/update-social', [UserController::class, 'updateSocial'])->name('update.social');

    Route::get('/arquivos', [UserController::class, 'editFile'])->name('edit.file');
    Route::post('/update-file', [UserController::class, 'updateFile'])->name('update.file');
    Route::get('/download/{user_id}/{file_path}/{file_original_name}', [UserController::class, 'downloadFile'])->name('downloadFile');
    // Route::get('/download/{user_id}/{file_original_name}', [UserController::class, 'downloadFile'])->name('downloadFile');

    Route::delete('/delete/{user_id}/{filename}', [UserController::class, 'deleteFile'])->name('deleteFile');
});

Route::get('/test', [UserController::class, 'test'])->name('test');

Route::get('/sidebar', [UserController::class, 'sidebar'])->name('sidebar');

Route::get('/error', [UserController::class, 'error'])->name('error');
