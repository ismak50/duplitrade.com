@extends('layouts.movies')
@section('content')
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-2 mb-5">
                <a href="{{ route('movies.index') }}" class="btn btn-sm btn-outline-secondary"> < Back</a>
            </div>
        </div>
        <div class="row border p-2">
            <div class="col-4">
                <img src="{{ $movie->image_url }}" alt="" class="img-fluid">
            </div>
            <div class="col-8">
                <h1 class="mt-5"><u>{{ $movie->name }}</u> <span class="badge badge-secondary">{{ $movie->score }}</span></h1>
                <p><i>Release Date: {{ $movie->release_date }}</i></p>
                <div class="alert alert-secondary mt-5 overview" role="alert">
                    {{ $movie->overview }}
                </div>

                @if(Auth::check() && $movie->isActiveRental(Auth::user()))
                    <div class="row">
                        <div class="col-3 mx-auto mt-5">
                            <button class="btn btn-success"> Play !</button>
                        </div>
                    </div>
                    <hr>
                    <p class="col-12">
                        Rented Date: {{$rented_at}} ({{ $rented_left_days }} days left)
                    </p>
                @else
                    <div class="row">
                        <div class="col-3 mx-auto mt-5">
                            <form method="post" action="{{ route('movies.rent', ['movie' => $movie->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-secondary" name="submit">Rent it now !</button>
                            </form>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
