<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\DepartamentController;



Route::namespace('admin')->prefix('admin')->group(function () {

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //Route::get('/register', [AdminController::class, 'register'])->name('admin.register');

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::post('/auth', [AdminController::class, 'auth'])->name('admin.auth');

    Route::middleware('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::get('/usuarios', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/solicitacoes', [RequestController::class, 'requests'])->name('admin.requests');

        Route::get('/testlol', [AdminController::class, 'testlol'])->name('admin.testlol');


        Route::get('api/users', [AdminController::class, 'getUsers']);
        Route::get('api/resumes/users', [AdminController::class, 'getUsersInResumes']);
        Route::post('api/resumes/users', [AdminController::class, 'saveUsersInResumes']);
        Route::get('api/requests', [RequestController::class, 'getRequests']);
        Route::get('api/resumes/{id}', [RequestController::class, 'getResumes']);

        Route::delete('resumes/user/delete/{id}', [RequestController::class, 'resumeDelete']);
        Route::get('download/{user_id}/{file_path}/{file_original_name}', [AdminController::class, 'downloadFile'])->name('downloadFile');

        Route::get('/criar-solicitacao', [RequestController::class, 'create'])->name('request.create');
        Route::post('/solicitacao-store', [RequestController::class, 'store'])->name('request.store');
        Route::get('/solicitacoes/detalhes/{id}', [RequestController::class, 'show'])->name('requests.show');
        Route::post('/solicitacoes/detalhes/update/{id}', [RequestController::class, 'update'])->name('request.update');
        Route::post('/solicitacoes/detalhes/update-progress/{id}', [RequestController::class, 'updateProgress'])->name('request.update.progress');
        Route::post('/solicitacoes/detalhes/create-progress/{id}', [RequestController::class, 'createProgress'])->name('request.create.progress');
        Route::post('/solicitacoes/detalhes/authorize-request/{id}', [RequestController::class, 'authorizeRequest'])->name('request. authorize.request');
        Route::get('/solicitacoes/cursos/{id}', [RequestController::class, 'requestsCourses'])->name('requests.courses');

        Route::get('/solicitacoes/candidatos/{id}', [RequestController::class, 'requestUsers']);
        Route::post('/solicitacoes/candidatos/update/{id}', [RequestController::class, 'requestUsersUpdate']);


        Route::get('/ver-curriculo/{id}', [RequestController::class, 'showProfile'])->name('show.profile');

        Route::get('/departamentos', [DepartamentController::class, 'departament'])->name('admin.departament');
        Route::post('/departamentos/add-tree', [DepartamentController::class, 'store'])->name('admin.add.tree');
        Route::delete('/departamentos/delete/{id}', [DepartamentController::class, 'delete'])->name('admin.departament.delete');
        Route::post('/departamentos/update/{id}', [DepartamentController::class, 'update'])->name('admin.departament.update');
    });
});
