@extends('dashboard.base')
@section('content')
    <div class="container mt-6">
        <div class="card m-3">
            <form action="{{ route('dashboard.store') }}" method="post">
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
                                        placeholder="A description about the game"></textarea>
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
                                                    Choose a file…
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
    <script>
        var dateInput = document.querySelector('input[name="release_date"');
        dateInput.addEventListener('keypress', function(event) {
            event.preventDefault();
            let position = this.value.split("").length;
            if (position < 10) {
                if (position != 2 && position != 5) {
                    if ((event.keyCode >= 48 && event.keyCode <= 57)) {
                        this.value += event.key;
                        if (position == 1 || position == 4) {
                            if (position == 1) {
                                let month = parseInt(this.value);
                                if (month == 0) {
                                    this.value = "00";
                                }
                                if (month > 12) {
                                    this.value = '12';
                                }
                            }
                            if (position == 4) {
                                let date = this.value.split("");
                                let month = parseInt(date[0] + "" + date[1]);
                                let day = parseInt(date[3] + "" + date[4]);
                                let lastDay = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                                if (day > lastDay[month - 1]) {
                                    this.value = "" + date[0] + date[1] + date[2] + lastDay[month - 1];
                                }
                            }
                            this.value += '-';
                        } else if (position == 9) {
                            let date = this.value.split("");
                            let month = parseInt(date[0] + "" + date[1]);
                            let day = parseInt(date[3] + "" + date[4]);
                            let year = parseInt(date[6] + "" + date[7] + "" + date[8] + "" + date[9]);
                            if (month == 2) {
                                if (day == 29) {
                                    if (!(year % 4 == 0)) {
                                        this.value = "02-28-" + year;
                                    } else {
                                        if (year % 100 == 0 && !(year % 400 == 0)) {
                                            this.value = "02-28-" + year;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else{
                    if(event.key == "-"){
                        this.value += "-";
                    }
                }
            }
        });
        dateInput.addEventListener('blur', function(){
            let inputValue = this.value.split("");
            inputValue.forEach(function(el, index){
                if( index == 2 || index == 5 ){
                    if(el != "-"){
                        dateInput.value = "";
                        return;
                    }
                }else{
                    if(isNaN(el)){
                        console.log(el, index);
                        dateInput.value = "";
                        return;
                    }
                }
            });
        }, true);
        var priceInput = document.querySelector('input[name="price"]');
        priceInput.addEventListener('keypress', function(event){
            event.preventDefault();
            let position = this.value.split("").length;
            if(event.key == "." && position > 0){
                this.value += event.key;
                return;
            } 
            let chars = this.value.split("");
            let hasPoint = false;
            let indexPoint = 0;
            for (let index = 0; index < position; index++) {
                if(chars[index] == "."){
                    hasPoint = true;
                    indexPoint = index;
                }
            }
            if ((event.keyCode >= 48 && event.keyCode <= 57)) {
                if(hasPoint){
                    if(position < (indexPoint + 3)){
                        this.value += event.key;
                        return;
                    }
                }else{
                    this.value += event.key;
                    return;
                }
            }
        });
        var imageInput = document.querySelector('input[name="image"]');
        imageInput.addEventListener('change', function(event){
            var imageOutput = document.querySelector('#preview');
            var nameOutput = document.querySelector('.file-name');
            imageOutput.src = URL.createObjectURL(event.target.files[0]);
            imageOutput.onload = function() {
                URL.revokeObjectURL(imageOutput.src);
            }
            nameOutput.innerHTML = event.target.files[0].name;
        });
    </script>
@endsection
