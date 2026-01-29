<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom', 'reference', 'description', 'prix', 'stock', 'categorie_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
