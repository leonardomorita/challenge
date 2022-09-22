<?php

namespace App\Http\Controllers;

use App\Postagem;
use Illuminate\Http\Request;

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

        return redirect()->route('home');
    }
}
