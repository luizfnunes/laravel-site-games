@extends('dashboard.base')
@section('content')
    <div class="container mt-6">
        @if (session('error'))
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ session('error') }}
            </div>
        @endif
        <div class="card m-3">
            <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <header class="card-header">
                    <p class="card-header-title">
                        Game Data
                    </p>
                </header>
                <div class="card-content">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input name='name' class="input @error('name') is-danger @enderror" type="text"
                                        placeholder="The name from game" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="label">Release Date</label>
                                <div class="control">
                                    <input name='release_date'
                                        class="input input @error('release_date') is-danger @enderror" type="text"
                                        placeholder="In the format: mm-dd-yyyy" value="{{ old('release_date') }}">
                                </div>
                                @error('release_date')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="label">Video</label>
                                <div class="control">
                                    <input name='video' class="input input @error('video') is-danger @enderror" type="text"
                                        placeholder="Code from Youtube" value="{{ old('video') }}">
                                </div>
                                <p class="help">Only the end code. e.g: <span
                                        class='has-text-grey-lighter'>https://www.youtube.com/watch?v=</span><span
                                        class="has-text-success">0X3Txf1gg50</span></p>
                                @error('video')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="label">Price</label>
                                <div class="control">
                                    <input name='price' class="input input @error('price') is-danger @enderror" type="text"
                                        placeholder="E.g: 10,00" value="{{ old('price') }}">
                                </div>
                                @error('price')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="column">
                            <div class="field">
                                <label class="label">Description</label>
                                <div class="control">
                                    <textarea name='description'
                                        class="textarea input @error('description') is-danger @enderror"
                                        placeholder="A description about the game">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Image</label>
                                <div class="control">
                                    <div class="file has-name is-fullwidth">
                                        <label class="file-label">
                                            <input class="file-input input @error('image') is-danger @enderror" type="file" accept="image/jpeg, image/png"
                                                name="image">
                                            <span class="file-cta">
                                                <span class="file-label">
                                                    Choose a file???
                                                </span>
                                            </span>
                                            <span class="file-name">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="column">
                                <div class="columns is-mobile">
                                    <div class="column is-narrow">
                                        <img id="preview" class="image width-64" src="{{ asset('image/select.jpg') }}">
                                    </div>
                                    <div class="column">
                                        <h2 class='has-text-weight-semibold'>Image rules:</h2>
                                        <ul>
                                            <li>Size: 600x900</li>
                                            <li>Image Ratio: 2:3</li>
                                            <li>Formats: jpg, png</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="{{ route('dashboard.index') }}" class="card-footer-item">Cancel</a>
                    <button class="card-footer-item has-background-primary-light">Save</button>
                </footer>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/close.js') }}"></script>
<script src="{{ asset('js/masks.js') }}"></script>
@endsection
