@extends('layouts.app')

@section('title', 'Video')

@section('content')
<div class="container">
    <a href="/" class="btn btn-primary mb-3">Kembali</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <video style="width: 100%;" controls="true" autoplay="autoplay" loop="true" muted defaultmuted >
                <source src="{{ asset($video->video) }}" type="video/mp4">
            </video>
        </div>
    </div>
</div>

@endsection
