@extends('layout.main')

@section('conteudo-pagina')

<@php
    if ($_POST) {
        header("Refresh: 0; url = store/{$_POST['user']}/{$_POST['livro']}?devolucao={$_POST['data_devolucao']}&status={$_POST['status_transacao']}");
    }
@endphp

    <section class="section">
        <form  method="POST">
            @csrf

            <p class="flow-text">Adicionar uma transação</p>

            <div class="input-field col s12">
                <select name="user" id="user">
                  <option value="" disabled selected>Selecione</option>
                  @foreach ($users as $user)
                        <option value={{$user->id}} > {{$user->nome}}</option>
                  @endforeach
                </select>
                <label>Cliente</label>
              </div>

              <div class="input-field col s12">
                <select name="livro">
                  <option value="" disabled selected>Selecione</option>
                  @foreach ($livros as $livro)
                        <option value={{$livro->id}} > {{$livro->nome}}</option>
                  @endforeach
                </select>
                <label>Livro</label>
              </div>

            <div class="input-field">
                <input type="date" name="data_devolucao" id="data_devolucao"/>
                <label for="data_devolucao">Data de devolução</label>
            </div>

            <div class="input-field col s12">
                <select name="status_transacao">
                  <option value="" disabled selected>Selecione</option>
                  @foreach (\App\Models\Transacao::STATUS_TRANSACAO as $key)
                        <option value={{$key}} > {{$key}}</option>
                  @endforeach
                </select>
                <label>Status da transação</label>
              </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit" name="teste">Adicionar</button>
            </div>

        </form>

    </section>

@endsection
