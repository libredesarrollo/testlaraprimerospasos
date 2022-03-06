<div>

    <h1>{{ $slot }}</h1>

    @foreach ($posts as $p)
        <div class="card mt-2">
            <h3>
                {{ $p->title }}
            </h3>

            <a href="{{ route('web.blog.show', $p) }}">Ir</a>

            <p>{{ $p->description }}</p>
        </div>
    @endforeach

    {{ $posts->links() }}

</div>
