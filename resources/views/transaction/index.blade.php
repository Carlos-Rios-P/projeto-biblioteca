@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome de cliente</th>
                    <th>Nome do livro</th>
                    <th>Data de devolução</th>
                    <th>Status da transação</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->nome_usuario}}</td>
                        <td>{{$transaction->nome_livro}}</td>
                        <td>{{$transaction->data_devolucao}}</td>
                        <td>{{$transaction->status_transacao}}</td>
                        <td>
                            <a href="#">
                                <span style="cursor: pointer">
                                    <i class="material-icons blue-text text-darken-1">create</i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não existem livros cadastrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('transacao.form')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection
