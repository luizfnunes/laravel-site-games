@extends('base')

@section('content')
    <div class="container mt-4">
        @if ($countResults > 0)
            <div class="columns is-multiline is-mobile">
                @foreach ($games as $game)
                    <div class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop">
                        <a href="{{ route('game', ['id' => $game->id]) }}" title="{{ $game->name }}">
                            <div class="card m-2">
                                <div class="card-image">
                                    <figure class="image card-game">
                                        <img src="{{ asset('storage/' . $game->image) }}" alt="Placeholder image">
                                    </figure>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Notting to show!</p>
        @endif
    </div>
    <div class="container mt-4">
        @if ($pages > 0)
            <nav class="card-footer-item pagination" role="navigation" aria-label="pagination">
                <a class="pagination-previous" @if ($page == 1) disabled @else href="{{ route('index', $page - 1) }}" @endif>Previous</a>
                <a class="pagination-next" @if ($page == $pages) disabled @else href="{{ route('index', $page + 1) }}" @endif>Next
                    page</a>
                <ul class="pagination-list">
                    @for ($i = 0; $i < $pages; $i++)
                        <li>
                            <a href="{{ route('index', $i + 1) }}" class="pagination-link @if ($i +
                                1==$page) is-current @endif" aria-label="Page {{ $i + 1 }}"
                                aria-current="page">{{ $i + 1 }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        @endif
    </div>
@endsection
