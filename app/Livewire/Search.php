<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    use WithPagination;

    public $searchTitle = '';
    public $selectedGenre;
    public $genres;

    public function mount()
    {
        // Fetch all genres from the database
        $this->genres = Genre::all();

    }

    public function render()
    {
        // Split the selected genre into an array
        $selectedGenreArray = explode(',', $this->selectedGenre);

        // Query to retrieve films
        $films = Film::query()
            ->when($this->searchTitle !== '', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->searchTitle . '%');
            })
            ->when($this->selectedGenre, function ($query, $selectedGenre) {
                return $query->whereJsonContains('genre_ids', (int)$selectedGenre);
            })
            ->orderBy('created_at', 'desc') // Trier par Date
            ->paginate(10)
            ->withQueryString(); // Ensure that query parameters are included in pagination links

        return view('livewire.search', [
            'films' => $films,

        ]);
    }

    public function sortBy()
    {
        // Handle sorting action here
    }
    //Corrige le bogue des recherches en direct qui ne fonctionnent pas sur les paginations suivantes.
    public function updating($key): void
    {
        // pour la recherche par "title"
        if ($key === 'searchTitle' || $key === 'searchTitle') {
            $this->resetPage();
        }
        //pour le triage par categorie
        if ($key === 'selectedGenre' || $key === 'selectedGenre') {
            $this->resetPage();
        }
    }
}