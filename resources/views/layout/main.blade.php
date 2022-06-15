<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Biblioteca online</title>
</head>
<body>

    {{-- Menu superior --}}
   <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{route('usuario.index')}}" class="brand-logo">Biblioteca</a>
                <ul class="right">
                    <li><a href="{{route('usuario.index')}}">Usuários</a></li>
                    <li><a href="{{route('livro.index')}}">Livros</a></li>
                </ul>
            </div>
        </div>
   </nav>

    {{-- Coteúdo da página --}}

    <div class="container">
        @yield('conteudo-pagina')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{session('sucesso')}}"});
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
