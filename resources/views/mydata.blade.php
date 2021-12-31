@extends('layouts.app')

@push('title')
<title>Mis Datos | {{ config('app.name') }}</title>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Mis Datos') }}
                </div>
                <div class="card-body" >
                <div class="row">
                    <div class="col col-6">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <p>Nombre de Usuario: {{Auth::user()->username}}</p>
                            <p>Nombre: {{Auth::user()->name}}</p>
                            <p>Apellido: {{Auth::user()->last_name}}</p>
                            <p>Correo Electronico: {{Auth::user()->email}}</p>
                            <p>Telefono: {{Auth::user()->phone}}</p>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Actualizar Datos</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="update" action="{{ route('mydata.update') }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input class="form-control @error('name') is-invalid @enderror mb-2" value ="{{ Auth::user()->name }}" placeholder="Nombre" type="text" name="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control @error('last_name') is-invalid @enderror mb-2" value ="{{ Auth::user()->last_name }}" placeholder="Apellido" type="text" name="last_name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control @error('email') is-invalid @enderror mb-2" value ="{{ Auth::user()->email }}" placeholder="Correo Electronico" type="text" name="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control @error('phone') is-invalid @enderror mb-2" value ="{{ Auth::user()->phone }}" placeholder="Telefono" type="number" name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control mb-2 @error('password') is-invalid @enderror" placeholder="Contraseña" type="password" name="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </form>
                                    </div>
                                    <div class="modal-footer d-flex">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('update').submit()">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-6 d-flex">
                        <div class="row">
                            <div class="col col-12">
                                <img src="{{ Auth::user()->getImgUser() }}" class="rounded mx-auto d-block img-thumbnail mb-3" style="width:10rem;height:10rem">
                                </div>
                                <div class="col col-12">
                                <form method="post" action="{{ route('mydata')}}" enctype="multipart/form-data">
                                    @csrf                            
                                    <div class="input-group">
                                        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Enviar</button>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
