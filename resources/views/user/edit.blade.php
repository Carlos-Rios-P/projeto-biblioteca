@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <form action="{{route('usuario.update', $user->id)}}" method="POST">
            @method('PUT')
            @csrf

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{$user->nome}}"/>
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="email" id="email" value="{{$user->email}}"/>
                <label for="email">Email</label>
                @error('email')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="numero_cadastro" id="numero_cadastro" value="{{$user->numero_cadastro}}"/>
                <label for="numero_cadastro">Número do cadastro</label>
                @error('numero_cadastro')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Alterar</button>
            </div>

        </form>

    </section>

@endsection
