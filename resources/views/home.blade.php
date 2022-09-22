@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Postagens</div>

                    <button type="button" class="btn btn-labeled btn-success col-2 m-2"
                        onclick="window.location='{{ URL::to('posts/novo') }}'">
                        + Nova
                    </button>

                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card-body">
                        {{-- <b>|| Adicione aqui uma listagem de postagens, com botão de publicar e remover ||</b> --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postagens as $postagem)
                                    <tr>
                                        <th scope="row" class="align-middle">{{ $postagem->id }}</th>
                                        <td class="align-middle"><img src={{ asset("storage/images/$postagem->imagem") }}
                                                alt="foto-{{ $postagem->id }}" height="50px" width="50px"></td>
                                        <td class="align-middle">{{ $postagem->titulo }}</td>
                                        <td>
                                            <div class="row mt-2">
                                                <div class="col col-4">
                                                    <form method="POST" action="{{ route('posts.publicar') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $postagem->id }}">

                                                        <button type="submit" class="btn" @if ($postagem->ativa == "S") disabled @endif>
                                                            Publicar
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="col col-4">
                                                    <form method="GET" action="{{ route('posts.editar', ['id' => $postagem->id]) }}">
                                                        <button type="submit" class="btn">
                                                            Editar
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="col col-4">
                                                    <form method="POST" action="{{ route('posts.deletar', ['id' => $postagem->id]) }}"
                                                        onsubmit="return confirm('Tem certeza que deseja remover?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn">
                                                            Remover
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
