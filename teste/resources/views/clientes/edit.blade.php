@extends('layouts.principal')

@section('titulo', 'Clientes - Edição')

@section('conteudo')
<h3>Novo cliente</h3>

<form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
    @csrf
    @method('PUT')  <!--Esse método é do próprio Laravel para interpretar o recebimento
    de atualizações de formulário HTML. No HTML só é possível enviar informações via GET ou 
    via POST. Assim, o Laravel identifica que a informação é de atualização e salva. -->
    <input type="text" name="nome" value="{{$cliente['nome']}}">
    <input type="submit" value="salvar">
</form>

@endsection


