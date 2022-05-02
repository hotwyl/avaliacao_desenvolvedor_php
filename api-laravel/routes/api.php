<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Route
};
use App\Http\Controllers\{
    AuthController,
    ProdutoController,
    UsuarioController,
    PedidoController
};


Route::prefix('/')->group(function () {
    Route::get('auth/401', [AuthController::class, 'unauthorized'])->name('login');
    Route::post('auth/login', [AuthController::class, 'login']);

    Route::prefix('auth')->middleware('apiJwt')->group(function () {
        Route::post('user', [UsuarioController::class, 'store']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::prefix('/v1')->middleware('apiJwt')->group(function () {

        Route::prefix('usuarios')->group(function () {
            Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
            Route::get('/{id}', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
            Route::post('/', [UsuarioController::class, 'store'])->name('usuario.store');
            Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
            Route::delete('/{id}', [UsuarioController::class, 'delete'])->where('id', '[0-9]+')->name('usuario.destroy');
            Route::any('/search', [UsuarioController::class, 'search'])->name('usuario.search');
        });

        Route::prefix('produtos')->group(function () {
            Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
            Route::get('/{id}', [ProdutoController::class, 'show'])->where('id', '[0-9]+')->name('produto.show');
            Route::post('/', [ProdutoController::class, 'store'])->name('produto.store');
            Route::put('/{id}', [ProdutoController::class, 'update'])->where('id', '[0-9]+')->name('produto.update');
            Route::delete('/{id}', [ProdutoController::class, 'delete'])->where('id', '[0-9]+')->name('produto.destroy');
            Route::any('/search', [ProdutoController::class, 'search'])->name('produto.search');
        });

        Route::prefix('pedidos')->group(function () {
            Route::get('/', [PedidoController::class, 'index'])->name('pedido.index');
            Route::get('/{id}', [PedidoController::class, 'show'])->where('id', '[0-9]+')->name('pedido.show');
            Route::post('/', [PedidoController::class, 'store'])->name('pedido.store');
            Route::put('/{id}', [PedidoController::class, 'update'])->where('id', '[0-9]+')->name('pedido.update');
            Route::delete('/{id}', [PedidoController::class, 'delete'])->where('id', '[0-9]+')->name('pedido.destroy');
            Route::any('/search', [PedidoController::class, 'search'])->name('pedido.search');
        });
    });
});
