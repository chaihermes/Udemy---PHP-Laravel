<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

    private $clientes = [
        ['id'=>1, 'nome'=>'Chaiana'],
        ['id'=>2, 'nome'=>'Pavlos'],
        ['id'=>3, 'nome'=>'Daniel'],
        ['id'=>4, 'nome'=>'Carina']
    ];

    //nessa função está construindo uma sessão que vai guardar as informações.
    public function __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes))
            session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Aqui é possível gerar uma lista de todos os seus clientes.
        //Pastas são separadas por ponto.
        //O atributo $clientes aqui, está informando pra view que está recebendo as informações
        //da lista de clientes acima.
        //Esse atributo está recebendo informações da session constrída acima.
        $clientes = session('clientes');
        //Outra maneira de fazer a view retornar:
        $texto = "Todos os Clientes";
            return view('clientes.index',
                    ['clientes'=>$clientes, 'titulo'=>$texto]);

                // return view('clientes.index')
                //     ->with('clientes', $clientes)
                //     ->with('titulo', "Todos os clientes");
        //Deixa de retornar a view com o compact e passa a retornar com a função with, 
        //que usa como parâmetros a session clientes e a variável clientes.
        //O parâmetro "Todos os clientes" também pode ser armazenado em uma variável, como
        //no caso de $clientes.
            //return view('clientes.index', compact(['clientes']));
        //O compact retorna um array associativo. No 1 caso, escrevemos todo o array. 
        //No caso do compact, ele faz a parte do array sozinho.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Abre um formulário para criar um novo cliente.
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        //Salva o novo cliente através do método Post.
        $clientes = session('clientes'); //utiliza a sessão clientes para obter as informações dos clientes.
        //$id = count($clientes) + 1; //Faz a contagem dos id, somando 1 ao último id existente.
        $id = end($clientes)['id'] + 1; //agora está somando 1 ao último id existente.
        $nome = $request->nome; //esse nome é a mesma palavra usada no campo name do formulário.
        $dados = ["id"=>$id, "nome"=>$nome];    //salva o id e o nome de um novo cliente.
        $clientes[] = $dados;
        session(['clientes'=>$clientes]);
        //dd($this->clientes);  //apenas para visualizar o novo nome salvo.
        return redirect()->route('clientes.index');     //redireciona para index com a lista de clientes.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Visulização de dados de um determinado cliente.
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        //$cliente = $clientes[$id - 1];  //vai pegar o id na posição 0.
        return view('clientes.info', compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Na lista de clientes, quando se clica no botão para editar um cliente. 
        //Abre um formulário com os dados do cliente para ele poder editar.
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        //$cliente = $clientes[$id - 1];  //vai pegar o id na posição 0.
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Salva as informações editadas do cliente.
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        //$clientes[$id - 1]['nome'] = $request->nome;   
        session(['clientes'=>$clientes]);
        return redirect()->route('clientes.index');    
        //na sessão de clientes, está informando o campo nome será atualizado e retorna para
        //a página index. 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Apagar/deletar um cliente da lista.
        $clientes = session('clientes');    //recupera o array de clientes.
        //$ids = array_column($clientes, 'id');   //dentro do array de clientes, está buscando o id 
        //$index = array_search($id, $ids);   //está buscando o id dentro de ids
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1); //dentro de clientes, no id que buscou, vai deletar um único item.
        session(['clientes' => $clientes]); //vai trazer o novo array de clientes.
        return redirect()->route('clientes.index');    
    }

    private function getIndex($id, $clientes){
        $ids = array_column($clientes, 'id');   //dentro do array de clientes, está buscando o id 
        $index = array_search($id, $ids);   //está buscando o id dentro de ids
        return $index;
        //essa função foi criada para resolver o problema de quando apaga um nome da lista de
        //clientes. QUando apaga, o id fica vinculado ao antigo, pois na função update, ele
        //atualizava pelo id - 1.
    }
}

///////////////////////////////////////////////////////////////
//TODA ESSA PARTE DE FUNÇÕES FOI CRIADA DESSE JEITO PORQUE AINDA NÃO ESTAMOS USANDO
//BANCO DE DADOS
///////////////////////////////////////////////////////////////