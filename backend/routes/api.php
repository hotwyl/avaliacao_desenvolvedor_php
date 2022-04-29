<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Route
};

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/teste', function () {
    return ['response' => true];
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/{id}', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
    Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
    Route::delete('/{id}', [UsuarioController::class, 'delete'])->where('id', '[0-9]+')->name('usuario.destroy');
    Route::post('/', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/novo', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::get('/edit/{id}', [UsuarioController::class, 'edit'])->where('id', '[0-9]+')->name('usuario.edit');
    Route::get('/del/{id}', [UsuarioController::class, 'del'])->where('id', '[0-9]+')->name('usuario.apagar');
});

// Auth::routes();

// Route::prefix('/v1')->middleware(['auth'])->group(function () {

//     // Route::prefix('produtos')->group(function () {
//     //             Route::get('/', [ServicoController::class, 'index'])->name('servico.index');
//     //             Route::get('/{id}', [ServicoController::class, 'show'])->name('servico.show');
//     //             Route::put('/{id}', [ServicoController::class, 'update'])->name('servico.update');
//     //             Route::delete('/{id}', [ServicoController::class, 'delete'])->name('servico.destroy');
//     //             Route::post('/', [ServicoController::class, 'store'])->name('servico.store');
//     //             Route::get('/novo', [ServicoController::class, 'create'])->name('servico.create');
//     //             Route::get('/edit/{id}', [ServicoController::class, 'edit'])->name('servico.edit');
//     //             Route::get('/del/{id}', [ServicoController::class, 'del'])->name('servico.apagar');
//     // });
// }
