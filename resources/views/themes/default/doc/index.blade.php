<h1 class="first">Docs</h1>

@forelse ($docs as $k => $v)
    @if ($k > 0)
        <hr/>
    @endif

    <h2><a href="{{ $v->url }}">{{ $v->title }}</a></h2>

    {{-- <div class="text-muted">{{ $v->posts_count }} Part Series</div>

    <br/>

    <ul>
        @foreach ($v->posts as $p)
            <li><a href="{{ $p->url }}">{{ $p->title }}</a></li>
        @endforeach
    </ul> --}}
@empty
    <br/>

    No docs found.
@endforelse