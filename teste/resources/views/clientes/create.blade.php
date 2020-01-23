@extends('layouts.principal')

@section('titulo', 'Clientes - Novo')

@section('conteudo')
<h3>Novo cliente</h3> 

<form action="{{route('clientes.store')}}" method="POST">
    @csrf
    <input type="text" name="nome" id="">
    <input type="submit" value="salvar">
</form>

@endsection