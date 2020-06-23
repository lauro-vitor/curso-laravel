
  @extends('layout.principal')
  @section('titulo', 'Clientes')
  @section('conteudo')
    <h3>{{$titulo}}</h3>
    <a href="{{route('clientes.create')}}">Novo Cliente</a>
    @if(count($clientes) > 0)
        <ul>
            @foreach($clientes as $c)
            <li>
                {{$c['id']}} | {{$c['nome']}} |
                <a href="{{route('clientes.edit', $c['id'])}}">Editar</a> |
                <a href="{{route('clientes.show', $c['id'])}}">Info</a>
            <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="apagar" class="btn btn-primary">
                </form>
            </li>
            @endforeach
        </ul>
        @else
            <h3>Não existem clientes cadastrados</h3>
    @endif
  @endsection