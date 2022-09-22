@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $postagem->titulo }}</div>

                <div class="card-body">
                    <img src={{ asset("storage/images/$postagem->imagem") }} class="card-img-top" alt="foto-{{ $postagem->id }}" style="max-height: 500px;">
                    <p class="card-text">{{ $postagem->descricao }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
