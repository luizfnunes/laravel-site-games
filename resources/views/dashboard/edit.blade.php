@extends('dashboard.base')
@section('content')
    <div class="container mt-6">
        <div class="card m-3">
            <form action="{{ route('dashboard.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $game->id }}"/>
                <input type="hidden" name="changeImage" value="0"/>
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
                                        placeholder="The name from game" value="{{ $game->name }}">
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
                                        placeholder="In the format: mm-dd-yyyy" value="{{ date('m-d-Y', strtotime($game->release_date)) }}">
                                </div>
                                @error('release_date')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="label">Video</label>
                                <div class="control">
                                    <input name='video' class="input input @error('video') is-danger @enderror" type="text"
                                        placeholder="Code from Youtube" value="{{ $game->video }}">
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
                                        placeholder="E.g: 10,00" value="{{ $game->price }}">
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
                                        placeholder="A description about the game">{{ $game->description }}</textarea>
                                    @error('description')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Image</label>
                                <div id="input-file-image" class="control">
                                    <div class="control mb-4">
                                        <button id="cancel-changes" type="button" class="button is-danger is-fullwidth">Cancel changes</button>
                                    </div>
                                    <div class="file has-name is-fullwidth">
                                        <label class="file-label">
                                            <input class="file-input input @error('image') is-danger @enderror" type="file" accept="image/jpeg, image/png"
                                                name="image">
                                            <span class="file-cta">
                                                <span class="file-label">
                                                    Choose a file…
                                                </span>
                                            </span>
                                            <span class="file-name">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="button-file-image" class="control">
                                    <button type="button" class="button is-info is-fullwidth">Change image</button>
                                </div>
                                @error('image')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="column">
                                <div id="preview-file-image" class="columns is-mobile">
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
                                <div id="preview-button-image" class="columns is-mobile">
                                    <div class="column is-narrow">
                                        <img id="preview-button" class="image width-64" src="{{ asset('storage/' . $game->image) }}">
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
<script>
var inputFileContainer = document.querySelector('#input-file-image');
var inputButtonContainer = document.querySelector('#button-file-image');
var previewOld = document.querySelector('#preview-file-image');
var previewNew = document.querySelector('#preview-button-image');
var buttonCancel = document.querySelector('#cancel-changes');
inputButtonContainer.querySelector('button').addEventListener('click', function(){
    inputFileContainer.style.display = 'block';
    this.parentElement.style.display = 'none';
    previewOld.style.display = 'flex';
    previewNew.style.display = 'none';
    document.querySelector('input[name="changeImage"]').value = 1;
});
buttonCancel.addEventListener('click', function(){
    inputFileContainer.style.display = 'none';
    inputButtonContainer.style.display = 'block';
    previewOld.style.display = 'none';
    previewNew.style.display = 'flex';
    document.querySelector('input[name="changeImage"]').value = 0;
});
</script>
@endsection
