<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class ListMovie extends Component
{
    use WithPagination;
    public $query;
    protected $paginationTheme = 'bootstrap';
    public $perPage=12;

    public function setData(){
        $query=$this->query;
        return ($query==null)?Movie::query()->orderByDesc('created_at')
            ->paginate($this->perPage)
            :Movie::query()->where('title','like',"%$query%")
            ->orWhere('director','like',"%$query%")
            ->orWhere('summary','like',"%$query%")
            ->orWhereHas('movieGenres',function ($q) use ($query){
                $q->whereHas('genre',function ($q)use ($query){
                    $q->where('title','like',"%$query%");
                });
            })->orderByDesc('created_at')
                ->paginate($this->perPage);
    }
    public function render()
    {
        $movies=$this->setData();
        return view('livewire.list-movie',compact('movies'));
    }
}
