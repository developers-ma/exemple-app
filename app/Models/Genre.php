<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id','name'];

     /**
     * Récupère les films associés à ce genre.
     */
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

}