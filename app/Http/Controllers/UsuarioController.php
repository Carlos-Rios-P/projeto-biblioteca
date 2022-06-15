<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuario::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        Usuario::create($request->all());

        $request->session()->flash('sucesso', "Usuario $request->nome cadastrado com sucesso");

        return redirect()->route('usuario.index');
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

            $user = Usuario::findOrFail($id);

            return $user;

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Usuario não encotrado'], 404);
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
            $user = Usuario::findOrFail($id);

            return view('user.edit', compact('user'));

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Usuario não encotrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        try {

            $user = Usuario::findOrFail($id);
            $user->update($request->all());

            $request->session()->flash('sucesso', "Usuario alterado com sucesso");

            return redirect()->route('usuario.index');

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Usuario não encotrado'], 404);
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

            $user = Usuario::findOrFail($id);
            $user->destroy($id);

            $request->session()->flash('sucesso', "Usuario deletado com sucesso");

            return redirect()->route('usuario.index');
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Usuario não encotrado'], 404);
        }
    }
}
