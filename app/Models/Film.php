<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'title', 'description', 'image_url'];

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
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

   
}