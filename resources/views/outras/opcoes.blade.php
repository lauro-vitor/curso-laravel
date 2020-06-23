@extends('layout.principal')
@section('conteudo')
    @section('titulo','Opcoes')
    <div>
        <ul class="options">
            <li><a class="warning" href="{{route('opcoes',1)}}">warning</a></li>
            <li><a class="info" href="{{route('opcoes',2)}}">info</a></li>
            <li><a  class="success" href="{{route('opcoes',3)}}">success</a></li>
            <li><a  class="error"    href="{{route('opcoes',4)}}">error</a></li>
        </ul>
    </div>
    @if(isset($opcao))
        @switch($opcao)
            @case(1)
                @component('components.alerta',['titulo'=>'erro fatal', 'tipo'=>'warning'])
                    <p>warning</p>
                    <p>Ocorreu um erro inesperado</p>
                @endcomponent
                @break
            @case(2)
                @component('components.alerta', ['titulo'=>'erro fatal', 'tipo' => 'info'])
                    <p>info</p>
                    <p>Ocorreu um erro inesperado</p>
                @endcomponent
                @break
            @case(3)
                @component('components.alerta', ['titulo'=>'erro fatal', 'tipo' => 'success'])
                    <p>sucess</p>
                    <p>Ocorreu um erro inesperado</p>
                @endcomponent
                @break
            @case(4)
                @component('components.alerta', ['titulo'=>'erro fatal', 'tipo' => 'error'])
                    <p>error</p>
                    <p>Ocorreu um erro inesperado</p>
                @endcomponent
                @break
        @endswitch    
    @endif
@endsection