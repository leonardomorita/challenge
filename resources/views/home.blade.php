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

                    <div class="card-body">
                        {{-- <b>|| Adicione aqui uma listagem de postagens, com botão de publicar e remover ||</b> --}}

                        @php
                            // dd($postagens);
                        @endphp

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
                                        <th scope="row">{{ $postagem->id }}</th>
                                        <td><img src={{ asset("storage/images/$postagem->imagem") }} alt="foto-{{ $postagem->id }}" height="50px" width="50px"></td>
                                        <td>{{ $postagem->titulo }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col col-3">Editar</div>
                                                <div class="col col-4">Remover</div>
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
