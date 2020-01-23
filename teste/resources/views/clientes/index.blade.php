@extends('layouts.principal')
<!--extende o template principal pra essa view.-->

@section('titulo', 'Clientes')

@section('conteudo')
<!--No template, dizemos que iremos utilizar a section conteudo em algum lugar, através do
yield. Assim, os arquivos se converam.-->

<h3>{{$titulo}}:</h3>
<!--Esse título vem do ClienteControlador, na função index.-->
<a href="{{route ('clientes.create')}}">Cadastrar novo cliente</a>
<!--Esse link cria o botão para cadastro de novo cliente-->

<!--Esse if é pra mostrar a lista de clientes apenas se existir lista. Caso não haja nenhum
cliente cadastrado, não exibe nada. -->
@if(count($clientes)>0)

    <ul>
        @foreach ($clientes as $c)
            <li>
                {{$c['id']}} |  {{$c['nome']}} | 
                <a href="{{route ('clientes.edit', $c['id'])}}">Editar</a>
                <!--Esse link cria o botão de editar ao lado do nome de cada cliente.-->
                <a href="{{route ('clientes.show', $c['id'])}}">Info</a>
                <!--Esse link mostra as informações dos clientes através da rota show.-->
                <form action="{{route ('clientes.destroy', $c['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="apagar">
                </form>
            </li>
        @endforeach
    </ul>


    <hr>
    {{-- Outras funcionalidades: O {{}} serve pra imprimir na tela.--}}
    {{-- Imprime de 0 a 9: --}}
    @for($i=0; $i<10; $i++)
        {{ $i }}, 
    @endfor
    <hr>
    <br>

    {{-- Imprime os nomes dos clientes: --}}
    @for($i=0; $i<count($clientes); $i++)
        {{ $clientes[$i]['nome'] }}, 
    @endfor
    <hr>
    <br>

    {{-- Imprime os nomes dos clientes e é possível saber qual é o primeiro e qual é o último 
    nome da lista --}}
    @foreach ($clientes as $c)
        <p>
            {{$c['nome']}} |
            @if($loop->first)
                (primeiro)
            @endif
            @if($loop->last)
                (último)
            @endif
            {{-- Imprime o índice, a posição e a quantidade total de iterações. --}}
            ({{$loop->index}}) - {{$loop->iteration}} / {{$loop->count}}
        </p> 
    @endforeach
    <hr>
    <br>

@else 
<h4>Não existem clientes cadastrados.</h4>
@endif

<!--A função empty tem o mesmo objetivo que o else acima.-->
@empty($clientes)
    <h4>Não existem clientes cadastrados.</h4>
@endempty

@endsection

{{-- É possível criar diversas sessões com os conteúdos da página e na página de template
organizá-los através do yield. --}}