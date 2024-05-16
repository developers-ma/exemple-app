<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id','name'];

     /**
     * Récupère les films associés à ce genre.
     */
    public function films() : BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }

}