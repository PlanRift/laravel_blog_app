<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1 class="my-4">Edit Postingan</h1>

        <form method="post" action="{{ url("posts/$post->id") }}">
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
            <form method="post" action="{{ url("posts/$post->id") }}">
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
        </form>
        
        <!-- delete form -->
    

    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>