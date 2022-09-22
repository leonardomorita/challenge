@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Postagens</div>

                    <div class="card-body">
                        {{-- <b>|| Adicione aqui as postagens ativas ||</b> --}}

                        @forelse ($postagens as $postagem)
                            <div class="card" style="width: 18rem;">
                                <img src={{ asset("storage/images/$postagem->imagem") }} class="card-img-top" alt="foto-{{ $postagem->id }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $postagem->titulo }}</h5>
                                    <p class="card-text">{{ strlen($postagem->descricao) > 100 ? substr($postagem->descricao, 0, 100) . '...' : $postagem->descricao }}</p>
                                    <a href="{{ route('public.postagem', ['id' => $postagem->id]) }}" class="btn btn-primary">Abrir postagem</a>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-success">
                                Nenhuma postagem ativa
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
