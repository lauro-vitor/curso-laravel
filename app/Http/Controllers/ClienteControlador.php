<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{   
    private $clientes = [
        ['id'=> 1, 'nome'=> 'ademir'],
        ['id'=> 2, 'nome'=> 'joão'],
        ['id'=> 3, 'nome'=> 'maria'],
        ['id'=> 4, 'nome'=> 'aline'],
        ['id'=> 5, 'nome'=> 'fulano']
    ];
    public function __construct(){
        $clientes = session('clientes');
        if(!isset($clientes)) {
            session(['clientes' => $this->clientes]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //exibir todos os clientes
        $clientes = session('clientes');
        //enviando parameter para view com array associativo
        return view('clientes.index',['clientes' => $clientes, 'titulo' => 'todos os clientes']);
        //outra forma de enviar parâmetros para a view
        //whith('nameParam','valueParam');
        /*return view('clientes.index')
                ->with('clientes',$clientes)
                ->with('titulo','todos os clientes');*/

        //return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //inserir um cliente
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
        //salvar novo cliente
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1;
        $novoCliente = ['id' => $id,'nome'=>$request->nome];
        $clientes[] = $novoCliente;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ver alguma informação de um determinado cliente
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.info',compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editar as informações de um determinado cliente
        //carrega os dados de um determinado cliente, para editar
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit',compact(['cliente']));
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
        //efetua as alterações do edit
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //apagar o cliente da lista
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }
    private function getIndex($id, $clientes){
        $colid = array_column($clientes, 'id');
        $index = array_search($id, $colid);
        return $index;
    }
}
