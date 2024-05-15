<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class Genres extends Component
{

    use WithPagination;

    public $genreTitle = '';


    public function render()
    {
        $genres = Genre::query()
        ->when($this->genreTitle !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->genreTitle .'%')) 
        ->paginate(10);

        return view('livewire.genres', [

            // 'genres' => Film::where('title', $this->genreTitle)->get(),

            'genres' => $genres
        ]);
        
    }

    public function updatingGenreTitle(): void
    {
        $this->resetPage();
    }

}