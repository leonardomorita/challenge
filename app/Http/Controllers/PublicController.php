<?php

namespace App\Http\Controllers;

use App\Postagem;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postagens = Postagem::query()->where('ativa', '=', 'S')->get();

        return view('public', compact('postagens'));
    }

    public function postagem($id)
    {
        $postagem = Postagem::find($id);

        return view('public_post', compact('postagem'));
    }
}
