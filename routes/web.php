<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\MessageController;

// web.php
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Paginas padrão
Route::get('/', function () {
    return view('user/index');
});
Route::get('/donates', function () {
    return view('user/doacoes');
});
Route::get('/ongs', function () {
    return view('user/ongs');
});


// Registro, Login e Logout
Route::get('/signin', function () {
    return view('user/signIn');
});
Route::post('/login', [LoginController::class, 'login']);
Route::get('/signup', function () {
    return view('user/signUp');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




// Ong
Route::get('/ong/signup', function () {
    return view('user/ong/signUp');
});
Route::get('/ong/account', function () {
    return view('user.ong.account');
})->name('ongaccount')->middleware(\App\Http\Middleware\Auth::class);

Route::post('/createong', [OngController::class, 'create']);
Route::get('/ong/courses', [CursoController::class, 'index'])->name('cursos.index')->middleware(\App\Http\Middleware\Auth::class);;
Route::resource('cursos', CursoController::class)->middleware(\App\Http\Middleware\Auth::class);;
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store')->middleware(\App\Http\Middleware\Auth::class);;
Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy')->middleware(\App\Http\Middleware\Auth::class);;
Route::get('/ong/mural', function () {
    return view('user/ong/mural');
})->middleware(\App\Http\Middleware\Auth::class);
Route::get('/ong/volunteer', function () {
    return view('user/ong/volunteer');
})->middleware(\App\Http\Middleware\Auth::class);


// Aluno
Route::get('/aluno/signup', function () {
    return view('user/aluno/signUp');
});
Route::post('/createaluno', [AlunoController::class, 'create']);
Route::get('/aluno/account', function () {
    return view('user.aluno.account');
})->name('alunoaccount')->middleware(\App\Http\Middleware\Auth::class);
Route::get('/aluno/mural', function () {
    return view('user.aluno.mural');
})->middleware(\App\Http\Middleware\Auth::class);
Route::get('/aluno/list', function () {
    return view('user.aluno.list');
})->middleware(\App\Http\Middleware\Auth::class);
Route::get('/aluno/chat', function () {
    return view('user.aluno.chat');
})->middleware(\App\Http\Middleware\Auth::class);


// Professor
Route::get('/prof/signup', function () {
    return view('user/prof/signUp');
});
Route::post('/createprofessor', [ProfessorController::class, 'create']);
Route::get('/prof/account', function () {
    return view('user.prof.account');
})->name('profaccount')->middleware(\App\Http\Middleware\Auth::class);

Route::get('/prof/mural', function () {
    return view('user.prof.mural');
})->middleware(\App\Http\Middleware\Auth::class);

Route::get('/prof/list', function () {
    return view('user.prof.list');
})->middleware(\App\Http\Middleware\Auth::class);

// Rota para listar mensagens
Route::get('/prof/chat', [MessageController::class, 'index'])
    ->name('messages.index')
    ->middleware(\App\Http\Middleware\Auth::class);

// Rota para armazenar mensagens
Route::post('/messages', [MessageController::class, 'store'])
    ->name('messages.store');


Route::get('/prof/notas', function () {
    return view('user.prof.notas');
})->middleware(\App\Http\Middleware\Auth::class);


// Admin
Route::get('/admin', [Admin::class, 'getOng']);

Route::get('/aprovarong', function () {
    return view('admin/aprovarOng');
});
Route::delete('/apagarong/{Id_Ong}', [Admin::class, 'deleteOng'])->name('deleteong');
Route::get('/searchongs', [Admin::class, 'searchOngs'])->name('searchOngs');
Route::get('/ong/{Id_Ong}', [Admin::class, 'showOng'])->name('showOng');
