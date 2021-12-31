@extends('layouts.app')

@push('title')
<title>Publicar | {{ config('app.name') }}</title>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">{{ $article->title }}</h2>
                </div>

                <div class="card-body">
                   <div class="row">
                        <div class="col col-6">
                            <p>Publicado por: {{$article->user()->first()->name}}</p>
                            <p>Descripcion: {{$article->description}}</p>
                            <p>Contacto: {{$article->user()->first()->email}}</p>
                            <p>Precio: ${{$article->price}}</p>
                            <p>Contacto:</p>
                            <ul>
                                <li>{{$article->user()->first()->email}}</li>
                                <li>{{$article->user()->first()->phone}}</li>
                            </ul>
                        </div>
                        <div class="col col-6 ">
                            <img src="{{$article->getImagePublish()}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
