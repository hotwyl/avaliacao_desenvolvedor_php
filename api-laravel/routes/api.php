<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Route
};
use App\Http\Controllers\{
    ProdutoController,
    UsuarioController,
};

// Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

// Route::post('/auth/login', [AuthController::class, 'login']);
// Route::post('/auth/logout', [AuthController::class, 'logout']);
// Route::post('/auth/refresh', [AuthController::class, 'refresh']);

Route::prefix('/v1')->group(function () {

    Route::prefix('usuario')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
        Route::get('/{id}', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
        Route::post('/', [UsuarioController::class, 'store'])->name('usuario.store');
        Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
        Route::delete('/{id}', [UsuarioController::class, 'delete'])->where('id', '[0-9]+')->name('usuario.destroy');
        Route::any('/search', [UsuarioController::class, 'search'])->name('usuario.search');
    });

    Route::prefix('produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
        Route::get('/{id}', [ProdutoController::class, 'show'])->where('id', '[0-9]+')->name('produto.show');
        Route::post('/', [ProdutoController::class, 'store'])->name('produto.store');
        Route::put('/{id}', [ProdutoController::class, 'update'])->where('id', '[0-9]+')->name('produto.update');
        Route::delete('/{id}', [ProdutoController::class, 'delete'])->where('id', '[0-9]+')->name('produto.destroy');
        Route::any('/search', [ProdutoController::class, 'search'])->name('produto.search');
    });

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth::routes();

// Route::prefix('/v1')->middleware(['auth'])->group(function () {

// }
