@extends('layouts.app')

@section('title', 'Data Video')

@section('content')

<div class="container">
    <a href="/user/videos/create" class="btn btn-primary mb-3">Tambah Data</a>
    
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table table-bordered table-hover table-stiped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Video</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($videos as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                        <img width="300" height="250" src="/{{$value->image}}" alt="" class="img-fluid">
                    </td>
                    <td>
                        <video  width="320" height="240" controls><source src="/{!! $value->video !!}"  type="video/mp4"></video>
                    </td>
                    <td>
                        <a href="{{route('videos.edit', $value->id)}}" class="btn btn-warning mb-1">Edit</a>
                        <form action="{{route('videos.destroy', $value->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection