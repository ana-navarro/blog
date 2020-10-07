<div class="form-group">
    <label>Titulo</label>
    <input type="text" name="title" class="form-control"
        value="{{ old('title', $post->title ?? null) }}"/>
</div>

<div class="form-group">
    <label>Conteudo</label>
    <p>
        <input type="text" name="content" class="form-control" value="{{ old('content', $post->content ?? null) }}"/>
    </p>
</div>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
