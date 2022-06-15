@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <form action="{{route('livro.update', $livro->id)}}" method="POST">
            @method('PUT')
            @csrf

            <div class="input-field">
                <input type="text" name="numero_registro" id="numero_registro" value="{{$livro->numero_registro}}"/>
                <label for="numero_registro">Número do registro</label>
                @error('numero_registro')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{$livro->nome}}"/>
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="autor" id="autor" value="{{$livro->autor}}"/>
                <label for="autor">Autor</label>
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
                        <option value={{$key}}
                            @if ($key == $livro->genero)
                                selected = "selected"
                            @endif> {{$key}}
                        </option>
                  @endforeach
                </select>
                <label>Gênero do livro</label>
              </div>

            <div class="input-field col s12">
                <select name="situacao">
                  <option value="" disabled selected>Selecione</option>
                  @foreach (\App\Models\Livro::STATUS_LIVRO as $key => $value)
                        <option value={{$key}}
                            @if ($key == $livro->situacao)
                                selected = "selected"
                            @endif> {{$value}}
                        </option>
                  @endforeach
                </select>
                <label>Situação do livro</label>
              </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Alterar</button>
            </div>

        </form>

    </section>

@endsection
