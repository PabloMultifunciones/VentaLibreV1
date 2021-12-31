@extends('layouts.app')

@push('title')
<title>Publicar | {{ config('app.name') }}</title>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Publicar') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('publish') }}" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control @error('title') is-invalid @enderror mb-2" placeholder="Titulo" type="text" name="title">
                        @error('title')
                            <div class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror
                        <input class="form-control mb-2" placeholder="Descripcion" type="text" name="description">
                        @error('description')
                            <div class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror
                        <input class="form-control mb-2" placeholder="Precio" type="number" name="price">
                        @error('price')
                            <div class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror
                        <input class="form-control mb-2" type="file" accept="image/*" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

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
