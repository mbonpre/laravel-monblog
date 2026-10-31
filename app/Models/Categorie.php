<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom'];

    // Une catégorie a plusieurs articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
