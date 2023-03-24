@extends('layouts.app')
@section('title', "Beranda")
@section('content')
<article class="blog-post mt-5">
    <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ date('d M Y H:i', strtotime($post->created_at))  }}</p>
    <p> {{ $post->content }}</p>

</article>

<a href="{{ url('posts') }}" class="btn btn-success">Kembali</a>
@endsection