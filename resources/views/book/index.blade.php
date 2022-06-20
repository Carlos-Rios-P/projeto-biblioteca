@extends('layout.main')

@section('conteudo-pagina')

    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Genero</th>
                    <th>Situação</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($livros as $livro)
                    <tr>
                        <td>{{$livro->numero_registro}}</td>
                        <td>{{$livro->nome}}</td>
                        <td>{{$livro->autor}}</td>
                        <td>{{$livro->genero}}</td>
                        <td>{{$livro->situacao}}</td>
                        <td>
                            <a href="{{route('livro.edit', $livro->id)}}">
                                <span style="cursor: pointer">
                                    <i class="material-icons blue-text text-darken-1">create</i>
                                </span>
                            </a>

                            <form action="{{route('livro.delete', $livro->id)}}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>

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
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('livro.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection
