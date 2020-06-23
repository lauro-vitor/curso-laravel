<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
//fazendo o controlador gerenciar a rota
//route,ClassName@method
Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');
Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');
Route::get('nome','MeuControlador@getNome');
Route::get('idade','MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}','MeuControlador@multiplicar');

Route::resource('clientes','ClienteControlador');
Route::get('opcoes/{opcao?}', function ($opcao = null) {
    return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');
Route::get('bootstrap', function() {
    return view('outras.exemplo');
});
/*
// parâmetros obrigatórios
Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome){
    echo "Olá $nome $sobrenome";
});
//parêmtros opicionais
Route::get('/seunome/{nome?}', function ($nome=null){
    if(isset($nome))
        echo $nome;
    else echo 'não encontrado';
});

//regular expressions para aceitar os parâmetros das rotas
Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n) {
    for($i = 0; $i < $n; $i++ )
        echo $nome . '<br/>';
})->where('nome','[A-Za-z]+')
  ->where('n','[0-9]+');
//prefix: usado para agrupar rotas
//group: recebe um callback para agrupamento de rotas
Route::prefix('/aplicacao')->group(function(){
    Route::get('/', function (){
        return view('app');
    })->name('app');

    Route::get('/user', function(){
        return view('user');
    })->name('app.user');

    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');
});
Route::get('/produtos', function (){
    echo "Produtos";
})->name('meusprodutos');   

//redirecionamento de rotas de todosprodutos para produtos
Route::redirect('todosprodutos','produtos',301);

//outro modelo de redirecionamento
Route::get('todosprodutos2', function (){
    return redirect()->route('meusprodutos');
});

//usando post: para inserir dados
Route::post('/requisicoes', function(Request $req){
    return 'hello post';
});
Route::put('/requisicoes', function(Request $req){
    return 'hello put';
});
Route::delete('/requisicoes', function(Request $req){
    return 'hello delete';
});
Route::get('/requisicoes', function(Request $req){
    return 'hello get';
});*/