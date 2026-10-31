<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'statut',
        'user_id',
        'categorie_id',
    ];

    // Un article appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un article appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Un article a plusieurs commentaires
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
