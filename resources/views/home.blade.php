@extends('layouts.app')

@push('title')
<title>Inicio | {{ config('app.name') }}</title>
@endpush

@push('style')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($publications as $publication)
                <a href="{{ route('article',$publication->id) }}" id="link-card">
                    <div class="card mb-3" id="card">
                        <div class="row ">
                            <div class="col-4">
                                <img src="{{$publication->user()->first()->getImgUser()}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$publication->title}}</h5>
                                    <p class="card-text">{{$publication->user()->first()->username}}</p>
                                    <p class="card-text">{{$publication->description}}</p>
                                    <p class="card-text"><small class="text-muted">{{$publication->created_at}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
