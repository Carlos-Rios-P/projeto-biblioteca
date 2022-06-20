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

    public function create()
    {
        $users = Usuario::all();

        $livros = Livro::all()->where('situacao', '=', 1);

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

        $book->update([
            'situacao' => 0
        ]);

        $request->session()->flash('sucesso', "Transação criada com sucesso");

        return redirect()->route('transacao.index');
    }

    public function edit($id)
    {
        try {

            $transaction = Transacao::findOrFail($id);

            return view('transaction.edit', compact('transaction'));

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Transação não escontrada'], 404);
        }
    }

    public function update($id, Request $request)
    {
    try {

        $transaction = Transacao::findOrFail($id);

        $livro = Livro::findOrFail($transaction->livro_id);

        if ($request->status_transacao == 'Devolvido') {
            $livro->update([
            'situacao' => 1
            ]);
        }

        $transaction->update([
        'status_transacao' => $request->status_transacao
        ]);

        return redirect()->route('transacao.index');

    } catch (\Throwable $th) {
        return response()->json(['erro' => 'Transação não escontrada'], 404);
    }
    }
}
