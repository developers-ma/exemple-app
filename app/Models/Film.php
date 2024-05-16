<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'title', 'description', 'image_url', 'genre_ids'];

    /**
     * Scope pour récupérer les films par genre.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $genre_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByGenre($query, $genre_id)
    {
        return $query->where('genre_id', $genre_id);
    }

    /**
     * Récupère les genres associés à ce film.
     */
    public function genres() : BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

   
}