@extends('base')

@section('content')
    <div class="container mt-4">
        <div class="columns is-multiline is-mobile">
            @for ($i = 0; $i < 10; $i++)
                <div class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop">
                    <a href="#">
                        <div class="card m-2">
                            <div class="card-image">
                                <figure class="image is-4by3 card-game">
                                    <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
    <div class="container mt-4">
        <nav class="pagination m-2" role="navigation" aria-label="pagination">
            <a class="pagination-previous" title="This is the first page" disabled>Página Anterior</a>
            <a class="pagination-next">Próxima Página</a>
            <ul class="pagination-list">
                <li>
                    <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page 2">2</a>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page 3">3</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
