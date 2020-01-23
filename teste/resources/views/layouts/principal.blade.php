<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/principal.css')}}">
    {{-- A função asset monta todo o caminho do link. Assim não precisa se preocupar tanto no
    caso de alteração de links. Funciona para a pasta public. Essa função gera o caminho
    certinho do link.--}}
</head>
<body>
    <div class="row">
        <div class="col1">
            <div class="menu">
                <ul>
                    {{-- Aqui, tudo que for da rota clientes (editar, atualizar, apagar) vai ficar com o active. É pra isso que serve o * --}}
                    <li> <a class="{{request()->routeIs('clientes.*') ? 'active' : ''}}" 
                        href="{{route('clientes.index')}}">Clientes</a></li>
                    <li> <a class="{{request()->routeIs('produtos') ? 'active' : ''}}" 
                        href="{{route('produtos')}}">Produtos</a></li>
                    <li> <a class="{{request()->routeIs('departamentos') ? 'active' : ''}}" 
                        href="{{route('departamentos')}}">Departamentos</a></li>
                    <li><a class="{{request()->routeIs('opcoes') ? 'active' : ''}}" 
                        href="{{route('opcoes')}}">Opções</a></li>
                </ul>
            </div>
        </div>
        <div class="col2">
            @yield('conteudo')
        </div>
    </div>
    
</body>
</html>