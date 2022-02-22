<form action="{{ route('post.store') }}" method="POST">
    @csrf

    <label for="title" class="bmd-label-floating">Título</label>
    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">

    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <label for="url_clean" class="bmd-label-floating">Url limpia</label>
    <input type="text" name="url_clean" id="url_clean" value="{{ old('url_clean', $post->url_clean) }}">




    <label for="posted" class="bmd-label-floating">Posted</label>





    <label for="content">Contenido</label>
    <textarea id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>


    <input type="hidden" id="token" value="{{ csrf_token() }}">

    <input type="submit" value="Enviar" class="btn btn-primary">
</form>
