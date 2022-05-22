@extends('layouts.movies')
@section('intro')
    <section class="jumbotron text-center mt-8">
        <div class="container">
            <h1>Duplitrade Movies VOD</h1>
            <p class="lead text-muted">Stop ! <br>
                don't forget preparing some popcorn <br>
                Enjoy the movie
            </p>
        </div>
    </section>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($movies as $movie)
                @component('components.movies.card', ['movie' => $movie])
                @endcomponent
            @endforeach
        </div>
    </div>
@endsection
