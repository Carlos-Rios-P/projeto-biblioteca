<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Transacao;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        $transactions =  Transacao::all();

        return view('transaction.index', compact('transactions'));
    }

    public function edit()
    {
        $users = Usuario::all();

        $livros = Livro::all();

        return view('transaction.form', compact('users', 'livros'));
    }

    public function store($user, $livro, Request $request)
    {
        $usuario = Usuario::find($user);

        $book = Livro::find($livro);

        Transacao::create([
            'usuario_id'        => $usuario->id,
            'livro_id'          => $book->id,
            'nome_usuario'      => $usuario->nome,
            'nome_livro'        => $book->nome,
            'data_devolucao'    => $request->query('devolucao'),
            'status_transacao'  => $request->query('status')
        ]);

        $request->session()->flash('sucesso', "Transação criada com sucesso");

        return redirect()->route('transacao.index');
    }
}
