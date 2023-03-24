@extends('layouts.app')
@section('title', "Beranda")
@section('content')
<h1>
  Blog-Ku <a href="{{ url('posts/create') }}" class="btn btn-warning">+ Buat Post</a>

  <a href="{{ url('posts/trash') }}" class="btn btn-danger">Riwayat Hapus</a>
</h1>

@foreach($posts as $p)

<div class="card my-4">
  <div class="card-body">
    <h5 class="card-title">{{ $p->title }}</h5>
    <p class="card-text">{{ $p->content }}</p>
    <p class="card-text"><small class="text-muted">Created At {{ date("d M Y H:i", strtotime($p->created_at)) }}
      </small> </p>
    <a href="{{ url("posts/$p->slug") }}" class="btn btn-primary">Selengkapnya</a>
    <a href="{{ url("posts/$p->slug/edit") }}" class="btn btn-warning">Edit</a>
  </div>
</div>

@endforeach
@endsection