<?php

namespace App\Http\Controllers;

use App\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function novo()
    {
        return view('novo');
    }

    public function criar(Request $request)
    {
        $data = $request->except('_token');

        $originalImageName = $data['imagem']->getClientOriginalName();
        $imageName = time() . '_' . $originalImageName;
        $request->imagem->storeAs('public/images', $imageName);
        $data['imagem'] = $imageName;
        Postagem::create($data);

        return redirect()->route('home')->with('message', 'Postagem adicionada');
    }

    public function editar($id)
    {
        $postagem = Postagem::find($id);

        return view('editar', compact('postagem'));
    }

    public function atualizar($id, Request $request)
    {
        $postagem = Postagem::find($id);
        $data = $request->except('_token');

        if ($request->imagem) {
            if (Storage::exists("public/images/$postagem->imagem")) {
                Storage::delete("public/images/$postagem->imagem");
            }

            $originalImageName = $data['imagem']->getClientOriginalName();
            $imageName = time() . '_' . $postagem->id . '_' . $originalImageName;
            $request->imagem->storeAs('public/images', $imageName);
            $postagem->imagem = $imageName;
        }

        $postagem->titulo = $data['titulo'];
        $postagem->descricao = $data['descricao'];
        $postagem->ativa = $data['ativa'];

        $postagem->save();

        return redirect()->route('home')->with('message', 'Postagem atualizada');
    }

    public function publicar(Request $request)
    {
        $postagem = Postagem::find($request->id);

        $postagem->ativa = 'S';
        $postagem->save();

        return redirect()->route('home')->with('message', 'Postagem publicada');
    }

    public function deletar($id)
    {
        $postagem = Postagem::find($id);

        if (Storage::exists("public/images/$postagem->imagem")) {
            Storage::delete("public/images/$postagem->imagem");
        }

        $postagem->delete();

        return redirect()->route('home')->with('message', 'Postagem deletada');
    }
}
