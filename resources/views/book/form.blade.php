@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <form action="{{route('livro.store')}}" method="POST">
            @csrf

            <p class="flow-text center">Adicionar um livro</p>

            <div class="input-field">
                <input type="text" name="numero_registro" id="numero_registro" value="{{old('codigo')}}"/>
                <label for="numero_registro">Código de resgistro</label>
                @error('numero_registro')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome')}}"/>
                <label for="nome">Nome do Livro</label>
                @error('nome')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="autor" id="autor" value="{{old('autor')}}"/>
                <label for="autor">Autor do livro</label>
                @error('autor')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field col s12">
                <select name="genero">
                  <option value="" disabled selected>Selecione</option>
                  @foreach (\App\Models\Livro::GENERO_LIVRO as $key)
                        <option value={{$key}} > {{$key}}</option>
                  @endforeach
                </select>
                <label>Gênero do livro</label>
              </div>

            <div class="input-field col s12">
                <select name="situacao">
                  <option value="" disabled selected>Selecione</option>
                  @foreach (\App\Models\Livro::STATUS_LIVRO as $key => $value)
                        <option value={{$key}} > {{$value}}</option>
                  @endforeach
                </select>
                <label>Situação do livro</label>
              </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Adicionar</button>
            </div>

        </form>

    </section>

@endsection
