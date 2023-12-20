<div class="container mt-3">
    <form wire:submit.prevent="{{ $action }}" >
        <div class="mb-3">
            <label for="movieTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="movieTitle" placeholder="Title" wire:model="title">
            @error('title')<span class="error text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="movieTitle" class="form-label">Director</label>
            <input type="text" class="form-control" id="movieTitle" placeholder="Director" wire:model="director">
            @error('director')<span class="error text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="movieSummary" class="form-label">summary</label>
            <textarea class="form-control" id="movieSummary" rows="3" wire:model="summary"></textarea>
            @error('summary')<span class="error text-danger">{{ $message }}</span>@enderror
        </div>

        @foreach($optionGenre as $genre)
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="{{ $genre['value'] }}" id="genre{{$genre['value']}}" wire:model="genres" @if(in_array($genre['value'],$genres)) checked @endif>
            <label class="form-check-label" for="genre{{$genre['value']}}">
                {{ $genre['title'] }}
            </label>
        </div>
        @endforeach
        @error('genres')<span class="error text-danger">{{ $message }}</span>@enderror
        <div class="mt-3 mb-3">
            <input type="submit" value="Save" class="btn btn-primary form-control">
        </div>


    </form>
    @if($action=="update")
        <form method="post" action="{{ route('movie.destroy',$movieId) }}" class="mt-3">
            @method('PUT')
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Delete" class="btn btn-danger form-control">
        </form>
    @endif
</div>
