@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <form action="{{route('transacao.store')}}" method="POST">
            @csrf

            <p class="flow-text">Adicionar uma transação</p>

            <div class="input-field col s12">
                <select name="user_id" id="user_id">
                  <option value="" disabled selected>Selecione</option>
                  @foreach ($users as $user)
                        <option value={{$user->id}} > {{$user->nome}}</option>
                  @endforeach
                </select>
                <label>Cliente</label>
                @error('user_id')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
              </div>

              <div class="input-field col s12">
                <select name="livro_id" id="livro_id">
                  <option value="" disabled selected>Selecione</option>
                  @foreach ($livros as $livro)
                        <option value={{$livro->id}} > {{$livro->nome}}</option>
                  @endforeach
                </select>
                <label>Livro</label>
                @error('livro_id')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
              </div>

            <div class="input-field">
                <input type="date" name="data_devolucao" id="data_devolucao"/>
                <label for="data_devolucao">Data de devolução</label>
                @error('data_devolucao')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
            </div>

            <div class="input-field col s12">
                <select name="status_transacao" id="status_transacao">
                  <option value="" disabled selected>Selecione</option>
                  @foreach (\App\Models\Transacao::STATUS_TRANSACAO as $key)
                        <option value={{$key}} > {{$key}}</option>
                  @endforeach
                </select>
                <label>Status da transação</label>
                @error('status_transacao')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                @enderror
              </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit" name="teste">Adicionar</button>
            </div>

        </form>

    </section>

@endsection
