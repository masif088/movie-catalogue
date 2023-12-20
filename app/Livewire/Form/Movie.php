<?php

namespace App\Livewire\Form;

use App\Models\Genre;
use App\Models\MovieGenre;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Movie extends Component
{
    public $action;
    public $movieId;
    public $title;
    public $summary;
    public $director;
    public $genres = [];
    public $optionGenre;

    use LivewireAlert;

    public function getRules()
    {
        return ['title' => 'required|max:255','director' => 'required|max:255', 'summary' => 'required|max:100', 'genres' => 'required',];
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $movie = \App\Models\Movie::find($this->movieId);
        MovieGenre::where('movie_id', '=', $this->movieId)->delete();

        $movie->update([
            'title'=>$this->title,
            'director'=>$this->director,
            'summary'=>$this->summary,
        ]);
        foreach ($this->genres as $genre) {
            MovieGenre::create(['movie_id' => $this->movieId, 'genre_id' => $genre]);
        }
        $this->alert('success', 'Success update');
        $this->dispatch('redirect', route(  'movie.index'));
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $movie = \App\Models\Movie::create([
            'title'=>$this->title,
            'director'=>$this->director,
            'summary'=>$this->summary,
        ]);
        foreach ($this->genres as $genre) {
            MovieGenre::create(['movie_id' => $movie->id, 'genre_id' => $genre]);
        }
        $this->alert('success', 'Success create');
        $this->dispatch('redirect', route(  'movie.index'));
    }

    public function mount()
    {
        foreach (Genre::get() as $genre) {
            $this->optionGenre[] = ['value' => $genre->id, 'title' => $genre->title];
        }
        if ($this->movieId != null) {
            $movie = \App\Models\Movie::find($this->movieId);
            $this->title = $movie->title;
            $this->summary = $movie->summary;
            $this->director = $movie->director;
            $this->genres = $movie->movieGenres->pluck('genre_id')->toArray();
        }

    }

    public function render()
    {
        return view('livewire.form.movie');
    }
}
