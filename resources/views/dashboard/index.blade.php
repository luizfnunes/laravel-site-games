@extends('dashboard.base')
@section('content')
    <div class="container mt-6">
        @if (session('success'))
            <div class="notification is-success">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ session('error') }}
            </div>
        @endif
        <div class="card m-3">
            <header class="card-header">
                <p class="card-header-title is-flex is-justify-content-space-between">
                    Games <a href="{{ route('dashboard.create') }}" class=" button is-primary is-pulled-right">Insert</a>
                </p>
            </header>
            <div class="card-content">
                @if ($countResults > 0)
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Game</th>
                                <th>Release</th>
                                <th>Video</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Game</th>
                                <th>Release</th>
                                <th>Video</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($games)
                                @foreach ($games as $game)
                                    <tr>
                                        <td><img class="image width-48 is-pulled-left mr-4"
                                                src="{{ asset('storage/' . $game->image) }}"> {{ $game->name }}</td>
                                        <td>{{ date('m-d-Y', strtotime($game->release_date)) }}</td>
                                        <td>{{ $game->video }}</td>
                                        <td>{{ $game->price }}</td>
                                        <td class="has-text-right"><a href="{{ route('dashboard.edit', $game->id) }}"
                                                class="button is-info is-small">Edit</a>
                                            <button data-id="{{ $game->id }}" data-name="{{ $game->name }}"
                                                class="button is-danger is-small delete-button">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                @else
                    <p>There are no games to display!</p>
                @endif
            </div>
            <footer class="card-footer">
                @if ($pages > 0)
                    <nav class="card-footer-item pagination is-small" role="navigation" aria-label="pagination">
                        <a class="pagination-previous" @if ($page == 1) disabled @endif>Previous</a>
                        <a class="pagination-next" @if ($page == $pages) disabled @endif>Next page</a>
                        <ul class="pagination-list">
                            @for ($i = 0; $i < $pages; $i++)
                                <li>
                                    <a href="{{ route('dashboard.index', $i + 1) }}" class="pagination-link @if ($i + 1==$page) is-current @endif"
                                        aria-label="Page {{ $i + 1 }}" aria-current="page">{{ $i + 1 }}</a>
                                </li>
                            @endfor
                        </ul>
                    </nav>
                @endif
            </footer>
        </div>
    </div>
    <div id="delete-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
            </header>
            <form action="{{ route('dashboard.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="id">
                <section class="modal-card-body">
                    Do you really want to delete the game: <strong id="modal-game-name"></strong>?
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success">Yes</button>
                    <button type="button" class="button" id="close-modal">No</button>
                </footer>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/close.js') }}"></script>
    <script>
        var deleteButton = document.querySelectorAll('.delete-button');
        deleteButton.forEach(function(button) {
            button.addEventListener('click', function() {
                let deleteModal = document.querySelector('#delete-modal');
                let modalGameName = deleteModal.querySelector('#modal-game-name');
                modalGameName.innerHTML = this.dataset.name;
                let ModalGameId = deleteModal.querySelector('input[name="id"]');
                ModalGameId.value = this.dataset.id;
                deleteModal.classList.add('is-active');
            });
        });
        var closeModal = document.querySelector('#close-modal');
        closeModal.addEventListener('click', function() {
            let deleteModal = document.querySelector('#delete-modal');
            let modalGameName = deleteModal.querySelector('#modal-game-name');
            modalGameName.innerHTML = '';
            deleteModal.classList.remove('is-active');
        });
    </script>
@endsection
