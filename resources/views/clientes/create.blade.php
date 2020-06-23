    @extends('layout.principal')
    @section('conteudo')

    <h3>Inserir novo cliente</h3>
    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <input type="text" name="nome">
        <input type="submit" value="salvar">
    </form>
    @endsection
  
