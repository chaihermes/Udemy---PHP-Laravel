@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
<h3>Departamentos</h3>

<ul>
    <li>Computadores</li>
    <li>Acessórios</li>
    <li>Roupas</li>
    <li>Eletrônicos</li>
</ul>

{{-- Depois de registrarmos o componente no AppServiceProvider, não precisamos mais escrever
dessa maneira: --}}
        {{-- @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'info'])
            {{-- Aqui, o título vai receber o parâmentro erro fatal através de um array associativo
            e o component alerta reeberá essa informação através da variável titulo. --}}
            {{-- Esses HTML aqui serão traduzidos no alerta.blade através da variável slot. --}}
            {{-- <p><strong>Erro</strong></p>
            <p>Ocorreu um erro inesperado</p> --}}
        {{-- @endcomponent  --}}

{{-- Agora escrevemos assim: --}}
@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'info'])
    <p><strong>Erro</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'error'])
    <p><strong>Erro</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'success'])
    <p><strong>Erro</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'warning'])
    <p><strong>Erro</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endalerta

@endsection