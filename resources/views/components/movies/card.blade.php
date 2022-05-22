<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="{{$movie->image_url}}" alt="">
        <div class="card-body">
            <h6 class="underline">{{$movie->name}}</h6>
            <p class="card-text mt-2">{{ Str::words($movie->overview, 10, '...') }}</p>
            <div class="d-flex justify-content-between align-items-center mt-2">
                    <a href="{{route('movies.show', ['movie' => $movie])}}" class="btn btn-sm btn-outline-secondary btn-block">More ...</a>
            </div>
        </div>
    </div>
</div>
