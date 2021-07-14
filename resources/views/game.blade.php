@extends('base')

@section('content')
    <div class="container mt-2">
        <div class="columns">
            <div class="column m-3 is-one-quarter p-3 is-hidden-mobile">
                <figure class="image">
                    <img src="{{ asset('storage/'.$game->image)}}" alt="">
                </figure>
            </div>
            <div class="column m-3">
                <div class="content box is-medium has-background-black">
                    <h1 class="title is-uppercase has-text-primary-light">{{ $game->name }}</h1>
                    <h4 class="subtitle has-text-primary-light">{{ date('m F, Y', strtotime($game->release_date))}}</h4>
                </div>
                <figure class="image is-16by9">
                    <iframe class="has-ratio" src="https://www.youtube.com/embed/{{ $game->video }}" frameborder="0"
                        allowfullscreen></iframe>
                </figure>
                <div class="content is-medium mt-4">
                    <p>{{ $game->description }}</p>
                </div>
                <div class="content is-medium">
                    <span class="tag is-link is-4 is-large"><span class="is-flex is-size-4"><span class="is-size-6">$</span>{{ $game->price }}</span></span>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
