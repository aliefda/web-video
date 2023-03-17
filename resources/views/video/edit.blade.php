@extends('layouts.app')

@section('title', 'Data Video')

@section('content')

<div class="container">
    <a href="/user/videos" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('videos.update', $video->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @error('title')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul" value="{{$video->title}}">
                </div>
                @error('description')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{$video->description}}</textarea>
                </div>
                @error('image')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <img src="/{{$video->image}}" alt="" class="img-fluid">
                <div class="form-group">
                    <label for="">Thumbnail</label>
                    <input type="file" class="form-control" name="image" value="{{$video->image}}">
                </div>
                @error('video')
                    <small style="color: red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Video</label>
                    <input type="file" class="form-control" name="video" value="{{$video->video}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection