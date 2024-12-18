<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    echo "Olá Mundo !!!";
});

Route::get('/hello',function(){
    return view('hello_page',
        ["message"=>"Hello World!!"]
    );
});

Route::get('/home',[HomeController::class,'index']);

Route::get('/produtos',[ProdutoController::class,'index'])->name("produto.index");
Route::get(
    '/produtos/{produto}',
    [ProdutoController::class,'show']
)->name("produto.show");

Route::get('/produto',
    [ProdutoController::class,'create']
)->name("produto.create");

Route::post('/produto',
    [ProdutoController::class,'store']
)->name("produto.store");


Route::get('/produto/{id}/edit',
    [ProdutoController::class,'edit']
)->name("produto.edit");

Route::post('/produto/{id}/update',
    [ProdutoController::class,'update']
)->name("produto.update");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
