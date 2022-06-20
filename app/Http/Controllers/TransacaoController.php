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
        echo $user, $livro;
        // $usuario = Usuario::find($user);

        // $book = Livro::find($livro);

        // $transacao = Transacao::create([
        //     'usuario_id'        => $usuario->id,
        //     'livro_id'          => $book->id,
        //     'nome_usuario'      => $usuario->nome,
        //     'nome_livro'        => $book->nome,
        //     'data_devolucao'    => $request->data_devolucao,
        //     'status_transacao'  => $request->status_transacao
        // ]);

        // return response()->json($transacao, 200);
    }
}
