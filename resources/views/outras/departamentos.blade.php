@extends('layout.principal')
@section('titulo','departamentos')
@section('conteudo')
    <h3>departamentos</h3>
    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Acessórios</li>
        <li>Roupas</li>
    </ul>
    @component('components.alerta',['titulo'=>'erro fatal', 'tipo'=>''])
        <p>Erro inesperado</p>
        <p>Ocorreu um erro inesperado</p>
    @endcomponent
    @component('components.alerta', ['titulo'=>'erro fatal', 'tipo' => ''])
        <p>Erro inesperado</p>
        <p>Ocorreu um erro inesperado</p>
    @endcomponent
    @component('components.alerta', ['titulo'=>'erro fatal', 'tipo' => ''])
        <p>Erro inesperado</p>
        <p>Ocorreu um erro inesperado</p>
    @endcomponent
   
@endsection