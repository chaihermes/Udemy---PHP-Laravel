<?php

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

/*Adicionando o uso do Request */
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/*Nessa rota, está usando a variável $nome como parâmentro para o que será digitado 
na URL. Ex: localhost:8000/ola/chaiana printa na tela "Olá! Seja bem vindo, chaiana!"*/
        // Route::get('/ola/{nome}', function($nome){
        //     echo "Olá! Seja bem vindo, " .$nome. "!";
        // });

/*PARÂMETROS OPCIONAIS */
/*Nessa rota, o parâmetro nome fica opcional. O $nome=null serve para entender que existe a 
possibilidade de o usuário não digitar o nome. O isset verifica se tem um nome digitado ou 
não e roda a função.*/
        // Route::get('/seunome/{nome?}', function($nome=null){
        //     if(isset($nome))
        //         echo "Olá! Seja bem vindo, " .$nome. "!";
        //     else
        //         echo "Você não digitou nenhum nome.";
        // });

/*PARÂMETROS COM REGRAS */
/*Pra cada quantidade que o usuário digitar na URL, irá imprimir essa quantidade de vezes 
na tela */
        // Route::get('/rotacomregras/{nome}/{n}', function($nome, $n){
        //     for($i=0; $i<$n; $i++)
        //         echo "Olá! Seja bem vindo, $nome! <br>";
/*Aqui está criando as regras para a rota. No nome só pode ter letras e no n só pode ter 
números. */
        // }) ->where('nome', '[A-Za-z]+') ->where('n', '[0-9]+');

/*AGRUPAMENTO DE ROTAS */
/*Com o comando prefix e o group todas as rotas dentro dessa opção ficam vinculadas à rota
inicial, nesse caso app. Aqui já criamos as views (.blade.php) e as colocamos nas rotas.
O ->name dá nome às rotas. Assim, no caso de mudança de nomenclatura ou outro motivo, fica
mais fácil trocar.*/
        // Route::prefix('/app')->group(function(){

        //     Route::get('/', function(){
        //         return view('app');
        //     })->name('app');

        //     Route::get('/user', function(){
        //         return view('user');
        //     })->name('app.user');

        //     Route::get('/profile', function(){
        //         return view('profile');
        //     })->name('app.profile');
        // });

/*Essa rota imprime na tela uma tabela com os produtos */
        // Route::get('/produtos', function(){
        //     echo "<h1>Produtos</h1>";
        //     echo "<ol>";
        //     echo "<li>Notebook</li>";
        //     echo "<li>Impressora</li>";
        //     echo "<li>Mouse</li>";
        //     echo "</ol>";
        // })->name('meusprodutos');

/*REDIRECIONAMENTO */
/*São duas maneiras de fazer o redirecionamento. A primeira é mais direta e a segunda é 
mais usada. Ambas utilizam o comando redirect. A segunda utiliza o name da rota e é
usada a partir dos Controllers. */
        // Route::redirect('todosprodutos1', 'produtos', 301);

        // Route::get('todosprodutos2', function(){
        //     return redirect()->route('meusprodutos');
        // });


/////////////////////////////////////////
/*Criando rotas com o método POST, quando quer salvar algo novo. */
        // Route::post('requisicoes', function(Request $request){
        //     return "Hello POST";
        // });

/*Rota para deletar. Ex. quer deletar um produto cadastrado. Coloca nessa rota o ID do 
produto para deletá-lo */
        // Route::delete('requisicoes', function(Request $request){
        //     return "Hello DELETE";
        // });

/*PUT e PATCH servem para salvar. Ex. na edição de um produto cadastrado, quando salvar o
formulário vai enviar por PUT ou PATCH. */
        // Route::put('requisicoes', function(Request $request){
        //     return "Hello PUT";
        // });

        // Route::patch('requisicoes', function(Request $request){
        //     return "Hello PATCH";
        // });

        // Route::options('requisicoes', function(Request $request){
        //     return "Hello OPTIONS";
        // });


/*ROTAS UTILIZANDO CONTROLLERS */
Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');
Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');

Route::get('nome', 'MeuControlador@getNome');
Route::get('idade', 'MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

/*resource: linka todas as rotas que estão no método indicado nela. Nesse caso, todas as 
rotas que estão no ClienteControlador foram linkadas através do resource. Ao invés de fazer
7 rotas, só faz uma que linka todas. */
/*Pra que esse link automático aconteça, na criação do controller é preciso criar ele com o 
--resource. Assim o Laravel já entende a rota com ::resource. O Laravel tb já atribui names
para todas as rotas. */
Route::resource('clientes', 'ClienteControlador');

Route::get('opcoes/{opcao?}', function($opcao=null){
        return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');

Route::get('bootstrap', function(){
        return view('outras.exemplo');
});