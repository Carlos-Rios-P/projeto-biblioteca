@extends('layout.main')

@section('conteudo-pagina')

<section class="section">
    <form action="{{route('transacao.update', $transaction->id)}}" method="POST">
    @method('PUT')
    @csrf

    <div class="input-field col s12">
        <select name="status_transacao">
            <option value="" disabled selected>Selecione</option>
                @foreach (\App\Models\Transacao::STATUS_TRANSACAO as $key)
                    <option value={{$key}}
                        @if ($key == $transaction->status_transacao)
                            selected = "selected"
                        @endif> {{$key}}
                    </option>
                 @endforeach
        </select>
        <label>Status da transação</label>
    </div>

    <div class="right-align">
        <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
        <button class="btn waves-effect waves-light" type="submit">Alterar</button>
    </div>

    </form>

</section>

@endsection
