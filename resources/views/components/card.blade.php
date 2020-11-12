<div class="col-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-2">{{ $slot }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            @if(is_a($items, 'Illuminate\Support\Collection'))
            @foreach ($items as $item )
                <li class="list-group-item">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        {{ $item}}
                    </a>
                </li>
            @endforeach
            @else
                {{ $items }}
            @endif
        </ul>
    </div>
</div>

