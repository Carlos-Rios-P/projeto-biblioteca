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

    public function store($user, $livro, Request $request)
    {
        $user = Usuario::find($user);

        $livro = Livro::find($livro);

        $transacao = Transacao::create([
            'usuario_id'        => $user->id,
            'livro_id'          => $livro->id,
            'nome_usuario'      => $user->nome,
            'nome_livro'        => $livro->nome,
            'data_devolucao'    => $request->data_devolucao,
            'status_transacao'  => $request->status_transacao
        ]);

        return response()->json($transacao, 200);
    }
}
