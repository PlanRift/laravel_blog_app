@extends('layouts.app')
@section('title', "Beranda")
@section('content')
<h1 class="my-4">Edit Postingan</h1>

<form method="post" action="{{ url("posts/$post->slug") }}">
    @method('patch')
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea class="form-control" id="content" rows="3" name="content" value="{{ $post->content }}" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal">Hapus</button>

</form>
<!-- <form method="post" action="{{ url("posts/$post->id") }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal">Hapus</button>
</form> -->

<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="removeModalLabel">Hapus Blog?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apa anda yakin ingin menghapus postingan: <br>
                "<span class="text-danger fw-bold">{{ $post->title }}</span>"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nevermind</button>
                <form method="post" action="{{ url("posts/$post->id") }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection