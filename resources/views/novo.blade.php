@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nova postagem</div>

                    <div class="card-body">
                        {{-- <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                        <br>
                        <b>|| Usar AJAX no submit e uma barra de progresso (envio em % ou bytes, qualquer comunicação de
                            andamento) ||</b> --}}

                        <form action="{{ route('posts.criar') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" max="120">
                            </div>

                            <div class="mb-3">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
                            </div>

                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="imagem" name="imagem" required>
                                <label class="custom-file-label" for="imagem">Escolher Imagem</label>
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Postagem Ativa?</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ativa"
                                                id="sim" value="S" checked>
                                            <label class="form-check-label" for="sim">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ativa"
                                                id="nao" value="N">
                                            <label class="form-check-label" for="nao">
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
