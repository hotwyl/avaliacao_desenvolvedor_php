<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    // Auth,
    Route
};
use App\Http\Controllers\{
    ProdutoController,
    UsuarioController,
};

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/v1')->group(function () {
    Route::prefix('usuario')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
        Route::get('/{id}', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
        Route::post('/', [UsuarioController::class, 'store'])->name('usuario.store');
        Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
        Route::delete('/{id}', [UsuarioController::class, 'delete'])->where('id', '[0-9]+')->name('usuario.destroy');
    });
    Route::prefix('produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
        Route::get('/{id}', [ProdutoController::class, 'show'])->where('id', '[0-9]+')->name('produto.show');
        Route::post('/', [ProdutoController::class, 'store'])->name('produto.store');
        Route::put('/{id}', [ProdutoController::class, 'update'])->where('id', '[0-9]+')->name('produto.update');
        Route::delete('/{id}', [ProdutoController::class, 'delete'])->where('id', '[0-9]+')->name('produto.destroy');
    });
});
// Auth::routes();

// Route::prefix('/v1')->middleware(['auth'])->group(function () {

// }
