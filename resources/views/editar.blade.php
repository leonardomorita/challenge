@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar postagem</div>

                    <div class="card-body">
                        <form action="{{ route('posts.atualizar', ['id' => $postagem->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" max="120" value="{{ $postagem->titulo }}">
                            </div>

                            <div class="mb-3">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" rows="3" name="descricao" required>{{ $postagem->descricao }}</textarea>
                            </div>

                            <img src={{ asset("storage/images/$postagem->imagem") }} class="mb-1" alt="foto-{{ $postagem->id }}" width="80px" height="80px">

                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="imagem" name="imagem">
                                <label class="custom-file-label" for="imagem">Trocar Imagem</label>
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Postagem Ativa?</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ativa"
                                                id="sim" value="S" @if ($postagem->ativa == 'S') checked @endif>
                                            <label class="form-check-label" for="sim">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ativa"
                                                id="nao" value="N" @if (!$postagem->ativa == 'N') checked @endif>
                                            <label class="form-check-label" for="nao">
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
