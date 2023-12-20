<div>
    <div class="container">
        <a href="{{ route('movie.create') }}" class="btn btn-primary btn-lg" style="font-size:24px;position: fixed; bottom: 40px; right: 40px; z-index: 10"> <b>+</b> </a>
        <div class="row ">
            <div class="col-12 p-3">
                <form class="d-flex" wire:submit="setData">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" wire:model="query">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            @foreach($movies as $movie)
                <a href="{{ route('movie.edit',$movie->id) }}" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3 " style="text-decoration: none">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <h6 class="card-title">{{ $movie->director }}</h6>
                            <p class="card-text">{{ $movie->summary }}</p>
                            @foreach($movie->movieGenres as $genre)
                                <div class="btn {{ $genre->genre->colors }} m-1">
                                    {{ $genre->genre->title }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
            {{ $movies->onEachSide(1)->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
