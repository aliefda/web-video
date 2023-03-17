@extends('layouts.app')

@section('title', 'List Video')

@section('content')
<div class="container">
    <div class="row">
        @foreach($video as $key => $value)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
            @csrf
                <a href="{{route('home.player',$value->id)}}" class="video-link" data-id="{{ $value->id }}">
                    <img class="card-img-top" src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $value->title }}</h5>
                    <p class="card-text">{{ $value->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $value->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
