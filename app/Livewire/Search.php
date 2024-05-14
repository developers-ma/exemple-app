<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Search extends Component
{
    use WithPagination;

    public $searchTitle = '';


    public function render()
    {
        $films = Film::query()
        ->when($this->searchTitle !== '', fn(Builder $query) => $query->where('title', 'like', '%'. $this->searchTitle .'%')) 
        ->paginate(10);

        return view('livewire.search', [

            // 'films' => Film::where('title', $this->searchTitle)->get(),

            'films' => $films
        ]);
        
    }

 
}