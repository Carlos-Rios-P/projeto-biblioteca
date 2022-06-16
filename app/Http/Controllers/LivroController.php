<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();

        return view('book.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroRequest $request)
    {
        Livro::create($request->all());

        $request->session()->flash('sucesso', "Livro $request->nome adicionado com sucesso");

        return redirect()->route('livro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $book = Livro::findOrFail($id);

            return $book;

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Livro não encotrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $livro = Livro::findOrFail($id);

            return view('book.edit', compact('livro'));

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Livro não encotrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LivroRequest $request, $id)
    {
        try {
            $livro = Livro::findOrFail($id);
            $livro->update($request->all());

            $request->session()->flash('sucesso', "Livro alterado com sucesso");

            return redirect()->route('livro.index');

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Livro não encotrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            $livro = Livro::findOrFail($id);
            $livro->destroy($id);

            $request->session()->flash('sucesso', "Livro excluido com sucesso");

            return redirect()->route('livro.index');

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Livro não encotrado'], 404);
        }
    }
}
