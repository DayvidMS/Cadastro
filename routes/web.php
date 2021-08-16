<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ProdutoController;

//Pagina Principal
Route::get('/', [ProdutoController::class,'listaProduto']);

//Toda parte do CRUD da Categoria
#Busca os dados do banco e redireciona para a pagina de cadastro das categorias
Route::get('/categoria', [ProdutoController::class,'index']);

#Cadastro Categoria
Route::get('/cadastroCategoria', [ProdutoController::class,'cadastrarCategoria']);

#Deletar Categoria
Route::get('/deletarCategoria', [ProdutoController::class,'destroy']);

#Editar Categoria
Route::get('/editarCategoria', [ProdutoController::class,'editarCategoria']);

//Toda Parte do CRUD dos Produtos
#Redireciona para a pagina de cadastro dos Produtos
Route::get('/produtos', [ProdutoController::class,'carregarCategoria']);

#Cadastro produto
Route::post('/cadastroProduto', [ProdutoController::class,'cadastroProduto']);

#Deletar Produto
Route::get('/deletarProduto', [ProdutoController::class,'deletarProduto']);

#Editar Produto
Route::get('/carregarDadosProduto/{id}', [ProdutoController::class,'carregarProduto']);
